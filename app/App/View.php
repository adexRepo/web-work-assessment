<?php


namespace web\work\assessment\App;


class View
{
    public static function render(string $view, array $model = [], string $isLogin): void
    {
        // if($isLogin){

        //     require __DIR__ . '/../View/header.php';
        //     require __DIR__ . '/../View/' . $view . '.php';
        //     require __DIR__ . '/../View/footer.php';

        //     return;
        // }
        require __DIR__ . '/../View/' . $view . '.php';
    }
}