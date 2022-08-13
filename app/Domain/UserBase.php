<?php

namespace web\work\assessment\Domain;

use DateTime;

class UserBase
{
    // NOTE when registered by kyn
    private   string      $userId       ;
    private   string      $name         ;
    private   int         $gender       ;
    private   string      $password     ;

    // NOTE when registered by spv
    private   int        $status        ;
    private   int        $contract      ;
    private   DateTime   $dateRegist    ;
    private   DateTime   $dateUpdated   ;
    private   int     $authUser      ;
    private   string     $team          ;
    private   string     $departement   ;
    private   string     $branch_id     ;
    private   string     $lastContract  ;
    private   string     $remark        ;

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
	 * @return string
	 */
	function getBranch_id(): string {
		return $this->branch_id;
	}
	
	/**
	 * @param string $branch_id 
	 * @return UserBase
	 */
	function setBranch_id(string $branch_id): self {
		$this->branch_id = $branch_id;
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
	 * @return DateTime
	 */
	function getDateRegist(): DateTime {
		return $this->dateRegist;
	}
	
	/**
	 * @param DateTime $dateRegist 
	 * @return UserBase
	 */
	function setDateRegist(DateTime $dateRegist): self {
		$this->dateRegist = $dateRegist;
		return $this;
	}
	/**
	 * @return DateTime
	 */
	function getDateUpdated(): DateTime {
		return $this->dateUpdated;
	}
	
	/**
	 * @param DateTime $dateUpdated 
	 * @return UserBase
	 */
	function setDateUpdated(DateTime $dateUpdated): self {
		$this->dateUpdated = $dateUpdated;
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
}
