<?php

namespace web\work\assessment\Controller;

class HomeController
{
    public function index():void
    {
        $model =[
            'title' => 'Home',
            'content' => 'Welcome to the home page'
        ];

        require __DIR__ . '/../View/Home/index.php';
        echo '<html lang="en">';
    }

    public function hello()
    {
        echo '<h1>Hello hello</h1>';
    }

    public function world()
    {
        echo '<h1>Hello world</h1>';
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