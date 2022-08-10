<?php

require_once __DIR__ . '/../vendor/autoload.php';

use web\work\assessment\App\Router;
use web\work\assessment\Controller\HomeController;
use web\work\assessment\Controller\UserController;
use web\work\assessment\Config\Database;

// database config
Database::getConnection('prod');

// Home Controller
Router::add('GET', '/', HomeController::class, 'index',[]);

// User Controller
Router::add('GET', '/users/login', UserController::class, 'login',[]);
Router::add('POST', '/users/login', UserController::class, 'postLogin',[]);
Router::add('GET', '/users/register', UserController::class, 'register',[]);
Router::add('POST', '/users/register', UserController::class, 'postRegister',[]);

Router::run();;