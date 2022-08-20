<?php

namespace web\work\assessment\Controller;

use web\work\assessment\App\View;

use web\work\assessment\Config\Database;
use web\work\assessment\Service\PackageService;
use web\work\assessment\Service\SessionService;
use web\work\assessment\Service\AttendanceService;
use web\work\assessment\Repository\SessionRepository;
use web\work\assessment\Exception\ValidationException;
use web\work\assessment\Repository\UserBaseRepository;
use web\work\assessment\Model\SendReportPackageRequest;
use web\work\assessment\Repository\AttendanceTraceRepository;
use web\work\assessment\Repository\PackageSendedTraceRepository;
use web\work\assessment\Model\DashboardRequest;
use web\work\assessment\Module\Dates;
use web\work\assessment\Service\DashboardService;

class HomeController
{
    private SessionService $sessionService;
    private AttendanceService $attendanceService;
    private PackageService $packageService;
    private DashboardService $dashboardService;

    public function __construct()
    {
        $connection = Database::getConnection();
        
        $sessionRepository = new SessionRepository($connection);
        $userBaseRepository = new UserBaseRepository($connection);
        $attendanceRepository= new AttendanceTraceRepository($connection);
        $packageRepository = new PackageSendedTraceRepository($connection);

        $this->attendanceService = new AttendanceService($attendanceRepository);
        $this->sessionService = new SessionService($sessionRepository, $userBaseRepository);
        $this->packageService = new PackageService($packageRepository);
        $this->dashboardService = new DashboardService($attendanceRepository, $packageRepository);
    }

    public function index()
    {
        $dateNow = Dates::dateNowFormatYmd();
        $userCurrent = $this->sessionService->currentSession();
        $request = new DashboardRequest();
        $request->setUserId($userCurrent->getUserId());
        $request->setDate($dateNow);

        $response = $this->dashboardService->inquiryDataDashboard($request);
        View::render('Home/index',[
            "title"=>"Dashboard",
            "userId"=>$userCurrent->getUserId(),
            "name"=>$userCurrent->getName(),
            "clockIn"=>$response->getClockIn(),
            "persentationPackage"=> $response->getPersentationPackage(),
            "totalPackage"=>$response->getTotalPackage(),
            "commission"=>$response->getCommission(),
            "attendance"=>$response->getAttendance(),
        ],true);
    }

    public function clockin(){
        $userCurrent = $this->sessionService->currentSession();

        try {
            $this->attendanceService->create($userCurrent->getUserId());
            View::redirect('/');
        } catch (\Throwable $th) {
            //throw $th;
            View::redirect('/');
            echo "<script>alert($th)</script>";
        }

    }

    public function postSendReport()
    {
        $date = date('Ymd', strtotime($_POST['date']));
        $userCurrent = $this->sessionService->currentSession();

        $req = new SendReportPackageRequest();
        $req->setUserId($userCurrent->getUserId());
        $req->setDate($date);
        $req->setTotalPackage($_POST['totPackage']);
        $req->setCodeRemark($_POST['remarkCode']);
        $req->setRemark($_POST['remark']);

        try {
            $this->packageService->sendReport($req);

            View::redirect('/');

        } catch (ValidationException $e) {
            //throw $th;
            View::redirect('/');
        }

    }

    function performance(): void
    {
        View::render('home/performance',["title"=>"Performance"],true);
    }
    function promotion(): void
    {
        View::render('home/promotions',["title"=>"Promotion"],true);
    }
    function aboutUs(): void
    {
        View::render('home/about-us',["title"=>"About Us"],true);
    }

}