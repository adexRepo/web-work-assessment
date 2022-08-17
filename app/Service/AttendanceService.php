<?php

namespace web\work\assessment\Service;
use web\work\assessment\Repository\AttendanceTraceRepository;
use web\work\assessment\Domain\AttendanceTrace;



class AttendanceService
{
    public static string $COOKIE_NAME = "WEB-WORK-ATTENDANCE";

    private AttendanceTraceRepository $attendanceRepo;

    public function __construct (AttendanceTraceRepository $attendanceRepo)
    {
        $this->attendanceRepo = $attendanceRepo;
    }

    public function create(string $userId)
    {
        $current = time();    // epoch
        $dateTime = date('r', $current); // DateTime
        $date = 


        $attendanceToday = new AttendanceTrace();
        $attendanceToday->setAttendanceTraceId(uniqid());
        // $attendanceToday->setDate($date);
        $attendanceToday->setUserId($userId);
        // $attendanceToday->setClockIn($time);
        

    }

    public function currentSession() : ?AttendanceTrace
    {
        $id = $_COOKIE[self::$COOKIE_NAME] ?? '';

        if($id != ''){
            $attendance = $this->attendanceRepo->checkAttendaceToday($id);
            if($attendance == null) return null;
        }else{

        }


    }
}