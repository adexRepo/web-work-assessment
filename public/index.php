<?php

require_once __DIR__ . '/../vendor/autoload.php';

use web\work\assessment\App\Router;
use web\work\assessment\Config\Database;
use web\work\assessment\Controller\HomeController;
use web\work\assessment\Controller\UserController;
use web\work\assessment\Controller\PromotionController;
use web\work\assessment\Middleware\MustLoginMiddleware;
use web\work\assessment\Controller\AttendanceController;
use web\work\assessment\Controller\PerformanceController;
use web\work\assessment\Middleware\MustNotLoginMiddleware;

// database config
Database::getConnection('prod');

// Home Controller
Router::add('GET', '/'                , HomeController::class, 'index'  ,[MustLoginMiddleware::class]);
Router::add('GET', '/home/about-us'   , HomeController::class, 'aboutUs'    ,[MustLoginMiddleware::class]);
Router::add('GET', '/promotion/promotions' , PromotionController::class, 'promotion'  ,[MustLoginMiddleware::class]);

// popup
Router::add('POST', '/popup/send-report' , HomeController::class, 'postSendReport' ,[MustLoginMiddleware::class]);
Router::add('POST', '/popup/update-profile' , HomeController::class, 'postUpdateProfile' ,[MustLoginMiddleware::class]);
Router::add('POST', '/popup/set-benefit' , PromotionController::class, 'postSetBenefitRule' ,[MustLoginMiddleware::class]);
Router::add('POST', '/popup/advice' , HomeController::class, 'postAdvice' ,[MustLoginMiddleware::class]);
Router::add('GET', '/popup/clockin'   , HomeController::class, 'clockIn' ,[MustLoginMiddleware::class]);

// Attendance Controller
Router::add('GET', '/attend/attendance' , AttendanceController::class, 'attendance' ,[MustLoginMiddleware::class]);

// Performance Controller
Router::add('GET', '/perform/performance', PerformanceController::class, 'performance',[MustLoginMiddleware::class]);

// User Controller
Router::add('GET' , '/users/logout'  , UserController::class, 'logout'      ,[MustLoginMiddleware::class]);
Router::add('GET' , '/users/register', UserController::class, 'register'    ,[MustNotLoginMiddleware::class]);
Router::add('POST', '/users/register', UserController::class, 'postRegister',[MustNotLoginMiddleware::class]);
Router::add('GET' , '/users/login'   , UserController::class, 'login'       ,[MustNotLoginMiddleware::class]);
Router::add('POST', '/users/login'   , UserController::class, 'postLogin'   ,[MustNotLoginMiddleware::class]);

Router::run();;