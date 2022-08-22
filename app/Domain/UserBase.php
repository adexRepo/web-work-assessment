<?php

namespace web\work\assessment\Domain;

use DateTime;

class UserBase
{
    // NOTE when registered by kyn
    private   string      $userId       ;
    private   string      $name         ;
    private   int         $gender       ;
	
    // NOTE when registered by spv
    private   int         $phone         ;
    private   string      $email         ;
    private   string      $password      ;
    private   int         $status        ;
    private   int         $contract      ;
    private   string      $dateRegist    ;
    private   string      $dateUpdated   ;
    private   int         $authUser      ;
    private   string      $team          ;
    private   string      $departement   ;
    private   string      $branchId      ;
    private   string      $lastContract  ;
    private   string      $remark        ;

    // NOTE GETTER SETTER
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
	 * @return string
	 */
	function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 * @return UserBase
	 */
	function setName(string $name): self {
		$this->name = $name;
		return $this;
	}
	/**
	 * @return int
	 */
	function getGender(): int {
		return $this->gender;
	}
	
	/**
	 * @param int $gender 
	 * @return UserBase
	 */
	function setGender(int $gender): self {
		$this->gender = $gender;
		return $this;
	}
	/**
	 * @return string
	 */
	function getPassword() {
		return $this->password;
	}
	
	/**
	 * @param string $password 
	 * @return UserBase
	 */
	function setPassword(string $password): self {
		$this->password = $password;
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
	/**
	 * @return string
	 */
	function getTeam(): string {
		return $this->team;
	}
	
	/**
	 * @param string $team 
	 * @return UserBase
	 */
	function setTeam(string $team): self {
		$this->team = $team;
		return $this;
	}
	/**
	 * @return string
	 */
	function getDepartement(): string {
		return $this->departement;
	}
	
	/**
	 * @param string $departement 
	 * @return UserBase
	 */
	function setDepartement(string $departement): self {
		$this->departement = $departement;
		return $this;
	}
	/**
	 * @return int
	 */
	function getContract(): int {
		return $this->contract;
	}
	
	/**
	 * @param int $contract 
	 * @return UserBase
	 */
	function setContract(int $contract): self {
		$this->contract = $contract;
		return $this;
	}
	/**
	 * @return string
	 */
	function getLastContract(): string {
		return $this->lastContract;
	}
	
	/**
	 * @param string $lastContract 
	 * @return UserBase
	 */
	function setLastContract(string $lastContract): self {
		$this->lastContract = $lastContract;
		return $this;
	}
	/**
	 * @return string
	 */
	function getRemark(): string {
		return $this->remark;
	}
	
	/**
	 * @param string $remark 
	 * @return UserBase
	 */
	function setRemark(string $remark): self {
		$this->remark = $remark;
		return $this;
	}
	/**
	 * @return int
	 */
	function getAuthUser(): int {
		return $this->authUser;
	}
	
	/**
	 * @param int $authUser 
	 * @return UserBase
	 */
	function setAuthUser(int $authUser): self {
		$this->authUser = $authUser;
		return $this;
	}

    /**
     * Get the value of phone
     *
     * @return int
     */
    public function getPhone(): int
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @param int $phone
     *
     * @return self
     */
    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of dateRegist
     *
     * @return string
     */
    public function getDateRegist(): string
    {
        return $this->dateRegist;
    }

    /**
     * Set the value of dateRegist
     *
     * @param string $dateRegist
     *
     * @return self
     */
    public function setDateRegist(string $dateRegist): self
    {
        $this->dateRegist = $dateRegist;

        return $this;
    }

    /**
     * Get the value of branchId
     *
     * @return string
     */
    public function getBranchId(): string
    {
        return $this->branchId;
    }

    /**
     * Set the value of branchId
     *
     * @param string $branchId
     *
     * @return self
     */
    public function setBranchId(string $branchId): self
    {
        $this->branchId = $branchId;

        return $this;
    }

    /**
     * Get the value of dateUpdated
     *
     * @return string
     */
    public function getDateUpdated(): string
    {
        return $this->dateUpdated;
    }

    /**
     * Set the value of dateUpdated
     *
     * @param string $dateUpdated
     *
     * @return self
     */
    public function setDateUpdated(string $dateUpdated): self
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }
}
