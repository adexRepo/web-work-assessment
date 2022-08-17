<?php

namespace web\work\assessment\Domain;

use DateTime;

class AttendanceTrace
{
    private   string      $attendanceTraceId         ;
    private   string      $date     ;
    private   string      $userId     ;
    private   int    $clockIn    ;
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
	function getAttendanceTraceId(): string {
		return $this->attendanceTraceId;
	}
	
	/**
	 * @param string $attendanceTraceId 
	 * @return AttendanceTrace
	 */
	function setAttendanceTraceId(string $attendanceTraceId): self {
		$this->attendanceTraceId = $attendanceTraceId;
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
	 * @return int
	 */
	function getClockIn(): int {
		return $this->clockIn;
	}
	
	/**
	 * @param int $clockIn 
	 * @return AttendanceTrace
	 */
	function setClockIn(int $clockIn): self {
		$this->clockIn = $clockIn;
		return $this;
	}
}
