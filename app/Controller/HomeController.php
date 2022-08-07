<?php

namespace web\work\assessment\Controller;

use web\work\assessment\App\View;

class HomeController
{
    public function index():void
    {
        $model =[
            'title' => 'Home',
            'content' => 'Welcome to the home page'
        ];

        View::render('Home/index', $model);
    }

    public function hello()
    {
        $model =[
            'title' => 'Home',
            'content' => 'Welcome to the hello page'
        ];

        View::render('Home/index', $model);
    }

    public function world()
    {
        $model =[
            'title' => 'world',
            'content' => 'Welcome to the world page'
        ];

        View::render('Home/index', $model);
    }

    public function loginI()
    {
        $request = [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];

        $user = [

        ];

        $response = [
            'status' => 'success',
            'message' => 'Login successful'
        ];
    }

}