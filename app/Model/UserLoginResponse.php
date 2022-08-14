<?php

namespace web\work\assessment\Model;

use web\work\assessment\Domain\UserBase;

class UserLoginResponse
{
    private UserBase $user;
	/**
	 * @return UserBase
	 */
	function getUser():?UserBase {
		return $this->user;
	}
	
	/**
	 * @param UserBase $user 
	 * @return UserLoginResponse
	 */
	function setUser(UserBase $user): self {
		$this->user = $user;
		return $this;
	}
}