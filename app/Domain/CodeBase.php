<?php

namespace web\work\assessment\Domain;

use DateTime;

class CodeBase
{

    private   string      $id;
    private  int $code;
    private string $codeTitle;
    private string $value;
    private DateTime $dateUpdated;
    private DateTime $dateRegist;

	/**
	 * @return DateTime
	 */
	function getDateRegist(): DateTime {
		return $this->dateRegist;
	}
	
	/**
	 * @param DateTime $dateRegist 
	 * @return CodeBase
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
	 * @return CodeBase
	 */
	function setDateUpdated(DateTime $dateUpdated): self {
		$this->dateUpdated = $dateUpdated;
		return $this;
	}
	/**
	 * @return string
	 */
	function getValue(): string {
		return $this->value;
	}
	
	/**
	 * @param string $value 
	 * @return CodeBase
	 */
	function setValue(string $value): self {
		$this->value = $value;
		return $this;
	}
	/**
	 * @return string
	 */
	function getCodeTitle(): string {
		return $this->codeTitle;
	}
	
	/**
	 * @param string $codeTitle 
	 * @return CodeBase
	 */
	function setCodeTitle(string $codeTitle): self {
		$this->codeTitle = $codeTitle;
		return $this;
	}
	/**
	 * @return int
	 */
	function getCode(): int {
		return $this->code;
	}
	
	/**
	 * @param int $code 
	 * @return CodeBase
	 */
	function setCode(int $code): self {
		$this->code = $code;
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
	 * @return CodeBase
	 */
	function setId(string $id): self {
		$this->id = $id;
		return $this;
	}
}