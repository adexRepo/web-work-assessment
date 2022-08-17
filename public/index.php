<?php

require_once __DIR__ . '/../vendor/autoload.php';

use web\work\assessment\App\Router;
use web\work\assessment\Controller\HomeController;
use web\work\assessment\Controller\UserController;
use web\work\assessment\Config\Database;
use web\work\assessment\Middleware\MustLoginMiddleware;
use web\work\assessment\Middleware\MustNotLoginMiddleware;

// database config
Database::getConnection('prod');

// Home Controller
Router::add('GET', '/'                , HomeController::class, 'index'      ,[]);
Router::add('GET', '/home/attendance' , HomeController::class, 'attendance' ,[]);
Router::add('GET', '/home/promotions' , HomeController::class, 'promotion'  ,[]);
Router::add('GET', '/home/performance', HomeController::class, 'performance',[]);
Router::add('GET', '/home/about-us'   , HomeController::class, 'aboutUs'    ,[]);

// User Controller
Router::add('GET' , '/users/register', UserController::class, 'register'    ,[MustNotLoginMiddleware::class]);
Router::add('POST', '/users/register', UserController::class, 'postRegister',[MustNotLoginMiddleware::class]);
Router::add('GET' , '/users/login'   , UserController::class, 'login'       ,[MustNotLoginMiddleware::class]);
Router::add('POST', '/users/login'   , UserController::class, 'postLogin'   ,[MustNotLoginMiddleware::class]);
Router::add('GET' , '/users/logout'  , UserController::class, 'logout'      ,[MustLoginMiddleware::class]);

Router::run();;