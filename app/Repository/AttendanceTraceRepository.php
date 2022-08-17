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

    public function checkAttendaceToday(string $attendanceId) :?AttendanceTrace
    {
        $date = date("Ymd");

        $query = $this->connection->prepare(
            "SELECT * FROM attendance_trace where id = ? and date = ?"
        );

        $query->execute([$attendanceId, $date]);
        $outputQuery = $query->fetch();

        if($outputQuery === false) return null;

        $query->closeCursor();
        return $outputQuery;
    }

    public function save(AttendanceTrace $attendaceTrace):AttendanceTrace
    {
        $query = $this->connection->prepare(
            "INSERT INTO 
                attendance_trace(id, date, user_id, clock_in, status)
                VALUES(?, ?, ?, ?, ?)"
        );

        $query->execute([
            $attendaceTrace->getAttendanceTraceId(),
            $attendaceTrace->getDate(),
            $attendaceTrace->getUserId(),
            $attendaceTrace->getClockIn(),
            $attendaceTrace->getStatus(),
        ]);

        return $attendaceTrace;
    }
}