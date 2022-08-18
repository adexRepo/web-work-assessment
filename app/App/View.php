<?php

namespace web\work\assessment\App;

class View
{
    public static function render(string $path, array $model = [], string $isLogin): void
    {
        if($isLogin){
            require __DIR__ . '/../View/components/header.php';
            if(isset($model['attendance'])){
                if($model['attendance'])
                echo ("<script language='javascript'>
                        $(document).ready(function() {
                            $('#attendance').modal({backdrop: 'static', keyboard: false})  
                            $('#attendance').modal('show');  
                        })
                        </script>");
            }
            require __DIR__ . '/../View/' . $path . '.php';
            require __DIR__ . '/../View/components/footer.php';

        }else{
            require __DIR__ . '/../View/' . $path . '.php';

        }
    }

    public static function redirect (string $url): void
    {
        header('Location: ' . $url);
        exit;
    }

}