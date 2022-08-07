<?php


namespace web\work\assessment\App;


class View
{
    public static function render(string $view, array $model = []): void
    {
        require __DIR__ . '/../View/' . $view . '.php';
    }
}