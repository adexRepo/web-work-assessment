<?php

namespace web\work\assessment\Domain;

class Sessions
{
    private string $id;
    private string $userId;

	/**
	 * @return string
	 */
	function getId(): string {
		return $this->id;
	}
	
	/**
	 * @param string $id 
	 * @return Sessions
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
	 * @return Sessions
	 */
	function setUserId(string $userId): self {
		$this->userId = $userId;
		return $this;
	}
}