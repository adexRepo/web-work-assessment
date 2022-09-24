<?php

namespace web\work\assessment\Service;

use DateTime;
use DateTimeZone;
use web\work\assessment\Config\Database;
use web\work\assessment\Domain\PackageSendedTrace;
use web\work\assessment\Exception\ValidationException;
use web\work\assessment\Model\SendReportPackageRequest;
use web\work\assessment\Model\PerformanceHistoryRequest;
use web\work\assessment\Model\SendReportPackageResponse;
use web\work\assessment\Model\PerformanceHistoryResponse;
use web\work\assessment\Repository\PackageSendedTraceRepository;
use web\work\assessment\Model\SummaryWorkHistoryRequest;
use web\work\assessment\Model\SummaryWorkHistoryResponse;

class PackageService
{
    private PackageSendedTraceRepository $packageRepo;

    public function __construct(PackageSendedTraceRepository $packageRepo)
    {
        $this->packageRepo = $packageRepo;
    }

    public function dateToday(){
        $current = new DateTime();
        $current->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        return $current;
    }

    public function sendReport(SendReportPackageRequest $req):SendReportPackageResponse
    {
        $this->validationPackageSent($req);

        try {
            Database::beginTransaction();
            
            $reportHis = $this->packageRepo->findByUserIdAndDate($req->getUserId(), $req->getDate());
            $reportPackage = new PackageSendedTrace();
            if($reportHis == false){
                // save
                $unique = time().'-'.uniqid(true);

                $reportPackage->setPackageId($unique);
                $reportPackage->setUserId($req->getUserId());
                $reportPackage->setDate($req->getDate());
                $reportPackage->setTotalPackage($req->getTotalPackage());
                $reportPackage->setCodeRemark($req->getCodeRemark());
                $reportPackage->setRemark($req->getRemark());
                $this->packageRepo->save($reportPackage);
                
            }else{
                // update
                $reportPackage->setPackageId($reportHis->getPackageId());
                $reportPackage->setTotalPackage($req->getTotalPackage());
                $reportPackage->setCodeRemark($req->getCodeRemark());
                $reportPackage->setRemark($req->getRemark());
                $this->packageRepo->update($reportPackage);
            }

            $res = new SendReportPackageResponse();
            $res->setHistoryReport($reportPackage);
            Database::commit();
            return $res;
        } catch (\Throwable $th) {

            Database::rollBack();
            throw $th;
        }

    }

    public function validationPackageSent(SendReportPackageRequest $req):bool
    {
        if(
            $req->getUserId() == null ||
            $req->getDate() == null ||
            $req->getTotalPackage() == null ||
            $req->getCodeRemark()== null||
            trim($req->getUserId()) == '' ||
            trim($req->getDate()) == '' ||
            trim($req->getTotalPackage()) == '' ||
            trim($req->getCodeRemark()) == ''
        ){ 
            throw new ValidationException("All Input can not blank", 0);
         }
         return true;
    }

    public function inquiryPackageHistory(PerformanceHistoryRequest  $req):PerformanceHistoryResponse
    {
        $this->validationPerformanceHistory($req);

        try {
            Database::beginTransaction();
            $userId = $req->getUserId();
            $monthNow = $req->getMonth();

            $arrOutput = $this->packageRepo->findByUserIdAndMonth($userId, $monthNow);

            $res = new PerformanceHistoryResponse();
            $res->setPerformanceHistory($arrOutput);

            Database::commit();
            return $res;
        } catch (\Throwable $th) {
            Database::rollBack();
            throw $th;
        }
    }

    public function validationPerformanceHistory(PerformanceHistoryRequest  $req):bool
    {
        if(
            $req->getUserId() == null ||
            $req->getMonth() == null ||
            trim($req->getUserId()) == '' ||
            trim($req->getMonth()) == ''
        ){ 
            throw new ValidationException("All Input can not blank", 0);
         }
         return true;
    }

    public function averagePackageMonth(string $month):PerformanceHistoryResponse
    {
        try {
            Database::beginTransaction();
            $output = $this->packageRepo->findAverageMonthlyAllUser($month);

            $res = new PerformanceHistoryResponse();
            $res->setAveragePackageMonthly($output);

            Database::commit();
            return $res;
        } catch (\Throwable $th) {
            Database::rollBack();
            throw $th;
        }
    }


    public function summaryWorkHistory(SummaryWorkHistoryRequest $req):SummaryWorkHistoryResponse
    {
        try {
            Database::beginTransaction();

            $resultData =$this->packageRepo->findSummaryWork($req->getUserId());

            $response = new SummaryWorkHistoryResponse();
            $response->setSummary($resultData);
            Database::commit();
            return $response;
        } catch (\Throwable $th) {
            Database::rollBack();
            throw $th;
        }
    }
}