<?php

namespace web\work\assessment\Service;

use web\work\assessment\Config\Database;
use web\work\assessment\Domain\BenefitRule;
use web\work\assessment\Model\BenefitRuleRequest;
use web\work\assessment\Model\BenefitRuleResponse;
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
            Database::beginTransaction();

            $benefit = new BenefitRule();
            $benefit->setRuleId           ($req->getRuleId());
            $benefit->setUserId           ($req->getUserId());
            $benefit->setDepartement      ($req->getDepartement());
            $benefit->setPrincipalSalary  ($req->getPrincipalSalary());
            $benefit->setContract         ($req->getContract());
            $benefit->setTargetOfDay      ($req->getTargetOfDay());
            $benefit->setInterestSalary   ($req->getInterestSalary());
            $benefit->setPromotionType    ($req->getPromotionType());
            $benefit->setPromotionStandart($req->getPromotionStandart());
            $benefit->setRemark           ($req->getRemark());

            $res = $this->benefitRuleRepository->findById($req->getRuleId());

            if($res != null)
            {
                $this->benefitRuleRepository->update($benefit);
            }else{
                $this->benefitRuleRepository->save($benefit);
            }

            Database::commit();
            return $benefit;
        } catch (\Throwable $th) {
            Database::rollBack();
            throw $th;
        }
    }

    public function benefitRule(BenefitRuleRequest $req):BenefitRuleResponse
    {
        try {
            Database::beginTransaction();

            $benefit = new BenefitRule();
            $benefit->setDepartement      ($req->getDept());
            $benefit->setContract      ($req->getContract());

            $resultDataRule = $this->benefitRuleRepository->findByUserIdAndDeptAndContract($benefit);

            $response = new BenefitRuleResponse();
            $response->setBenefit($resultDataRule);
            Database::commit();
            return $response;
        } catch (\Throwable $th) {
            Database::rollBack();
            throw $th;
        }
    }
}