<?php

namespace web\work\assessment\Controller;

use web\work\assessment\App\View;

use web\work\assessment\Service\SessionService;
use web\work\assessment\Config\Database;
use web\work\assessment\Repository\SessionRepository;
use web\work\assessment\Repository\UserBaseRepository;

class HomeController
{
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection();
        
        $sessionRepository = new SessionRepository($connection);
        $userBaseRepository = new UserBaseRepository($connection);

        $this->sessionService = new SessionService($sessionRepository, $userBaseRepository);
        
    }

    function index(): void
    {
        $userCurrent = $this->sessionService->currentSession();
        if($userCurrent == null)
        {
            View::render('User/login',[
                "title"=>"Dashboard",
            ],false);
        }else {
            View::render('Home/index',[
                "title"=>"Dashboard",
                "name"=>$userCurrent->getName(),
            ],true);
        }

    }

    function attendance(): void
    {
        View::render('home/attendance',["title"=>"Attendance"],true);
    }
    function performance(): void
    {
        View::render('home/performance',["title"=>"Performance"],true);
    }
    function promotion(): void
    {
        View::render('home/promotions',["title"=>"Promotion"],true);
    }
    function aboutUs(): void
    {
        View::render('home/about-us',["title"=>"About Us"],true);
    }

}