<?php

namespace web\work\assessment\Service;
use DateTime;
use DateTimeZone;
use web\work\assessment\Domain\AttendanceTrace;
use web\work\assessment\Model\AttendanceHistoryRequest;
use web\work\assessment\Model\AttendanceHistoryResponse;
use web\work\assessment\Repository\AttendanceTraceRepository;
use web\work\assessment\Exception\ValidationException;
use web\work\assessment\Config\Database;



class AttendanceService
{
    private AttendanceTraceRepository $attendanceRepo;

    public function __construct (AttendanceTraceRepository $attendanceRepo)
    {
        $this->attendanceRepo = $attendanceRepo;
    }

    public function dateToday(){
        $current = new DateTime();
        $current->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        return $current;
    }

    public function create(string $userId)
    {
        $current = $this->dateToday();
        $date = $current->format('Ymd');
        $dueTime = DateTime::createFromFormat('H:i:s', '08:00:00');
        $earlyTime = DateTime::createFromFormat('H:i:s', '07:55:00');
        $currentFormat = $current->format('Y-m-d H:i:s');
        
        // 1 late , 2 ontime , 3 early
        if($current > $earlyTime)
        {
            $status = $current > $dueTime ? 1 : 2 ;  
        }else{
            $status = 3;
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
        $current = $this->dateToday();
        $date = $current->format('Ymd');
        $attendance = $this->attendanceRepo->checkAttendaceToday($userId , $date);
        if($attendance == null) return null;
        
        return $attendance;
    }

    public function inquiryAttendanceHistory(AttendanceHistoryRequest $req) :?AttendanceHistoryResponse
    {
        $this->validationInquiryAttendanceHistory($req);

        try {
            Database::beginTransaction();

            $userId = $req->getUserId();
            $monthNow = $req->getMonth();
            $arrOutput = $this->attendanceRepo->findByUserIdAndMonth($userId, $monthNow);
            $res = new AttendanceHistoryResponse();
            $res->setAttendanceHistory($arrOutput);

            Database::commit();
            return $res;
        } catch (\Throwable $th) {
            Database::rollBack();
            throw $th;
        }
    }
    
    public function validationInquiryAttendanceHistory(AttendanceHistoryRequest $req):bool
    {
        if(
            $req->getUserId() == null || $req->getMonth() == null ||
            trim($req->getUserId()) == '' || trim($req->getMonth()) == ''
            ){ 
                throw new ValidationException("All Input can not blank", 0);
            }

        return true;
    }

}