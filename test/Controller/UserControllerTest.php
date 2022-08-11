<?php


namespace web\work\assessment\Controller;

    use PHPUnit\Framework\TestCase;
    use  web\work\assessment\Config\Database;
    use  web\work\assessment\Domain\UserBase;
    use  web\work\assessment\Repository\UserBaseRepository;
    use web\work\assessment\Controller\UserController;

    class UserControllerTest extends TestCase
    {

        private UserController $userController;
        private UserBaseRepository $userBaseRepository;

        protected function setUp(): void
        {
            $this->userController = new UserController();
            $this->userBaseRepository = new UserBaseRepository(Database::getConnection());
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
            $user->userId = "user1";
            $user->name = "Eko";
            $user->gender = 1;
            $user->password = "Trst2343rf!@#";
            

            $this->userRepository->save($user);

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

    }
