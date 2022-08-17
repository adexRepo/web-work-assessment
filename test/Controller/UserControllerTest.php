<?php


namespace web\work\assessment\Controller;

require_once __DIR__ . '/../Helper/helper.php';


    use PHPUnit\Framework\TestCase;
    use  web\work\assessment\Config\Database;
    use  web\work\assessment\Domain\UserBase;
    use  web\work\assessment\Repository\UserBaseRepository;
    use web\work\assessment\Controller\UserController;
    use web\work\assessment\Repository\SessionRepository;
    use web\work\assessment\Domain\Session;
    use web\work\assessment\Service\SessionService;

    class UserControllerTest extends TestCase
    {

        private UserController $userController;
        private UserBaseRepository $userBaseRepository;
        private SessionRepository $sessionRepository;

        protected function setUp(): void
        {
            $this->userController = new UserController();
            $this->userBaseRepository = new UserBaseRepository(Database::getConnection());
            $this->sessionRepository = new SessionRepository(Database::getConnection());
            $this->sessionRepository->deleteAll();
            $this->userBaseRepository->deleteAll();
        }

        public function testRegister()
        {
            $this->userController->register();

            $this->expectOutputRegex("[Register]");
            $this->expectOutputRegex("[username]");
            $this->expectOutputRegex("[name]");
            $this->expectOutputRegex("[gender]");
            $this->expectOutputRegex("[password]");
            $this->expectOutputRegex("[confirm_password]");
        }

        public function testPostRegisterSuccess()
        {
            $_POST['userId'] = 'user1';
            $_POST['name'] = 'Adex';
            $_POST['gender'] = 1;
            $_POST['password'] = 'rahasia';

            $this->userController->postRegister();

            $this->expectOutputRegex("[Location: /users/login]");
        }

        public function testPostRegisterValidationError()
        {
            $_POST['userId'] = '';
            $_POST['name'] = 'Adex';
            $_POST['gender'] = 1;
            $_POST['password'] = 'rahasia';

            $this->userController->postRegister();

            $this->expectOutputRegex("[Register]");
            $this->expectOutputRegex("[username]");
            $this->expectOutputRegex("[name]");
            $this->expectOutputRegex("[gender]");
            $this->expectOutputRegex("[password]");
            $this->expectOutputRegex("[User id and Password can not blank!]");

        }

        public function testPostRegisterDuplicate()
        {
            $user = new UserBase();
            $user->setUserId("user1");
            $user->setName('Adek Kristiyanto');
            $user->setGender(1);
            $user->setPassword(password_hash('rahasia', PASSWORD_BCRYPT));
            
            $this->userBaseRepository->save($user);

            $_POST['userId'] = 'user1';
            $_POST['name'] = 'Eko';
            $_POST['gender'] = 1;
            $_POST['password'] = 'rahasia';

            $this->userController->postRegister();

            $this->expectOutputRegex("[Register]");
            $this->expectOutputRegex("[Id]");
            $this->expectOutputRegex("[Name]");
            $this->expectOutputRegex("[Password]");
            $this->expectOutputRegex("[Register new User]");
            $this->expectOutputRegex("[User Id already exists]");
        }

        public function testLogin()
        {
            $this->userController->login();
            $this->expectOutputRegex("[Login]");
            $this->expectOutputRegex("[username]");
            $this->expectOutputRegex("[password]");
        }

        public function testLoginSuccess()
        {
            $user = new UserBase();

            $user->setUserId("user1");
            $user->setName("Adek");
            $user->setGender(1);
            $user->setPassword(password_hash("rahasia", PASSWORD_BCRYPT));

            $this->userBaseRepository->save($user);

            $_POST['userId'] = 'user1';
            $_POST['password'] = 'rahasia';

            // here there is issue idk
            // 1) web\work\assessment\Controller\UserControllerTest::testLoginSuccess
            //     Cannot modify header information - headers already sent by (output started at 
            //     C:\development\github\web-work-assessment\vendor\phpunit\phpunit\src\Util\Printer.php:104)
            // issue : 
            //  https://stackoverflow.com/questions/8028957/how-to-fix-headers-already-sent-error-in-php
            // i think this issue because of php unit line 100 in Printer.php send header first
            //  for getting session, line 100 is using 'print' for us know buffer, anyway not my code..!
            $this->userController->postLogin();

            $this->expectOutputRegex("[Location: /]");
        }

        public function testLogout()
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

            $this->userController->logout();

            $this->expectOutputRegex("[Location: /]");
            $this->expectOutputRegex("[WEB-WORK-SESSION: ]");

        }

    }
