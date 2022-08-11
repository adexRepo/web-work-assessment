<?php

namespace web\work\assessment\Controller;

use web\work\assessment\App\View;

class HomeController
{
    function index(): void
    {
        View::render('home/index',["title"=>"Login Dong"],true);
    }

}