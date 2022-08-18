<?php

namespace web\work\assessment\Repository;
use web\work\assessment\Domain\AttendanceTrace;

class AttendanceTraceRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function checkAttendaceToday(string $userId) : ?AttendanceTrace
    {
        $date = date("Ymd");

        $query = $this->connection->prepare(
            "SELECT * FROM attendance_trace where user_id = ? and date = ?"
        );

        $query->execute([$userId, $date]);
        $outputQuery = $query->fetch();

        if($outputQuery === false) return null;

        try {
            $attendanceTrace = new AttendanceTrace();
            $attendanceTrace->setAttendanceId($outputQuery['attendance_id']);
            $attendanceTrace->setDate($outputQuery['date']);
            $attendanceTrace->setUserId($outputQuery['user_id']);
            $attendanceTrace->setClockIn($outputQuery['clock_in']);
            $attendanceTrace->setStatus($outputQuery['status']);
            return $attendanceTrace;
        } finally {
            $query->closeCursor();
        }
    }

    public function save(AttendanceTrace $attendaceTrace):AttendanceTrace
    {
        $query = $this->connection->prepare(
            "INSERT INTO 
                attendance_trace(attendance_id, date, user_id, clock_in, status)
                VALUES(?, ?, ?, ?, ?)"
        );

        $query->execute([
            $attendaceTrace->getAttendanceId(),
            $attendaceTrace->getDate(),
            $attendaceTrace->getUserId(),
            $attendaceTrace->getClockIn(),
            $attendaceTrace->getStatus(),
        ]);

        return $attendaceTrace;
    }
}