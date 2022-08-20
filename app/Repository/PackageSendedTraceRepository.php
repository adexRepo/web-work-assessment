<?php

namespace web\work\assessment\Repository;

use web\work\assessment\Domain\PackageSendedTrace;

class PackageSendedTraceRepository
{

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findByUserIdAndDate(string $userId, string $date):?PackageSendedTrace
    {
        $query = $this->connection->prepare(
            "SELECT * FROM package_sended_trace where user_id = ? and date = ?"
        );

        $query->execute([$userId, $date]);
        $outputQuery = $query->fetch();
        
        if($outputQuery == false) return null;

        try{
            
            $packageSendedTrace = new PackageSendedTrace();
            $packageSendedTrace->setPackageId($outputQuery['package_id']);
            $packageSendedTrace->setDate($outputQuery['date']);
            $packageSendedTrace->setUserId($outputQuery['user_id']);
            $packageSendedTrace->setTotalPackage($outputQuery['total_package']);
            $packageSendedTrace->setCodeRemark($outputQuery['code_remark']);
            $packageSendedTrace->setRemark($outputQuery['remark']);
            return $packageSendedTrace;

        }finally
        {
            $query->closeCursor();
        }
    }

    public function save(PackageSendedTrace $req):?PackageSendedTrace
    {
        $query = $this->connection->prepare(
            "INSERT INTO 
                package_sended_trace(package_id,user_id,date,total_package,code_remark,remark)
                VALUES(?, ?, ?, ?, ?, ?)"
        );

        $query->execute([
            $req->getPackageId(),
            $req->getUserId(),
            $req->getDate(),
            $req->getTotalPackage(),
            $req->getCodeRemark(),
            $req->getRemark(),
        ]);

        $query->closeCursor();
        return $req;
    }


    public function update(PackageSendedTrace $req):?PackageSendedTrace
    {
        $query = $this->connection->prepare(
            "UPDATE package_sended_trace SET 
                total_package = ?,
                code_remark = ?,
                remark = ?
                WHERE package_id = ?"
        );
        $query->execute([
            $req->getTotalPackage(),
            $req->getCodeRemark(),
            $req->getRemark(),
            $req->getPackageId(),
        ]);

        $query->closeCursor();
        return $req;
    }

    public function findTotalAllUserPackageSentThisMonth(string $date)
    {
        $query = $this->connection->prepare(
            "SELECT sum(total_package) from package_sended_trace
            WHERE date like ?"
        );

        $query->execute([$date]);
        $outputQuery = $query->fetch();
        if($outputQuery === false) return 0;

        $query->closeCursor();
        return $outputQuery[0];
    }

    public function findTotalUserPackageSentMonth(string $userId, string $date)
    {
        $query = $this->connection->prepare(
            "SELECT sum(total_package) from package_sended_trace
            WHERE user_id = ? and date like ?"
        );
        $query->execute([$userId, $date]);
        $outputQuery = $query->fetch();
        if($outputQuery === false) return 0;

        $query->closeCursor();

        return $outputQuery[0];
    }
}