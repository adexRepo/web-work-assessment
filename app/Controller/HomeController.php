<?php

namespace web\work\assessment\Controller;

use web\work\assessment\App\View;

class HomeController
{
    function index(): void
    {
        View::render('home/index',["title"=>"Dashboard"],true);
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
        View::render('home/aboutUs',["title"=>"About Us"],true);
    }

}