<?php

namespace web\work\assessment\Controller;

use web\work\assessment\app\View;
use web\work\assessment\Service\UserService;
use web\work\assessment\Config\Database;
use web\work\assessment\Repository\UserBaseRepository;
use web\work\assessment\Model\UserRegisterRequest;
use web\work\assessment\Exception\ValidationException;

class UserController
{

    private UserService $userService;

    public function __construct()
    {
        // setUp for get UserService
        $connection = Database::getConnection(); // alat koneksi
        $userBaseRepository = new UserBaseRepository($connection); // dikoneksiin ke table user_base
        $this->userService = new UserService($userBaseRepository); // service + repository
    }

    public  function register()
    {
        View::render('User/register' ,[], false );
    }

    public function postRegister()
    {
        $request = new UserRegisterRequest();
        // $request->setUserId($_POST['userId']);
        $request->setUserId('user01');
        $request->setName($_POST['name']);
        $request->setGender($_POST['gender']);
        $request->setPassword($_POST['password']);
        try {
            // execute service
            $this->userService->register($request);

            View::render('User/register', ['success' => 'Register Success'], false);
            
        } catch (ValidationException $e) {
            //code...
            View::render('User/register' ,[
                'error' => 'Email already exists '.$e->getMessage(),
            ], false );

        }
    }
    public  function login()
    {
        View::render('User/register' ,[], false );
    }

    public function postLogin()
    {
        $request = new UserRegisterRequest();
        // $request->setUserId($_POST['userId']);
        $request->setUserId('user01');
        $request->setName($_POST['name']);
        $request->setGender($_POST['gender']);
        $request->setPassword($_POST['password']);
        try {
            // execute service
            $this->userService->register($request);

            View::render('User/register', ['success' => 'Register Success :D'], false);
            
        } catch (ValidationException $e) {
            //code...
            View::render('User/register' ,[
                'error' => 'Email already exists! -_-'.$e->getMessage(),
            ], false );

        }
    }
}