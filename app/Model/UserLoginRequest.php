<?php

namespace web\work\assessment\Model;

class UserLoginRequest
{
    private   ?string      $userId   = null ;
    private   ?string      $password = null ;
	/**
	 * @return ?string
	 */
	function getUserId(): ?string {
		return $this->userId;
	}
	
	/**
	 * @param ?string $userId 
	 * @return UserLoginRequest
	 */
	function setUserId(?string $userId): self {
		$this->userId = $userId;
		return $this;
	}
	/**
	 * @return ?string
	 */
	function getPassword(): ?string {
		return $this->password;
	}
	
	/**
	 * @param ?string $password 
	 * @return UserLoginRequest
	 */
	function setPassword(?string $password): self {
		$this->password = $password;
		return $this;
	}
}