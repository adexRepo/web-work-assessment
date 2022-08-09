<?php

namespace web\work\assessment\Repository;

use PHPUnit\Framework\TestCase;
use web\work\assessment\Config\Database;
use web\work\assessment\Domain\UserBase;

class UserBaseRepositoryTest extends TestCase
{
    private UserBaseRepository $userBaseRepository;

    protected function setUp():void
    {
        $this->userBaseRepository = new UserBaseRepository(Database::getConnection());
        $this->userBaseRepository->deleteAll();

    }

    public function testSaveSuccess()
    {
        $user = new UserBase   ();
        $user->     setUserId  ('user01'          );
        $user->     setName    ('Adek Kristiyanto');
        $user->     setGender  (1                 );
        $user->     setPassword('lagi testing'    );

        $this->userBaseRepository->save($user);

        $res = $this->userBaseRepository->findById($user->getUserId());

        $this::assertEquals($user->getUserId  (), $res->getUserId  ());
        $this::assertEquals($user->getName    (), $res->getName    ());
        $this::assertEquals($user->getGender  (), $res->getGender  ());
        $this::assertEquals($user->getPassword(), $res->getPassword());

    }

    public function testFindByIdNotFound()
    {
        $res = $this->userBaseRepository->findById('user02');
        $this::assertNull($res);
    }
}