<?php

namespace web\work\assessment\Repository;

use web\work\assessment\Domain\Session;

class SessionRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Session $session):Session
    {
        $query = $this->connection->prepare(
            "INSERT INTO sessions(id, user_id) VALUES(?, ?)"
        );

        $query->execute([$session->getSessionId(),$session->getUserId()]);
        return $session;
    }

    public function findById(string $sessionId): ?Session
    {
        $query = $this->connection->prepare(
            "SELECT * FROM sessions WHERE id = ?"
        );

        $query->execute([$sessionId]);
        $outputQuery = $query->fetch();

        if($outputQuery === false) return null;

        try {
            $session = new Session();
            $session->setSessionId($outputQuery['id']);
            $session->setUserId($outputQuery['user_id']);
            return $session;
        } finally {
            $query->closeCursor();
        }
    }

    public function deleteById(string $id): void
    {
        $query = $this->connection->prepare("DELETE FROM sessions WHERE id = ?");
        $query->execute([$id]);
    }

    public function deleteAll(): void
    {
        $this->connection->exec("DELETE FROM sessions");
    }

}