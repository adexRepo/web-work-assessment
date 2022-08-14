<?php

namespace web\work\assessment\Domain;

class Session
{
    private string $sessionId;
    private string $userId;

	/**
	 * @return string
	 */
	function getUserId(): string {
		return $this->userId;
	}
	
	/**
	 * @param string $userId 
	 * @return Session
	 */
	function setUserId(string $userId): self {
		$this->userId = $userId;
		return $this;
	}
	/**
	 * @return string
	 */
	function getSessionId(): string {
		return $this->sessionId;
	}
	
	/**
	 * @param string $sessionId 
	 * @return Session
	 */
	function setSessionId(string $sessionId): self {
		$this->sessionId = $sessionId;
		return $this;
	}
}