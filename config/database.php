<?php


function getDatabaseConfig():array
{

    // environment variables

    // test / dev / uat
    $test = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'db_web_work_assessment',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8'
    ];
    $urlTest =$test['driver']. ':host='.$test['host'].':'.$test['port'].';dbname='.$test['dbname'];

    // production
    $production = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'db_web_work_assessment',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8'
    ];
    $urlProd = $production['driver']. ':host='.$production['host'].':'.$production['port'].';dbname='.$production['dbname'];

    return [
        "database"=>
        [
            "test" =>[
                "url"=>$urlTest,
                "user"=>"root",
                "password"=>"",
            ],
            "prod" =>[
                "url"=>$urlProd,
                "user"=>"root",
                "password"=>"",
            ],
        ]
    ];
}