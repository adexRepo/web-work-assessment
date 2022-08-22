<?php

namespace web\work\assessment\Service;

use web\work\assessment\Domain\Session;
use web\work\assessment\Domain\UserBase;
use web\work\assessment\Repository\SessionRepository;
use web\work\assessment\Repository\UserBaseRepository;


class SessionService
{

    public static string $COOKIE_NAME = 'WEB-WORK-SESSION';
    private SessionRepository $sessionRepository;
    private UserBaseRepository $userBaseRepository;

    public function __construct(SessionRepository $sessionRepository, UserBaseRepository $userBaseRepository)
    {
        $this->sessionRepository = $sessionRepository;
        $this->userBaseRepository = $userBaseRepository;
    }

    public function create(string $userId):Session
    {

        $session = new Session();
        $session->setSessionId(uniqid());
        $session->setUserId($userId);

        $this->sessionRepository->save($session);

        // stting cookie
        setcookie(
            self::$COOKIE_NAME,
            $session->getSessionId(),
            // 60 detik, 60 menit, 24 jam, 30 hari, btw 1 hari 86.400 detik
            time() + (60 * 60 * 24 * 30),
            "/"
        );

        return $session;
    }

    public function destroy():void
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';
        $this->sessionRepository->deleteById($sessionId);

        setcookie(self::$COOKIE_NAME, '', time()-3600, '/'); 
        // $_COOKIE[self::$COOKIE_NAME] = null;
        
        setcookie('USER_INFO', '', time()-3600, '/'); 
    }

    public function currentSession(): ?UserBase
    {
        $sessionId = $_COOKIE[self::$COOKIE_NAME] ?? '';

        $session = $this->sessionRepository->findById($sessionId);
        if($session === null) return null;

        $user = $this->userBaseRepository->findById($session->getUserId());

        return $user;
    }

}