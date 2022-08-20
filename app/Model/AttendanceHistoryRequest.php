<?php

namespace web\work\assessment\Model;

class AttendanceHistoryRequest
{
    private ?string $userId;
    private ?string $month;

    
	/**
	 * @return ?string
	 */
	function getMonth(): ?string {
		return $this->month;
	}
	
	/**
	 * @param ?string $month 
	 * @return AttendanceHistoryRequest
	 */
	function setMonth(?string $month): self {
		$this->month = $month;
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
	 * @return AttendanceHistoryRequest
	 */
	function setUserId(?string $userId): self {
		$this->userId = $userId;
		return $this;
	}
}