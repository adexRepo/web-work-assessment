<?php

namespace web\work\assessment\Service;
use web\work\assessment\Repository\AttendanceTraceRepository;
use web\work\assessment\Domain\AttendanceTrace;
use DateTime;
use DateTimeZone;



class AttendanceService
{
    private AttendanceTraceRepository $attendanceRepo;

    public function __construct (AttendanceTraceRepository $attendanceRepo)
    {
        $this->attendanceRepo = $attendanceRepo;
    }

    public function create(string $userId)
    {
        $current = new DateTime();
        $current->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        $date = $current->format('Ymd');
        $dueTime = DateTime::createFromFormat('H:i:s', '08:00:00');
        $earlyTime = DateTime::createFromFormat('H:i:s', '07:55:00');
        $currentFormat = $current->format('Y-m-d H:i:s');
        
        if($current > $earlyTime)
        {
            $status = $current > $dueTime ? 0 : 1 ; 
        }else{
            $status = 2;
        }

        $attendanceToday = new AttendanceTrace();
        $attendanceToday->setAttendanceId(uniqid());
        $attendanceToday->setDate($date);
        $attendanceToday->setUserId($userId);
        $attendanceToday->setClockIn($currentFormat);
        $attendanceToday->setStatus($status);

        $this->attendanceRepo->save($attendanceToday);

        return $attendanceToday;
    }

    public function currentAttendance(string $userId) : ?AttendanceTrace
    {
        $attendance = $this->attendanceRepo->checkAttendaceToday($userId);
        if($attendance == null) return null;
        
        return $attendance;
    }
}