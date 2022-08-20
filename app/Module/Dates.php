<?php

namespace web\work\assessment\Module;
use DateTime;
use DateTimeZone;

class Dates
{

    public static function dateToday(){
        $current = new DateTime();
        $current->setTimeZone(new DateTimeZone('Asia/Jakarta'));
        return $current;
    }

    public static function dateNowFormatYmd(){
        $current = self::dateToday();
        return $current->format('Ymd');
    }

    public static function dateNowMonth(){
        $current = self::dateToday();
        return $current->format('Ymd');
    }
}