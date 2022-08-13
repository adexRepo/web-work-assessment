<?php


function getDatabaseConfig():array
{

    // environment variables
    // for now test same with prod .. mager buat db baru dan table2 baru nya

    // test / dev / uat
    $test = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'db_web_work_assessment', 
        'username' => 'root',
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
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8'
    ];
    $urlProd = $production['driver']. ':host='.$production['host'].':'.$production['port'].';dbname='.$production['dbname'];

    return [
        "database"=>
        [
            "test" =>[
                "url"=>$urlTest,
                "username"=>"root",
                "password"=>"",
            ],
            "prod" =>[
                "url"=>$urlProd,
                "username"=>"root",
                "password"=>"",
            ],
        ]
    ];
}