<?php

namespace web\work\assessment\Controller;

use web\work\assessment\App\View;
use web\work\assessment\Module\Dates;
use web\work\assessment\Config\Database;
use web\work\assessment\Service\PackageService;
use web\work\assessment\Service\SessionService;
use web\work\assessment\Repository\SessionRepository;
use web\work\assessment\Repository\UserBaseRepository;
use web\work\assessment\Model\PerformanceHistoryRequest;
use web\work\assessment\Repository\PackageSendedTraceRepository;

class PerformanceController
{
    private PackageService $packageService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $packageRepository = new PackageSendedTraceRepository($connection);
        $this->packageService = new PackageService($packageRepository);
    
        $userBaseRepository = new UserBaseRepository($connection);


        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userBaseRepository);

    }

    public function performance()
    {
        $month = date('Ym', strtotime(Dates::dateNowMonth())).'%';
        $userCurrent = $this->sessionService->currentSession();
        $request = new PerformanceHistoryRequest();

        $request->setUserId($userCurrent->getUserId());
        $request->setMonth($month);

        $dataHistory = $this->packageService->inquiryPackageHistory($request);
        
        View::render('/Perform/performance',[
            "title"=>"Performance",
            "history"=> $dataHistory
        ],true);
    }

}