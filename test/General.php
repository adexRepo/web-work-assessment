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







    // "array(10) {
    //     [0]=> array(14) {
    //          ["type"]=> string(7) "ATNDSTS" [0]=> string(7) "ATNDSTS"
    //          ["code"]=> int(1) [1]=> int(1) 
    //          ["code_title"]=> string(22) "Attendance Status Type" [2]=> string(22) "Attendance Status Type" 
    //          ["value"]=> string(4) "Late" [3]=> string(4) "Late" 
    //          ["date_regist"]=> string(19) "2022-08-18 20:27:11" [4]=> string(19) "2022-08-18 20:27:11" 
    //          ["date_updated"]=> string(19) "2022-08-20 07:22:30" [5]=> string(19) "2022-08-20 07:22:30" 
    //          ["remark"]=> NULL [6]=> NULL } 
    //     [1]=> array(14) {
    //          ["type"]=> string(7) "ATNDSTS" [0]=> string(7) "ATNDSTS" 
    //          ["code"]=> int(2) [1]=> int(2) 
    //          ["code_title"]=> string(22) "Attendance Status Type" [2]=> string(22) "Attendance Status Type" 
    //          ["value"]=> string(7) "On Time" [3]=> string(7) "On Time" 
    //          ["date_regist"]=> string(19) "2022-08-18 20:27:11" [4]=> string(19) "2022-08-18 20:27:11" 
    //          ["date_updated"]=> string(19) "2022-08-20 07:23:09" [5]=> string(19) "2022-08-20 07:23:09" 
    //          ["remark"]=> NULL [6]=> NULL } 
    //     [2]=> array(14) {
    //          ["type"]=> string(7) "ATNDSTS" [0]=> string(7) "ATNDSTS" 
    //          ["code"]=> int(3) [1]=> int(3) 
    //          ["code_title"]=> string(22) "Attendance Status Type" [2]=> string(22) "Attendance Status Type" 
    //          ["value"]=> string(5) "Early" [3]=> string(5) "Early" 
    //          ["date_regist"]=> string(19) "2022-08-18 20:27:11" [4]=> string(19) "2022-08-18 20:27:11" 
    //          ["date_updated"]=> string(19) "2022-08-20 07:22:30" [5]=> string(19) "2022-08-20 07:22:30" 
    //          ["remark"]=> NULL [6]=> NULL } 
    //     [3]=> array(14) { ["type"]=> string(9) "CTGREMARK" [0]=> string(9) "CTGREMARK" 
    //         ["code"]=> int(1) [1]=> int(1) 
    //         ["code_title"]=> string(15) "Category Remark" [2]=> string(15) "Category Remark" 
    //         ["value"]=> string(5) "Empty" [3]=> string(5) "Empty" 
    //         ["date_regist"]=> string(19) "2022-08-18 20:27:11" [4]=> string(19) "2022-08-18 20:27:11" 
    //         ["date_updated"]=> string(19) "2022-08-20 07:22:30" [5]=> string(19) "2022-08-20 07:22:30" 
    //         ["remark"]=> NULL [6]=> NULL } 
    //     [4]=> array(14) {
    //         ["type"]=> string(9) "CTGREMARK" [0]=> string(9) "CTGREMARK" ["code"]=> int(2) [1]=> int(2) ["code_title"]=> string(15) "Category Remark" [2]=> string(15) "Category Remark" ["value"]=> string(9) "Just Info" [3]=> string(9) "Just Info" ["date_regist"]=> string(19) "2022-08-18 20:27:11" [4]=> string(19) "2022-08-18 20:27:11" ["date_updated"]=> string(19) "2022-08-20 07:24:25" [5]=> string(19) "2022-08-20 07:24:25" ["remark"]=> NULL [6]=> NULL } [5]=> array(14) { ["type"]=> string(9) "CTGREMARK" [0]=> string(9) "CTGREMARK" ["code"]=> int(3) [1]=> int(3) ["code_title"]=> string(15) "Category Remark" [2]=> string(15) "Category Remark" ["value"]=> string(11) "Information" [3]=> string(11) "Information" ["date_regist"]=> string(19) "2022-08-18 20:27:11" [4]=> string(19) "2022-08-18 20:27:11" ["date_updated"]=> string(19) "2022-08-20 07:24:25" [5]=> string(19) "2022-08-20 07:24:25" ["remark"]=> NULL [6]=> NULL } [6]=> array(14) { ["type"]=> string(9) "CTGREMARK" [0]=> string(9) "CTGREMARK" ["code"]=> int(4) [1]=> int(4) ["code_title"]=> string(15) "Category Remark" [2]=> string(15) "Category Remark" ["value"]=> string(14) "Tips And Trick" [3]=> string(14) "Tips And Trick" ["date_regist"]=> string(19) "2022-08-18 20:27:11" [4]=> string(19) "2022-08-18 20:27:11" ["date_updated"]=> string(19) "2022-08-20 07:24:25" [5]=> string(19) "2022-08-20 07:24:25" ["remark"]=> NULL [6]=> NULL } [7]=> array(14) { ["type"]=> string(9) "CTGREMARK" [0]=> string(9) "CTGREMARK" ["code"]=> int(5) [1]=> int(5) ["code_title"]=> string(15) "Category Remark" [2]=> string(15) "Category Remark" ["value"]=> string(7) "Problem" [3]=> string(7) "Problem" ["date_regist"]=> string(19) "2022-08-18 20:27:11" [4]=> string(19) "2022-08-18 20:27:11" ["date_updated"]=> string(19) "2022-08-20 07:24:26" [5]=> string(19) "2022-08-20 07:24:26" ["remark"]=> NULL [6]=> NULL } [8]=> array(14) { ["type"]=> string(6) "GENDER" [0]=> string(6) "GENDER" ["code"]=> int(1) [1]=> int(1) ["code_title"]=> string(11) "Gender Type" [2]=> string(11) "Gender Type" ["value"]=> string(6) "Female" [3]=> string(6) "Female" ["date_regist"]=> string(19) "2022-08-18 20:27:11" [4]=> string(19) "2022-08-18 20:27:11" ["date_updated"]=> string(19) "2022-08-18 20:27:11" [5]=> string(19) "2022-08-18 20:27:11" ["remark"]=> NULL [6]=> NULL } [9]=> array(14) { ["type"]=> string(6) "GENDER" [0]=> string(6) "GENDER" ["code"]=> int(2) [1]=> int(2) ["code_title"]=> string(11) "Gender Type" [2]=> string(11) "Gender Type" ["value"]=> string(4) "Male" [3]=> string(4) "Male" ["date_regist"]=> string(19) "2022-08-18 20:27:11" [4]=> string(19) "2022-08-18 20:27:11" ["date_updated"]=> string(19) "2022-08-18 20:27:11" [5]=> string(19) "2022-08-18 20:27:11" ["remark"]=> NULL [6]=> NULL } }"
