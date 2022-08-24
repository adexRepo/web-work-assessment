<?php

namespace web\work\assessment\Controller;

use web\work\assessment\App\View;
use web\work\assessment\Config\Database;
use web\work\assessment\Module\Dates;
use web\work\assessment\Repository\SessionRepository;
use web\work\assessment\Repository\UserBaseRepository;
use web\work\assessment\Service\AttendanceService;
use web\work\assessment\Service\SessionService;
use web\work\assessment\Repository\AttendanceTraceRepository;
use web\work\assessment\Model\AttendanceHistoryRequest;

class AttendanceController
{
    private AttendanceService $attendanceService;

    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        
        $sessionRepository = new SessionRepository($connection);
        $userBaseRepository = new UserBaseRepository($connection);
        $attendanceRepository= new AttendanceTraceRepository($connection);


        $this->attendanceService = new AttendanceService($attendanceRepository);
        $this->sessionService = new SessionService($sessionRepository, $userBaseRepository);
    }

    function attendance()
    {
        $month = date('Ym', strtotime(Dates::dateNowMonth())).'%';

        $userCurrent = $this->sessionService->currentSession();

        $request = new AttendanceHistoryRequest();
        $request->setUserId($userCurrent->getUserId());
        $request->setMonth($month);

        $dataHistory = $this->attendanceService->inquiryAttendanceHistory($request);
        if(!empty($_COOKIE['CODE_CC'])){
            $code_info = unserialize(base64_decode($_COOKIE['CODE_CC']));
        }

        View::render('/Attend/attendance',[
            "title"=>"Attendance",
            "history"=> $dataHistory,
            "code"=>$code_info,
        ],true);
    }
}