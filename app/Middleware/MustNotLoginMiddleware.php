<?php

namespace web\work\assessment\Middleware;
use web\work\assessment\Service\SessionService;
use web\work\assessment\Config\Database;
use web\work\assessment\Repository\SessionRepository;
use web\work\assessment\Repository\UserBaseRepository;
use web\work\assessment\App\View;

class MustNotLoginMiddleware implements Middleware
{

    private SessionService $sessionService;

    public function __construct()
    {
        $sessionRepository = new SessionRepository(Database::getConnection());
        $userBaseRepository = new UserBaseRepository(Database::getConnection());
        $this->sessionService = new SessionService($sessionRepository,$userBaseRepository);
    }


    function before(): void
    {
        $user = $this->sessionService->currentSession();
        if($user != null) // mean udah login
        {
            View::redirect('/');
        }
    }
}