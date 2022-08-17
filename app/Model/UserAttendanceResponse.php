<?php

namespace web\work\assessment\Model;

use  web\work\assessment\Domain\AttendanceTrace;

class UserAttendanceResponse
{
    private AttendanceTrace $attendaceTrace;
    
	/**
	 * @return AttendanceTrace
	 */
	function getAttendaceTrace(): AttendanceTrace 
    {
		return $this->attendaceTrace;
	}
	
	/**
	 * @param AttendanceTrace $attendaceTrace 
	 * @return UserAttendanceResponse
	 */
	function setAttendaceTrace(AttendanceTrace $attendaceTrace): self 
    {
		$this->attendaceTrace = $attendaceTrace;
		return $this;
	}
}