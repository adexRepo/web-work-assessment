<?php

namespace web\work\assessment\Domain;

use DateTime;

class AttendanceTrace
{
    private   string      $id         ;
    private   string      $userId     ;
    private   DateTime    $clockIn    ;
    private   int         $status     ;
	/**
	 * @return string
	 */
	function getId(): string {
		return $this->id;
	}
	
	/**
	 * @param string $id 
	 * @return UserBase
	 */
	function setId(string $id): self {
		$this->id = $id;
		return $this;
	}
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
	 * @return DateTime
	 */
	function getClockIn(): DateTime {
		return $this->clockIn;
	}
	
	/**
	 * @param DateTime $clockIn 
	 * @return UserBase
	 */
	function setClockIn(DateTime $clockIn): self {
		$this->clockIn = $clockIn;
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
}
