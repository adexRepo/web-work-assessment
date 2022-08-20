<?php

namespace web\work\assessment\Model;


class AttendanceHistoryResponse
{
    private array $attendanceHistory;
	/**
	 * @return array
	 */
	function getAttendanceHistory(): array {
		return $this->attendanceHistory;
	}
	
	/**
	 * @param array $attendanceHistory 
	 * @return AttendanceHistoryResponse
	 */
	function setAttendanceHistory(array $attendanceHistory): self {
		$this->attendanceHistory = $attendanceHistory;
		return $this;
	}
}