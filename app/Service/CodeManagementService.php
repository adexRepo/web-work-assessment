<?php

namespace web\work\assessment\Service;
use web\work\assessment\Repository\CodeBaseRepository;

class CodeManagementService
{
    public static string $COOKIE_NAME = 'CODE_CC';

    private CodeBaseRepository $codeBaseRepository;

    public function __construct(CodeBaseRepository $codeBaseRepository)
    {
        $this->codeBaseRepository = $codeBaseRepository;
    }

    public function addCookieCode()
    {
        $arrOutput = $this->codeBaseRepository->cookieCode();

        $serial = (serialize($arrOutput));

        setcookie(self::$COOKIE_NAME, base64_encode($serial), time() + (60 * 60 * 24 * 30),'/');
        // $data = unserialize(base64_decode($_COOKIE[self::$COOKIE_NAME]));
    }
}