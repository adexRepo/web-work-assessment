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
            $benefit->getInterestSalary(),
            $benefit->getPromotionType(),
            $benefit->getPromotionStandart(),
            $benefit->getRemark()
        ]);

        return $benefit;
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