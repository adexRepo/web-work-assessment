<?php

namespace web\work\assessment\Repository;

use web\work\assessment\Domain\BenefitRule;

class BenefitRuleRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findById(string $ruleId):?BenefitRule
    {
        $query = $this->connection->prepare(
            "SELECT * FROM benefit_rule where rule_id = ?"
        );

        $query->execute([$ruleId]);
        $outputQuery = $query->fetch();
        if($outputQuery === false) return null;

        try{
            $benefit = new BenefitRule();
            $benefit->setRuleId($outputQuery['rule_id']);
            $benefit->setUserId($outputQuery['user_id']);
            $benefit->setDepartement($outputQuery['departement']);
            $benefit->setContract($outputQuery['contract']);
            $benefit->setPrincipalSalary($outputQuery['principal_salary']);
            $benefit->setTargetOfDay($outputQuery['target']);
            $benefit->setInterestSalary($outputQuery['interest_salary']);
            $benefit->setPromotionType($outputQuery['promotion_type']);
            $benefit->setPromotionStandart($outputQuery['promotion']);
            $benefit->setRemark($outputQuery['remark']);

            return $benefit;
        }
        finally{
            $query->closeCursor();
        }
    }

    public function save(BenefitRule $benefit)
    {
        $query = $this->connection->prepare(
            "INSERT INTO 
                benefit_rule(
                    rule_id,
                    user_id,
                    departement,
                    principal_salary, 
                    target,
                    contract,
                    interest_salary,
                    promotion_type,
                    promotion,
                    remark
                    )
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $query->execute([
            $benefit->getRuleId(),
            $benefit->getUserId(),
            $benefit->getDepartement(),
            $benefit->getPrincipalSalary(),
            $benefit->getTargetOfDay(),
            $benefit->getContract(),
            $benefit->getInterestSalary(),
            $benefit->getPromotionType(),
            $benefit->getPromotionStandart(),
            $benefit->getRemark()
        ]);

        try{
            return $benefit;
        }
        finally{
            $query->closeCursor();
        }
    }

    public function update(BenefitRule $benefit)
    {
        $query = $this->connection->prepare( 
            "UPDATE benefit_rule SET 
                    rule_id = ?,
                    user_id = ?,
                    departement = ?,
                    principal_salary = ?,
                    target = ?,
                    contract = ?,
                    interest_salary = ?,
                    promotion_type = ?,
                    promotion = ?,
                    remark = ?
                WHERE rule_id = ?");

        $query->execute([
            $benefit->getRuleId(),
            $benefit->getUserId(),
            $benefit->getDepartement(),
            $benefit->getPrincipalSalary(),
            $benefit->getTargetOfDay(),
            $benefit->getContract(),
            $benefit->getInterestSalary(),
            $benefit->getPromotionType(),
            $benefit->getPromotionStandart(),
            $benefit->getRemark()
        ]);

        try{
            return $benefit;
        }
        finally{
            $query->closeCursor();
        }    
    }

    public function findByUserIdAndDeptAndContract(BenefitRule $benefit):BenefitRule
    {

        $query = $this->connection->prepare(
            "SELECT * FROM benefit_rule where user_id = ? and departement = ? and contract = ?"
        );

        $query->execute([
            $benefit->getUserId(),
            $benefit->getDepartement(),
            $benefit->getContract(),
        ]);

        $outputQuery = $query->fetch();

        if($outputQuery === false) return null;

        try {
            return $outputQuery;
        } finally {
            $query->closeCursor();
        }
        

    }


}