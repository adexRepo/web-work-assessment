<?php

namespace web\work\assessment\Repository;
use web\work\assessment\Domain\CodeBase;

class CodeBaseRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function cookieCode()
    {
        $query = $this->connection->prepare(
            "SELECT type, code, value from code_base order by `type` asc, code asc;"
        );

        $query->execute([]);
        $outputQuery = $query->fetchAll();
        if($outputQuery === false) return null;

        try{

            return $outputQuery;

        }finally{
            
            $query->closeCursor();
        }
        
    }
}



// f(!in_array($value['type'], $type))
//                 // {
//                 //     array_push($type,$value['type']);

//                 // }else{
                    
//                 // }