<?php

namespace web\work\assessment\Domain;

use DateTime;

class UserBase
{
    // NOTE when registered by kyn
    private   string      $userId       ;
    private   string      $name         ;
    private   string      $gender       ;
	
    // NOTE when registered by spv
    private   string      $phone         ;
    private   string      $email         ;
    private   string      $password      ;
    private   string      $status        ;
    private   string      $contract      ;
    private   string      $dateRegist    ;
    private   string      $dateUpdated   ;
    private   string      $authUser      ;
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

    /**
     * Get the value of phone
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @param string $phone
     *
     * @return self
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of gender
     *
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @param string $gender
     *
     * @return self
     */
    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of contract
     *
     * @return string
     */
    public function getContract(): string
    {
        return $this->contract;
    }

    /**
     * Set the value of contract
     *
     * @param string $contract
     *
     * @return self
     */
    public function setContract(string $contract): self
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * Get the value of status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of authUser
     *
     * @return string
     */
    public function getAuthUser(): string
    {
        return $this->authUser;
    }

    /**
     * Set the value of authUser
     *
     * @param string $authUser
     *
     * @return self
     */
    public function setAuthUser(string $authUser): self
    {
        $this->authUser = $authUser;

        return $this;
    }
}
