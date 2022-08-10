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

    public function save(UserBase $UserBase):UserBase
    {
        $statement = $this->connection->prepare(
            "INSERT INTO 
                user_base(user_id,name, gender, password)
                VALUES(?, ?, ?, ?)"
        );

        $statement->execute([
            $UserBase->getUserId(),
            $UserBase->getName(),
            $UserBase->getGender(),
            $UserBase->getPassword()
        ]);
        return $UserBase;
    }

    public function findById(string $userId): ?UserBase
    {
        $statement = $this->connection->prepare(
            "SELECT * FROM user_base WHERE user_id = ?"
        );
        $statement->execute([$userId]);
        $row = $statement->fetch();
        if($row === false) return null;

        try {
            $user = new UserBase();
            $user->setUserId($row['user_id']);
            $user->setName($row['name']);
            $user->setGender($row['gender']);
            $user->setPassword($row['password']);
    
            return $user;
        }finally{
            $statement->closeCursor();
        }
    }

    public function deleteAll(): void
    {
        $statement = $this->connection->prepare(
            "DELETE FROM user_base"
        );
        $statement->execute();
    }
}
