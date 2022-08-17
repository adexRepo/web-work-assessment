<?php

namespace web\work\assessment\Model;

class UserAttendanceRequest
{
    private ?string $attendanceTraceId   = null ;
    private ?string $userId = null ;
	/**
	 * @return ?string
	 */
	function getAttendanceTraceId(): ?string {
		return $this->attendanceTraceId;
	}
	
	/**
	 * @param ?string $attendanceTraceId 
	 * @return UserAttendanceRequest
	 */
	function setAttendanceTraceId(?string $attendanceTraceId): self {
		$this->attendanceTraceId = $attendanceTraceId;
		return $this;
	}
	/**
	 * @return ?string
	 */
	function getUserId(): ?string {
		return $this->userId;
	}
	
	/**
	 * @param ?string $userId 
	 * @return UserAttendanceRequest
	 */
	function setUserId(?string $userId): self {
		$this->userId = $userId;
		return $this;
	}
}