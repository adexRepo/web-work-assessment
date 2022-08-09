<?php

namespace web\work\assessment\Service;
use web\work\assessment\Model\UserRegisterRequest;
use web\work\assessment\Model\UserRegisterResponse;
use web\work\assessment\Repository\UserBaseRepository;
use web\work\assessment\Exception\ValidationException;
use web\work\assessment\Domain\UserBase;
use web\work\assessment\Config\Database;

class UserService
{

    private UserBaseRepository $userBaseRepository;

    public function __construct(UserBaseRepository $userBaseRepository)
    {
        $this->userBaseRepository = $userBaseRepository;
    }

    public function register(UserRegisterRequest $req): UserRegisterResponse
    {
        // check input
        $this->validationRegist( $req);
        
        try {
            Database::beginTransaction();

                // check in db already exist or not
                $user = $this->userBaseRepository->findById($req->getUserId());
                if($user != null) {
                    throw new ValidationException('User Id already exist');
                }

                // save to db
                $user = new UserBase();
                $user->setUserId($req->getUserId());
                $user->setName($req->getName());
                $user->setGender($req->getGender());
                $user->setPassword(password_hash($req->getPassword(), PASSWORD_BCRYPT));
                $this->userBaseRepository->save($user);

                // return response
                $res = new UserRegisterResponse();
                $res->user = $user;

            Database::commit();
            return $res;
        } catch (\Throwable $th) {
            Database::rollBack();
            throw $th;
        }

        
    }
    
    public function validationRegist(UserRegisterRequest $req): bool
    {
        if(
            $req->getUserId() == null ||
            $req->getName() == null ||
            $req->getGender() == null ||
            $req->getPassword() == null ||
            trim($req->getUserId()) == '' ||
            trim($req->getName()) == '' ||
            trim($req->getPassword()) == ''
        ){ 
            throw new ValidationException("All Input can not blank", 0);
         }

        return true;
    }
}
