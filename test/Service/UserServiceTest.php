<?php

namespace web\work\assessment\Service;
use PHPUnit\Framework\TestCase;
use web\work\assessment\Config\Database;
use web\work\assessment\Repository\UserBaseRepository;
use web\work\assessment\Model\UserRegisterRequest;
class UserServiceTest extends TestCase
{
    private UserService $userService;

    protected function setUp():void
    {
        $connection = Database::getConnection();
        $userBaseRepository = new UserBaseRepository($connection);
        $this->UserService = new UserService($userBaseRepository);
        
        $userBaseRepository->deleteAll();
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

    // public function testRegisterFailed()
    // {
    //     $req = new UserRegisterRequest();
    //     $req->     setUserId          ('user02'      );
    //     $req->     setName            ('Uciha Itachi');
    //     $req->     setGender          ("@"           ); // this will try to make error
    //     $req->     setPassword        ('rahasiaAdek2');

    //     $res = $this->userService->register($req);
        
    //     self::assertEquals   ( $req->getUserId() , $res->user->getUserId  ());
    //     self::assertEquals   ($req->getName()    , $res->user->getName    ());
    //     self::assertEquals   (1                  , $res->user->getGender  ()); // this also try to make error
    //     self::assertNotEquals($req->getPassword(), $res->user->getPassword()); // cara 1

    //     self::assertTrue(password_verify($req->getPassword(), $res->user->getPassword())); // cara 2
    // }

    // public function testUserRegisterDuplicate()
    // {
    //     $req = new UserRegisterRequest ();
    //     $req->     setUserId           ('user01'          );
    //     $req->     setName             ('Adek Kristiyanto');
    //     $req->     setGender           (1                 );
    //     $req->     setPassword         ('rahasiaAdek3'    );

    //     $res = $this->userService->register($req);
        
    //     self::assertEquals   ( $req->getUserId  (), $res->user->getUserId  ());
    //     self::assertEquals   ( $req->getName    (), $res->user->getName    ());
    //     self::assertEquals   ( $req->getGender  (), $res->user->getGender  ());
    //     self::assertNotEquals( $req->getPassword(), $res->user->getPassword()); // cara 1

    //     self::assertTrue(password_verify($req->getPassword(), $res->user->getPassword())); // cara 2
    // }

}
