<?php

namespace web\work\assessment\Controller;

use PHPUnit\Framework\TestCase;
use web\work\assessment\Repository\UserBaseRepository;
use web\work\assessment\Repository\SessionRepository;
use web\work\assessment\Config\Database;
use web\work\assessment\Domain\UserBase;
use web\work\assessment\Domain\Session;
use web\work\assessment\Service\SessionService;

class HomeControllerTest extends TestCase
{
    
    private HomeController $homeController;

    private UserBaseRepository $userBaseRepository;

    private SessionRepository $sessionRepository;

    protected function setUp(): void
    {
        $this->homeController = new HomeController();
        $this->userBaseRepository = new UserBaseRepository(Database::getConnection());
        $this->sessionRepository = new SessionRepository(Database::getConnection());
        $this->sessionRepository->deleteAll();
        $this->userBaseRepository->deleteAll();
    }
    
    public function testGuest()
    {
        $this->homeController->index();

        $this->expectOutputRegex("[User Id]");
    }
    public function testUserLogin()
    {
        $user = new UserBase();
        $user->setUserId('user1');
        $user->setName('Adex');
        $user->setGender(1);
        $user->setPassword(password_hash('rahasia', PASSWORD_BCRYPT));
        $this->userBaseRepository->save($user);

        $session = new Session();
        $session->setSessionId(uniqid());
        $session->setUserId($user->getUserId());
        $this->sessionRepository->save($session);

        $_COOKIE[SessionService::$COOKIE_NAME] = $session->getSessionId();

        $this->homeController->index();

        $this->expectOutputRegex("[Dashboard]");
    }
}