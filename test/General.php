<?php

// $current = new DateTime();
// $current->setTimeZone(new DateTimeZone('Asia/Jakarta'));
// $date = $current->format('Ymd');
// $time = $current->format('H:i:s');

//     $jamMasuk = DateTime::createFromFormat('H:i:s', '08:00:00');
//     $currentFormat = $current->format('Y-m-d H:i:s');


    $current = new DateTime();
    $current->setTimeZone(new DateTimeZone('Asia/Jakarta'));
    $date1 = $current->format('Ymd');
    $date2 = $current->format('Ym').'%';
    var_dump($date1);
    var_dump($date2);
    $date3 = strtotime($date1);
    $date4 = date('Ym', strtotime($date1));
    var_dump($date3);

    echo 'ddddddddddddddddddd'.PHP_EOL;
    var_dump($date4);