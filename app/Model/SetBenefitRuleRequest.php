<?php

namespace web\work\assessment\Model;

class SetBenefitRuleRequest
{
    private ?string $ruleId            = null;
    private ?string $userId            = null;
    private ?int $promotionType     = null;
    private ?int    $contract          = null;
    private ?int    $departement       = null;
    private ?int    $principalSalary   = null;
    private ?int    $targetOfDay       = null;
    private ?int    $interestSalary    = null;
    private ?int    $promotionStandart = null;
    private ?string $remark            = null;


    /**
     * Get the value of ruleId
     *
     * @return ?string
     */
    public function getRuleId(): ?string
    {
        return $this->ruleId;
    }

    /**
     * Set the value of ruleId
     *
     * @param ?string $ruleId
     *
     * @return self
     */
    public function setRuleId(?string $ruleId): self
    {
        $this->ruleId = $ruleId;

        return $this;
    }

    /**
     * Get the value of contract
     *
     * @return ?int
     */
    public function getContract(): ?int
    {
        return $this->contract;
    }

    /**
     * Set the value of contract
     *
     * @param ?int $contract
     *
     * @return self
     */
    public function setContract(?int $contract): self
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * Get the value of departement
     *
     * @return ?int
     */
    public function getDepartement(): ?int
    {
        return $this->departement;
    }

    /**
     * Set the value of departement
     *
     * @param ?int $departement
     *
     * @return self
     */
    public function setDepartement(?int $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get the value of principalSalary
     *
     * @return ?int
     */
    public function getPrincipalSalary(): ?int
    {
        return $this->principalSalary;
    }

    /**
     * Set the value of principalSalary
     *
     * @param ?int $principalSalary
     *
     * @return self
     */
    public function setPrincipalSalary(?int $principalSalary): self
    {
        $this->principalSalary = $principalSalary;

        return $this;
    }

    /**
     * Get the value of targetOfDay
     *
     * @return ?int
     */
    public function getTargetOfDay(): ?int
    {
        return $this->targetOfDay;
    }

    /**
     * Set the value of targetOfDay
     *
     * @param ?int $targetOfDay
     *
     * @return self
     */
    public function setTargetOfDay(?int $targetOfDay): self
    {
        $this->targetOfDay = $targetOfDay;

        return $this;
    }

    /**
     * Get the value of interestSalary
     *
     * @return ?int
     */
    public function getInterestSalary(): ?int
    {
        return $this->interestSalary;
    }

    /**
     * Set the value of interestSalary
     *
     * @param ?int $interestSalary
     *
     * @return self
     */
    public function setInterestSalary(?int $interestSalary): self
    {
        $this->interestSalary = $interestSalary;

        return $this;
    }

    /**
     * Get the value of promotionStandart
     *
     * @return ?int
     */
    public function getPromotionStandart(): ?int
    {
        return $this->promotionStandart;
    }

    /**
     * Set the value of promotionStandart
     *
     * @param ?int $promotionStandart
     *
     * @return self
     */
    public function setPromotionStandart(?int $promotionStandart): self
    {
        $this->promotionStandart = $promotionStandart;

        return $this;
    }

    /**
     * Get the value of remark
     *
     * @return ?string
     */
    public function getRemark(): ?string
    {
        return $this->remark;
    }

    /**
     * Set the value of remark
     *
     * @param ?string $remark
     *
     * @return self
     */
    public function setRemark(?string $remark): self
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Get the value of userId
     *
     * @return ?string
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @param ?string $userId
     *
     * @return self
     */
    public function setUserId(?string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
	/**
	 * @return ?int
	 */
	function getPromotionType(): ?int {
		return $this->promotionType;
	}
	
	/**
	 * @param ?int $promotionType 
	 * @return SetBenefitRuleRequest
	 */
	function setPromotionType(?int $promotionType): self {
		$this->promotionType = $promotionType;
		return $this;
	}
}