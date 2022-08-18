<?php

namespace web\work\assessment\Domain;

use DateTime;

class AttendanceTrace
{
    private   string      $attendanceId         ;
    private   string      $date     ;
    private   string      $userId     ;
    private   string    $clockIn    ;
    private   int         $status     ;

	/**
	 * @return string
	 */
	function getUserId(): string {
		return $this->userId;
	}
	
	/**
	 * @param string $userId 
	 * @return UserBase
	 */
	function setUserId(string $userId): self {
		$this->userId = $userId;
		return $this;
	}
	/**
	 * @return int
	 */
	function getStatus(): int {
		return $this->status;
	}
	
	/**
	 * @param int $status 
	 * @return UserBase
	 */
	function setStatus(int $status): self {
		$this->status = $status;
		return $this;
	}
	/**
	 * @return string
	 */
	function getDate(): string {
		return $this->date;
	}
	
	/**
	 * @param string $date 
	 * @return AttendanceTrace
	 */
	function setDate(string $date): self {
		$this->date = $date;
		return $this;
	}
	/**
	 * @return string
	 */
	function getClockIn(): string {
		return $this->clockIn;
	}
	
	/**
	 * @param string $clockIn 
	 * @return AttendanceTrace
	 */
	function setClockIn(string $clockIn): self {
		$this->clockIn = $clockIn;
		return $this;
	}
	/**
	 * @return string
	 */
	function getAttendanceId(): string {
		return $this->attendanceId;
	}
	
	/**
	 * @param string $attendanceId 
	 * @return AttendanceTrace
	 */
	function setAttendanceId(string $attendanceId): self {
		$this->attendanceId = $attendanceId;
		return $this;
	}
}
