<?php


namespace web\work\assessment\App;


class View
{
    public static function render(string $view, array $model = [], string $isLogin): void
    {
        if($isLogin){

            require __DIR__ . '/../View/components/header.php';
            require __DIR__ . '/../View/' . $view . '.php';
            require __DIR__ . '/../View/components/footer.php';
        }else{
            require __DIR__ . '/../View/' . $view . '.php';

        }
    }

    public static function redirect (string $url): void
    {
        header('Location: ' . $url);
        exit;
    }

}