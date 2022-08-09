<?php

namespace web\work\assessment\Model;

class UserRegisterRequest
{
    private   ?string      $userId   = null ;
    private   ?string      $name     = null ;
    private   ?int         $gender   = null ;
    private   ?string      $password = null ;


    // GETTER SETTER
	/**
	 * @return ?string
	 */
	function getUserId(): ?string {
		return $this->userId;
	}
	
	/**
	 * @param ?string $userId 
	 * @return UserRegisterRequest
	 */
	function setUserId(?string $userId): self {
		$this->userId = $userId;
		return $this;
	}
	/**
	 * @return ?string
	 */
	function getName(): ?string {
		return $this->name;
	}
	
	/**
	 * @param ?string $name 
	 * @return UserRegisterRequest
	 */
	function setName(?string $name): self {
		$this->name = $name;
		return $this;
	}
	/**
	 * @return ?int
	 */
	function getGender(): ?int {
		return $this->gender;
	}
	
	/**
	 * @param ?int $gender 
	 * @return UserRegisterRequest
	 */
	function setGender(?int $gender): self {
		$this->gender = $gender;
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
	 * @return UserRegisterRequest
	 */
	function setPassword(?string $password): self {
		$this->password = $password;
		return $this;
	}
}