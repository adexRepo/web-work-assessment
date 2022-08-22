<?php

namespace web\work\assessment\Repository;

use web\work\assessment\Domain\UserBase;

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

    public function findById(string $userId): ?UserBase
    {
        $query = $this->connection->prepare(
            "SELECT * FROM user_base WHERE user_id = ?"
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
            $user->setPassword ($outputQuery['password']);
            $user->setPhone       ($outputQuery['phone'        ] ?? 0);
            $user->setEmail       ($outputQuery['email'        ] ?? '');
            $user->setAuthUser    ($outputQuery['auth_user'    ] ?? 0);
            $user->setTeam        ($outputQuery['team'         ] ?? '');
            $user->setDepartement ($outputQuery['departement'  ] ?? '');
            $user->setBranchId    ($outputQuery['branch_id'    ] ?? '');
            $user->setContract    ($outputQuery['contract'     ] ?? 0);
            $user->setLastContract($outputQuery['last_contract'] ?? '');
            $user->setDateRegist  ($outputQuery['date_regist'  ] ?? '');
            $user->setDateUpdated ($outputQuery['date_update'  ] ?? '');
            $user->setRemark      ($outputQuery['remark'       ] ?? '');

            return $user;
        }finally{
            $query->closeCursor();
        }
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
