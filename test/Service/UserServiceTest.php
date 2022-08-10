<?php

namespace web\work\assessment\Service;
use PHPUnit\Framework\TestCase;
use web\work\assessment\Config\Database;
use web\work\assessment\Repository\UserBaseRepository;
use web\work\assessment\Model\UserRegisterRequest;
use web\work\assessment\Exception\ValidationException;
use web\work\assessment\Domain\UserBase;

class UserServiceTest extends TestCase
{
    private UserService $userService;
    private UserBaseRepository $userBaseRepository;

    protected function setUp():void
    {
        $connection = Database::getConnection();
        $this->userBaseRepository = new UserBaseRepository($connection);
        $this->userService = new UserService( $this->userBaseRepository);

        $this->userBaseRepository->deleteAll();
    }

    public function testRegisterSuccess() 
    {
        $req = new UserRegisterRequest();
        $req->setUserId('user01');
        $req->setName('Adek Kristiyanto');
        $req->setGender(1);
        $req->setPassword('rahasiaAdek1');

        $res = $this->userService->register($req);
        
        self::assertEquals   ( $req->getUserId  (), $res->user->getUserId  ());
        self::assertEquals   ( $req->getName    (), $res->user->getName    ());
        self::assertEquals   ( $req->getGender  (), $res->user->getGender  ());
        self::assertNotEquals( $req->getPassword(), $res->user->getPassword()); // cara 1

        self::assertTrue(password_verify($req->getPassword(), $res->user->getPassword())); // cara 2
    }

    public function testRegisterFailed()
    {
        $this->expectException(ValidationException::class);

        $req = new UserRegisterRequest();
        $req->setUserId('');
        $req->setName('');
        $req->setGender(6);
        $req->setPassword('');
        $this->userService->register($req);

    }

    public function testUserRegisterDuplicate()
    {
        $user = new UserBase();
        $user->setUserId('user01');
        $user->setName('Adek Kristiyanto');
        $user->setGender(1);
        $user->setPassword('rahasiaAdek1');

        $this->userBaseRepository->save($user);

        $this->expectException(ValidationException::class);

        $req = new UserRegisterRequest();
        $req->setUserId('user01');
        $req->setName('Adek Kristiyanto');
        $req->setGender(1);
        $req->setPassword('rahasiaAdek1');

        $this->userService->register($req);

        

    }

}
