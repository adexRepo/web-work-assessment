<?php

namespace web\work\assessment\Service;

use web\work\assessment\Config\Database;
use web\work\assessment\Domain\BenefitRule;
use web\work\assessment\Model\SetBenefitRuleRequest;
use web\work\assessment\Repository\BenefitRuleRepository;

class PromotionService
{
    private BenefitRuleRepository $benefitRuleRepository;

    public function __construct(BenefitRuleRepository $benefitRuleRepository)
    {
        $this->benefitRuleRepository = $benefitRuleRepository;
    }


    public function register(SetBenefitRuleRequest $req)
    {
        try {

            $benefit = new BenefitRule();
            $benefit->setRuleId           ($req->getRuleId(),);
            $benefit->setUserId           ($req->getUserId(),);
            $benefit->setDepartement      ($req->getDepartement(),);
            $benefit->setPrincipalSalary  ($req->getPrincipalSalary(),);
            $benefit->setTargetOfDay      ($req->getTargetOfDay(),);
            $benefit->setInterestSalary   ($req->getInterestSalary(),);
            $benefit->setPromotionType    ($req->getPromotionType(),);
            $benefit->setPromotionStandart($req->getPromotionStandart(),);
            $benefit->setRemark           ($req->getRemark());

            $this->benefitRuleRepository->save($benefit);
            Database::commit();
            return $benefit;
        } catch (\Throwable $th) {
            Database::rollBack();
            throw $th;
        }
    }
}