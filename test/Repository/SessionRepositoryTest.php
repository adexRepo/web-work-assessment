<?php

namespace web\work\assessment\Repository;

use PHPUnit\Framework\TestCase;
use web\work\assessment\Config\Database;
use web\work\assessment\Domain\Session;
use web\work\assessment\Domain\UserBase;

class SessionRepositoryTest extends TestCase
{
    private SessionRepository $sessionRepository;
    private UserBaseRepository $userBaseRepository;

    protected function setUp():void
    {
        $this->userBaseRepository = new UserBaseRepository(Database::getConnection());
        $this->sessionRepository = new SessionRepository(Database::getConnection());
        $this->sessionRepository->deleteAll();
        $this->userBaseRepository->deleteAll();

        // buat user dulu
        $user = new UserBase();
        $user->setUserId('user1');
        $user->setName('Adek Kristiyanto');
        $user->setGender(1);
        $user->setPassword(password_hash('rahasia', PASSWORD_BCRYPT));

        $this->userBaseRepository->save($user);
    }

    public function testSaveSuccess()
    {
        $session = new Session();
        $session->setSessionId(uniqid());
        $session->setUserId('user1');

        $this->sessionRepository->save($session);

        $res = $this->sessionRepository->findById($session->getSessionId());

        $this::assertEquals($session->getSessionId(), $res->getSessionId());
        $this::assertEquals($session->getUserId(), $res->getUserId());

    }

    public function testDeleteBySessionId()
    {
        $session = new Session();
        $session->setSessionId(uniqid());
        $session->setUserId('user1');

        $this->sessionRepository->save($session);

        $this->sessionRepository->deleteById($session->getSessionId());

        $res = $this->sessionRepository->findById($session->getSessionId());
        $this::assertNull($res);

    }

    public function testFindBySessionIdNotFound()
    {
        $res = $this->sessionRepository->findById('tralala');
        $this::assertNull($res);
    }

}
