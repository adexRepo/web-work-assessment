<?php

namespace web\work\assessment\Repository;

use web\work\assessment\Domain\UserBase;
use web\work\assessment\Domain\AdviceTrace;

/**
 * @author Adek Kristiyanto <dkkrstnt@gmail.com>
 * @package web\work\assessment\Repository
 */

class UserBaseRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(UserBase $userBase):UserBase
    {
        $query = $this->connection->prepare(
            "INSERT INTO 
                user_base(user_id,name, gender, password)
                VALUES(?, ?, ?, ?)"
        );

        $query->execute([
            $userBase->getUserId(),
            $userBase->getName(),
            $userBase->getGender(),
            $userBase->getPassword()
        ]);
        return $userBase;
    }

    public function update(UserBase $req):UserBase
    {
        $query = $this->connection->prepare( 
            "UPDATE user_base SET 
                name = ?,
                phone = ?,
                email = ?
                WHERE user_id = ?");

        $query->execute([
            $req->getName(),
            $req->getPhone(),
            $req->getEmail(),
            $req->getUserId(),
        ]);

        $query->closeCursor();
        return $req;
    }

    public function findById(string $userId): ?UserBase
    {
        $query = $this->connection->prepare(
            "SELECT
                user_id   
                ,name      
                ,(select value from code_base cb  where type = 'GENDER' and code = gender) as  gender
                ,(select value from code_base cb  where type = 'STATUSUSER' and code = status) as  status
                ,password    
                ,phone       
                ,email   
                ,(select value from code_base cb  where type = 'AUTHUSER' and code = auth_user) as  auth_user
                ,departement 
                ,branch_id 
                ,(select value from code_base cb  where type = 'CONTRACT' and code = contract) as  contract
                ,last_contract
                ,date_regist
                ,date_updated
                ,remark    
            from
                user_base
            where user_id = ?
            "
        );
        $query->execute([$userId]);
        $outputQuery = $query->fetch();
        if($outputQuery === false) return null;

        try {

            $user = new UserBase();
            $user->setUserId      ($outputQuery['user_id'      ]);
            $user->setName        ($outputQuery['name'         ]);
            $user->setGender      ($outputQuery['gender'       ]);
            $user->setStatus      ($outputQuery['status'       ] ?? 0);
            $user->setPassword    ($outputQuery['password'     ]);
            $user->setPhone       ($outputQuery['phone'        ] ?? 0);
            $user->setEmail       ($outputQuery['email'        ] ?? '');
            $user->setAuthUser    ($outputQuery['auth_user'    ] ?? 0);
            $user->setDepartement ($outputQuery['departement'  ] ?? '');
            $user->setBranchId    ($outputQuery['branch_id'    ] ?? '');
            $user->setContract    ($outputQuery['contract'     ] ?? 0);
            $user->setLastContract($outputQuery['last_contract'] ?? '');
            $user->setDateRegist  ($outputQuery['date_regist'  ] ?? '');
            $user->setDateUpdated ($outputQuery['date_updated'  ] ?? '');
            $user->setRemark      ($outputQuery['remark'       ] ?? '');

            return $user;
        }finally{
            $query->closeCursor();
        }
    }

    public function insertAdvice(AdviceTrace $advice)
    {
        $query = $this->connection->prepare(
            "INSERT INTO 
                advice_trace(user_id,title, message)
                VALUES(?, ?, ?)"
        );

        $query->execute([
            $advice->getUserId(),
            $advice->getTitle(),
            $advice->getMessage()
        ]);
        return $advice;
    }

    public function findCountIdRegistered():int
    {
        $query = $this->connection->prepare(
            "SELECT COUNT(user_id) FROM user_base"
        );
        $query->execute();
        $outputQuery = $query->fetch();
        if($outputQuery === false) return 0;
        return $outputQuery[0];
    }


    public function deleteAll(): void
    {
        $query = $this->connection->prepare(
            "DELETE FROM user_base"
        );
        $query->execute();
    }
}
