<?php

namespace web\work\assessment\Service;
use web\work\assessment\Repository\PackageSendedTraceRepository;
use web\work\assessment\Repository\AttendanceTraceRepository;
use web\work\assessment\Model\DashboardRequest;
use web\work\assessment\Model\DashboardResponse;
use web\work\assessment\Exception\ValidationException;
use web\work\assessment\Config\Database;

class DashboardService
{
    private AttendanceTraceRepository $attendRepo;
    private PackageSendedTraceRepository $packageRepo;

    public function __construct(AttendanceTraceRepository $attendRepo, PackageSendedTraceRepository $packageRepo)
    {
        $this->attendRepo = $attendRepo;
        $this->packageRepo = $packageRepo;
    }

    public function inquiryDataDashboard(DashboardRequest $req): ?DashboardResponse
    {
        $this->validationRequestInquiry($req);

        try{
            Database::beginTransaction();
            // input
            $month = date('Ym', strtotime($req->getDate())).'%';
            $userId = $req->getUserId();
            $dateNow = $req->getDate();
            $dept = $req->getDepartement();
            $contract = $req->getContract();

            // query attendance
            $outputQueryAttendance = $this->attendRepo->checkAttendaceToday($userId, $dateNow);
            $diagramAttendance = $this->attendRepo->findByAttendanceYears($userId);
            $needAttendance = $outputQueryAttendance == null;
            $clockin = $needAttendance ? "00:00:00" : $outputQueryAttendance->getClockIn();
            
            // query package
            $thisUser = $this->packageRepo->findTotalUserPackageSentMonth($userId,$month,$dept,$contract);
            $allUser = $this->packageRepo->findTotalAllUserPackageSentThisMonth($month);
            $diagramPackage = $this->packageRepo->findBySentPackage($userId);

            // calculate
            if($thisUser != 0 ||   $allUser != 0){
                $totalPackage = (int)$thisUser['total_package'];
                $target = $thisUser['target'];
                $interestSalary = ceil($thisUser['interest_salary']/$target);

                $persentation = $totalPackage / $allUser * 100;
                $commision =  number_format($totalPackage * $interestSalary,2,',','.');
            }

            $res = new DashboardResponse();
            $res->setAttendance($needAttendance);
            $res->setClockin($clockin);
            $res->setUserId($userId);
            $res->setTotalPackage($totalPackage);
            $res->setPersentationPackage($persentation ?? 0);
            $res->setCommission($commision ?? 0);
            $res->setDiagramPackage($diagramPackage);
            $res->setDiagramAttendance($diagramAttendance);

            Database::commit();
            return $res;
        } catch (\Throwable $th) {
            Database::rollBack();
            throw $th;
        }
    }

    public function validationRequestInquiry(DashboardRequest $req):bool
    {
        if(
            $req->getUserId() == null ||
            $req->getDate() == null ||
            trim($req->getUserId()) == "" ||
            trim($req->getDate()) == ""
        ){ 
            throw new ValidationException("All Input can not blank", 0);
        }

        return true;
    }
}