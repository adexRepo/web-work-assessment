<?php

namespace web\work\assessment\Domain;

use DateTime;

class BenefitRule
{
    private string $id;

    private int $authUser;

    private string $departement;

    private int $contract;

    private string $principalSalary;

    private string $interestSalary;

    private int $target;

    private int $promotion;

    private string $userId;

    private DateTime $dateUpdated;

    private DateTime $dateRegist;

    private string $remark;
	/**
	 * @return string
	 */
	function getRemark(): string {
		return $this->remark;
	}
	
	/**
	 * @param string $remark 
	 * @return BenefitRule
	 */
	function setRemark(string $remark): self {
		$this->remark = $remark;
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
	 * @return BenefitRule
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
	 * @return BenefitRule
	 */
	function setDateUpdated(DateTime $dateUpdated): self {
		$this->dateUpdated = $dateUpdated;
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
	 * @return BenefitRule
	 */
	function setUserId(string $userId): self {
		$this->userId = $userId;
		return $this;
	}
	/**
	 * @return int
	 */
	function getPromotion(): int {
		return $this->promotion;
	}
	
	/**
	 * @param int $promotion 
	 * @return BenefitRule
	 */
	function setPromotion(int $promotion): self {
		$this->promotion = $promotion;
		return $this;
	}
	/**
	 * @return int
	 */
	function getTarget(): int {
		return $this->target;
	}
	
	/**
	 * @param int $target 
	 * @return BenefitRule
	 */
	function setTarget(int $target): self {
		$this->target = $target;
		return $this;
	}
	/**
	 * @return string
	 */
	function getInterestSalary(): string {
		return $this->interestSalary;
	}
	
	/**
	 * @param string $interestSalary 
	 * @return BenefitRule
	 */
	function setInterestSalary(string $interestSalary): self {
		$this->interestSalary = $interestSalary;
		return $this;
	}
	/**
	 * @return string
	 */
	function getPrincipalSalary(): string {
		return $this->principalSalary;
	}
	
	/**
	 * @param string $principalSalary 
	 * @return BenefitRule
	 */
	function setPrincipalSalary(string $principalSalary): self {
		$this->principalSalary = $principalSalary;
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
	 * @return BenefitRule
	 */
	function setContract(int $contract): self {
		$this->contract = $contract;
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
	 * @return BenefitRule
	 */
	function setDepartement(string $departement): self {
		$this->departement = $departement;
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
	 * @return BenefitRule
	 */
	function setAuthUser(int $authUser): self {
		$this->authUser = $authUser;
		return $this;
	}
	/**
	 * @return string
	 */
	function getId(): string {
		return $this->id;
	}
	
	/**
	 * @param string $id 
	 * @return BenefitRule
	 */
	function setId(string $id): self {
		$this->id = $id;
		return $this;
	}
}