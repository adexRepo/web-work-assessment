<?php

namespace web\work\assessment\Middleware;

class AuthMiddleware implements Middleware
{
    function before(): void
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /');
            exit();
        }
    }
}