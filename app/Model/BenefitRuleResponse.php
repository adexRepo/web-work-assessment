<?php

namespace web\work\assessment\Model;

use web\work\assessment\Domain\BenefitRule;

class BenefitRuleResponse
{
    private BenefitRule $benefit;
    /**
     * Get the value of benefit
     *
     * @return BenefitRule
     */
    public function getBenefit(): BenefitRule
    {
        return $this->benefit;
    }

    /**
     * Set the value of benefit
     *
     * @param BenefitRule $benefit
     *
     * @return self
     */
    public function setBenefit(BenefitRule $benefit): self
    {
        $this->benefit = $benefit;

        return $this;
    }

}