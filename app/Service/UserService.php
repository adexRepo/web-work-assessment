<?php

namespace web\work\assessment\Service;
use web\work\assessment\Model\UserRegisterRequest;
use web\work\assessment\Model\UserRegisterResponse;
use web\work\assessment\Repository\UserBaseRepository;
use web\work\assessment\Exception\ValidationException;
use web\work\assessment\Domain\UserBase;
use web\work\assessment\Config\Database;
use web\work\assessment\Model\UserLoginRequest;
use web\work\assessment\Model\UserLoginResponse;

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
            $req->getName() == null ||
            $req->getGender() == null ||
            $req->getPassword() == null ||
            trim($req->getName()) == '' ||
            trim($req->getGender()) == '' ||
            trim($req->getPassword()) == ''
        ){ 
            throw new ValidationException("All Input can not blank", 0);
         }

        return true;
    }

    public function getCountIdRegistered(): int
    {
        return $this->userBaseRepository->findCountIdRegistered();
    }

    public function login(UserLoginRequest $req):UserLoginResponse
    {
        $this->validateUserLoginRequest($req);

            $user = $this->userBaseRepository->findById($req->getUserId());
            if($user == null) {
                throw new ValidationException('User Id or Password is wrong!');
            }

            if (password_verify($req->getPassword(), $user->getPassword())) {
                $response = new UserLoginResponse();
                $response->setUser($user);
                return $response;
            } else {
                throw new ValidationException("Id or password is wrong");
            }
        
    }

    public function validateUserLoginRequest(UserLoginRequest $req): bool
    {
        if(
            $req->getUserId() == null ||
            $req->getPassword() == null ||
            trim($req->getUserId()) == '' ||
            trim($req->getPassword()) == ''
        ){ 
            throw new ValidationException("User id and Password can not blank!");
         }
        return true;
    }


    public function addInCookieUser(string $userId)
    {
        $arrOutput = $this->userBaseRepository->findById($userId);

        $arr = [];
        $arr['userId'      ] = $arrOutput->getUserId       ();
        $arr['name'        ] = $arrOutput->getName       ();
        $arr['gender'      ] = $arrOutput->getGender         ();
        $arr['phone'       ] = $arrOutput->getPhone       ();
        $arr['email'       ] = $arrOutput->getEmail       ();
        $arr['password'    ] = $arrOutput->getPassword        ();
        $arr['status'      ] = $arrOutput->getStatus        ();
        $arr['contract'    ] = $arrOutput->getContract     ();
        $arr['dateRegist'  ] = $arrOutput->getDateRegist         ();
        $arr['dateUpdated' ] = $arrOutput->getDateUpdated  ();
        $arr['authUser'    ] = $arrOutput->getAuthUser     ();
        $arr['team'        ] = $arrOutput->getTeam      ();
        $arr['departement' ] = $arrOutput->getDepartement ();
        $arr['branchId'    ] = $arrOutput->getBranchId   ();
        $arr['lastContract'] = $arrOutput->getLastContract  ();
        $arr['remark'      ] = $arrOutput->getRemark       ();

        $serial = (serialize($arr));

        setcookie('USER_INFO', base64_encode($serial), time()+3600,'/');
        // $data = unserialize(base64_decode($_COOKIE['USER_INFO']));
    }

}
