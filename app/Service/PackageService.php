<?php

namespace web\work\assessment\Service;

use DateTime;
use DateTimeZone;
use web\work\assessment\Config\Database;
use web\work\assessment\Domain\PackageSendedTrace;
use web\work\assessment\Exception\ValidationException;
use web\work\assessment\Model\SendReportPackageRequest;
use web\work\assessment\Model\SendReportPackageResponse;
use web\work\assessment\Repository\PackageSendedTraceRepository;

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
        $this->validationPackage($req);

        try {
            Database::beginTransaction();
            
            $reportHis = $this->packageRepo->findByUserIdAndDate($req->getUserId(), $req->getDate());
            $reportPackage = new PackageSendedTrace();
            if($reportHis != null){
                // update
                $reportPackage->setPackageId($reportHis->getPackageId());
                $reportPackage->setTotalPackage($req->getTotalPackage());
                $reportPackage->setCodeRemark($req->getCodeRemark());
                $reportPackage->setRemark($req->getRemark());

                $this->packageRepo->update($reportPackage);
            }else{
                // save
                $reportPackage->setPackageId(uniqid());
                $reportPackage->setUserId($req->getUserId());
                $reportPackage->setDate($req->getDate());
                $reportPackage->setTotalPackage($req->getTotalPackage());
                $reportPackage->setCodeRemark($req->getCodeRemark());
                $reportPackage->setRemark($req->getRemark());

                $this->packageRepo->save($reportPackage);
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

    public function validationPackage(SendReportPackageRequest $req):bool
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

}