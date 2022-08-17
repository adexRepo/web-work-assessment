<?php

namespace web\work\assessment\App {
    function header(string $value){
        echo $value;
    }

}

namespace web\work\assessment\Middleware{

    use web\work\assessment\Repository\SessionRepository;
    use web\work\assessment\Config\Database;
    use web\work\assessment\Repository\UserBaseRepository;
    use web\work\assessment\Domain\UserBase;
    use PHPUnit\Framework\TestCase;
    use web\work\assessment\Domain\Session;
    use web\work\assessment\Service\SessionService;
    
    class MustNotLoginMiddlewareTest extends TestCase
    {
        private MustNotLoginMiddleware $mustNotLoginMiddleware;
        private UserBaseRepository $userBaseRepository;
        private SessionRepository $sessionRepository;
    
        protected function setUp(): void
        {
            $this->mustNotLoginMiddleware = new MustNotLoginMiddleware();

            $this->userBaseRepository = new UserBaseRepository(Database::getConnection());
            $this->sessionRepository = new SessionRepository(Database::getConnection());
            $this->sessionRepository->deleteAll();
            $this->userBaseRepository->deleteAll();
        }
    
        public function testBefore(): void
        {
            $this->mustNotLoginMiddleware->before();
    
            $this->expectOutputString("[Location: /users/login]");
        }

        public function testBeforeLoginUser()
        {
            $user = new UserBase();
            $user->setUserId("user99");
            $user->setName("Adek");
            $user->setGender(1);
            $user->setPassword(password_hash("rahasia", PASSWORD_BCRYPT));
            $this->userBaseRepository->save($user);

            $session = new Session();
            $session->setSessionId(uniqid());
            $session->setUserId($user->getUserId());
            $this->sessionRepository->save($session);

            $_COOKIE[SessionService::$COOKIE_NAME] = $session->getSessionId();

            $this->mustNotLoginMiddleware->before();
            $this->expectOutputRegex("[Location: /]");

            // $this->expectOutputString("[Location: /]");
        }

    }

}
