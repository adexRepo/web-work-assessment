<?php

namespace web\work\assessment\Controller;

use web\work\assessment\app\View;
use web\work\assessment\Service\UserService;
use web\work\assessment\Service\SessionService;
use web\work\assessment\Config\Database;
use web\work\assessment\Repository\UserBaseRepository;
use web\work\assessment\Repository\SessionRepository;
use web\work\assessment\Model\UserRegisterRequest;
use web\work\assessment\Exception\ValidationException;
use web\work\assessment\Model\UserLoginRequest;

class UserController
{
    private UserService $userService;
    private SessionService $sessionService;

    public function __construct()
    {
        // setUp for get UserService
        $connection = Database::getConnection(); // alat koneksi
        $userBaseRepository = new UserBaseRepository($connection); // dikoneksiin ke table user_base
        $this->userService = new UserService($userBaseRepository); // service + repository

        $sessionRepository = new SessionRepository($connection);
        $this->sessionService =  new SessionService($sessionRepository, $userBaseRepository);
    }

    public function register()
    {
        View::render('User/register' ,[], false );
    }

    public function postRegister()
    {
        $totalUser = $this->userService-> getCountIdRegistered()+1;
        $newUserId = "user{$totalUser}";

        $request = new UserRegisterRequest();
        $request->setUserId($newUserId);
        $request->setName($_POST['name']);
        $request->setGender($_POST['gender']);
        $request->setPassword($_POST['password']);
        try {
            // execute service
            $this->userService->register($request);

            View::redirect('/users/login');
            
        } catch (ValidationException $e) {
            //code...
            View::render('User/register' ,[
                'error' => $e->getMessage(),
            ], false );

        }
    }
    public function login()
    {
        View::render('User/login' ,[], false );
    }

    public function postLogin()
    {
        $request = new UserLoginRequest();
        $request->setUserId($_POST['userId']);
        $request->setPassword($_POST['password']);
        try {
            // execute service
            $response = $this->userService->login($request);
            $response = $response->getUser();
            
            $this->sessionService->create($response->getUserId());

            View::redirect('/');
        } catch (ValidationException $e) {
            View::render('User/login' ,[
                'error' => $e->getMessage(),
            ], false );
        }
    }
}