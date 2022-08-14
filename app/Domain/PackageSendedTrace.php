<?php

namespace web\work\assessment\Domain;

use DateTime;

class PackageSendedTrace
{

    private   string      $id;
    private string $userId;
    private string $date;
    private int $totalPackage;
    private int $codeRemark;
    private string $remark;
    private DateTime $dateUpdated;
    private DateTime $dateRegist; 

	/**
	 * @return string
	 */
	function getId(): string {
		return $this->id;
	}
	
	/**
	 * @param string $id 
	 * @return PackageSendedTrace
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
	 * @return PackageSendedTrace
	 */
	function setUserId(string $userId): self {
		$this->userId = $userId;
		return $this;
	}
	/**
	 * @return string
	 */
	function getDate(): string {
		return $this->date;
	}
	
	/**
	 * @param string $date 
	 * @return PackageSendedTrace
	 */
	function setDate(string $date): self {
		$this->date = $date;
		return $this;
	}
	/**
	 * @return int
	 */
	function getTotalPackage(): int {
		return $this->totalPackage;
	}
	
	/**
	 * @param int $totalPackage 
	 * @return PackageSendedTrace
	 */
	function setTotalPackage(int $totalPackage): self {
		$this->totalPackage = $totalPackage;
		return $this;
	}
	/**
	 * @return int
	 */
	function getCodeRemark(): int {
		return $this->codeRemark;
	}
	
	/**
	 * @param int $codeRemark 
	 * @return PackageSendedTrace
	 */
	function setCodeRemark(int $codeRemark): self {
		$this->codeRemark = $codeRemark;
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
	 * @return PackageSendedTrace
	 */
	function setRemark(string $remark): self {
		$this->remark = $remark;
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
	 * @return PackageSendedTrace
	 */
	function setDateUpdated(DateTime $dateUpdated): self {
		$this->dateUpdated = $dateUpdated;
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
	 * @return PackageSendedTrace
	 */
	function setDateRegist(DateTime $dateRegist): self {
		$this->dateRegist = $dateRegist;
		return $this;
	}
}