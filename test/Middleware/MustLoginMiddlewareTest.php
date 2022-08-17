<?php

namespace web\work\assessment\App {
    function header(string $value){
        echo $value;
    }

}

namespace web\work\assessment\Middleware{

    use PHPUnit\Framework\TestCase;
    use web\work\assessment\Repository\SessionRepository;
    use web\work\assessment\Config\Database;
    use web\work\assessment\Repository\UserBaseRepository;
    
    class MustLoginMiddlewareTest extends TestCase
    {
        private MustLoginMiddleware $mustLoginMiddleware;
        private UserBaseRepository $userBaseRepository;
        private SessionRepository $sessionRepository;
    
        protected function setUp(): void
        {
            $this->mustLoginMiddleware = new MustLoginMiddleware();

            $this->userBaseRepository = new UserBaseRepository(Database::getConnection());
            $this->sessionRepository = new SessionRepository(Database::getConnection());
            $this->sessionRepository->deleteAll();
            $this->userBaseRepository->deleteAll();
        }
    
        public function testBefore(): void
        {
            $this->mustLoginMiddleware->before();
    
            $this->expectOutputRegex("");

        }
    }

}