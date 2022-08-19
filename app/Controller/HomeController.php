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

class HomeController
{
    private SessionService $sessionService;
    private AttendanceService $attendanceService;
    private PackageService $packageService;

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
        
    }

    function index(): void
    {
        $userCurrent = $this->sessionService->currentSession();
        $userAttendanceCurrent = $this->attendanceService->currentAttendance($userCurrent->getUserId());
        $showModalAttendance = $userAttendanceCurrent == null;
        $clockin = $showModalAttendance ? "-" : $userAttendanceCurrent->getClockIn();

        if($userCurrent == null)
        {
            View::render('User/login',[
                "title"=>"Dashboard",
            ],false);

        }else {
            View::render('Home/index',[
                "title"=>"Dashboard",
                "userId"=>$userCurrent->getUserId(),
                "name"=>$userCurrent->getName(),
                "clockIn"=>$clockin,
                "persentationPackage"=> 0,
                "totalPackage"=>0,
                "commission"=>0,
                "attendance"=>$showModalAttendance,
            ],true);
        }
    }

    public function clockin(){
        $userCurrent = $this->sessionService->currentSession();
        $userAttendanceCurrent = $this->attendanceService->create($userCurrent->getUserId());

        View::render('Home/index',[
            "title"=>"Dashboard",
            "userId"=>$userCurrent->getUserId(),
            "clockIn"=>$userAttendanceCurrent->getClockIn(),
            "persentationPackage"=> 0,
            "totalPackage"=>0,
            "commission"=>0,
            "attendance"=>false,
        ],true);
    }

    public function callBackHome()
    {
        $userCurrent = $this->sessionService->currentSession();
        $userAttendanceCurrent = $this->attendanceService->currentAttendance($userCurrent->getUserId());

        View::render('Home/index',[
            "title"=>"Dashboard",
            "userId"=>$userCurrent->getUserId(),
            "clockIn"=>$userAttendanceCurrent->getClockIn(),
            "persentationPackage"=> 0,
            "totalPackage"=>0,
            "commission"=>0,
            "attendance"=>false,
        ],true);
    }

    public function sendReport()
    {
        // $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        // var_dump($actual_link);
        $this->callBackHome();
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

            $this->callBackHome();

        } catch (ValidationException $e) {
            //throw $th;
            $this->callBackHome();
        }

    }

    function attendance(): void
    {
        View::render('home/attendance',["title"=>"Attendance"],true);
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