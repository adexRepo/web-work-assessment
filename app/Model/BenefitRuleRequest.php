<?php

namespace web\work\assessment\Model;

class BenefitRuleRequest
{
    private ?string $userId;
    private ?string $dept;
    private ?string $contract;

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
     * Get the value of dept
     *
     * @return ?string
     */
    public function getDept(): ?string
    {
        return $this->dept;
    }

    /**
     * Set the value of dept
     *
     * @param ?string $dept
     *
     * @return self
     */
    public function setDept(?string $dept): self
    {
        $this->dept = $dept;

        return $this;
    }

    /**
     * Get the value of contract
     *
     * @return ?string
     */
    public function getContract(): ?string
    {
        return $this->contract;
    }

    /**
     * Set the value of contract
     *
     * @param ?string $contract
     *
     * @return self
     */
    public function setContract(?string $contract): self
    {
        $this->contract = $contract;

        return $this;
    }
}