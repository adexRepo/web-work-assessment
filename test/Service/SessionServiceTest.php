<?php

namespace web\work\assessment\Service;

require_once __DIR__ . '/../Helper/helper.php';

use PHPUnit\Framework\TestCase;
use web\work\assessment\Config\Database;
use web\work\assessment\Domain\Session;
use web\work\assessment\Domain\UserBase;
use web\work\assessment\Repository\SessionRepository;
use web\work\assessment\Repository\UserBaseRepository;

class SessionServiceTest extends TestCase
{
    private SessionRepository $sessionRepository;
    private UserBaseRepository $userBaseRepository;
    private SessionService $sessionService;

    protected function setUp():void
    {
        $this->sessionRepository = new SessionRepository(Database::getConnection());
        $this->userBaseRepository = new userBaseRepository(Database::getConnection());
        $this->sessionService = new SessionService($this->sessionRepository, $this->userBaseRepository);
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

    public function testCreate()
    {

        $session = $this->sessionService->create('user1');
        $sessionId = $session->getSessionId();
        var_dump($sessionId);

        $this->expectOutputRegex("[WEB-WORK-SESSION : $sessionId]");

        $result = $this->sessionRepository->findById($sessionId);
        self::assertEquals('user1',$result->getUserId());
    }

    public function testDestroy()
    {
        $session = new Session();
        $session->setSessionId(uniqid());
        $session->setUserId('user1');

        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->getSessionId();

        $this->sessionService->destroy();

        $this->expectOutputRegex("[WEB-WORK-SESSION: ]");


        $result = $this->sessionRepository->findById($session->getSessionId());
        self::assertNull($result);

    }

    public function testCurrent()
    {
        $session = new Session();
        $session->setSessionId(uniqid());
        $session->setUserId('user1');

        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->getSessionId();

        $user = $this->sessionService->currentSession();

        self::assertEquals($session->getUserId(), $user->getUserId());
    }
}