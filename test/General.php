<?php

$current = new DateTime();
$current->setTimeZone(new DateTimeZone('Asia/Jakarta'));
$date = $current->format('Ymd');
$time = $current->format('H:i:s');

var_dump($current);
var_dump($date);
var_dump($time);
///

$current = new DateTime();
    $current->setTimeZone(new DateTimeZone('Asia/Jakarta'));
    $date = $current->format('Ymd');
    $jamMasuk = DateTime::createFromFormat('H:i:s', '08:00:00');
    $currentFormat = $current->format('Y-m-d H:i:s');
    
    if($current < $jamMasuk)
    {
        echo 'yaa saat ini lebih dari jam masuk';
    }