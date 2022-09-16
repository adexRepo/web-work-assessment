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
            $month = date('Ym', strtotime($req->getDate())).'%';
            $userId = $req->getUserId();
            $dateNow = $req->getDate();

            // attendance
            $outputQueryAttendance = $this->attendRepo->checkAttendaceToday($userId, $dateNow);
            $needAttendance = $outputQueryAttendance == null;
            $clockin = $needAttendance ? "00:00:00" : $outputQueryAttendance->getClockIn();
            
            // total package sent
            $thisUser = $this->packageRepo->findTotalUserPackageSentMonth($userId,$month);
            $allUser = $this->packageRepo->findTotalAllUserPackageSentThisMonth($month);
            
            if($thisUser != 0 ||   $allUser != 0){
                $persentation = $thisUser / $allUser * 100;
                $commision =  number_format($thisUser * 2500,2,',','.');// static 2500 for now, need to see rule
            }


            $res = new DashboardResponse();
            $res->setAttendance($needAttendance);
            $res->setClockin($clockin);
            $res->setUserId($userId);
            $res->setTotalPackage($thisUser);
            $res->setPersentationPackage($persentation ?? 0);
            $res->setCommission($commision ?? 0);

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