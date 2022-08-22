<?php

namespace web\work\assessment\Module;


define( 'COOKIE_PORTIONS' , '_piece_' );

function clearpieces( $inKey , $inFirst ) {
    $expire = time()-3600;
   
    for ( $index = $inFirst ; array_key_exists( $inKey.COOKIE_PORTIONS.$index , $_COOKIE ) ; $index += 1 ) {
        setcookie( $inKey.COOKIE_PORTIONS.$index , '' , $expire , '/' , '' , 0 );
        unset( $_COOKIE[$inKey.COOKIE_PORTIONS.$index] );
    }
}

function clearcookie( $inKey ) {
    clearpieces( $inKey , 1 );
    setcookie( $inKey , '' , time()-3600 , '/' , '' , 0 );
    unset( $_COOKIE[$inKey] );
}

function storecookie( $inKey , $inValue , $inExpire ) {
    $decode = serialize( $inValue );
    $decode = gzcompress( $decode );
    $decode = base64_encode( $decode );
   
    $split = str_split( $decode , 4000 );//4k pieces
    $count = count( $split );
   
    for ( $index = 0 ; $index < $count ; $index += 1 ) {
        $result = setcookie( ( $index > 0 ) ? $inKey.COOKIE_PORTIONS.$index : $inKey , $split[$index] , $inExpire , '/' , '' , 0 );
    }
   
    clearpieces( $inKey , $count );
}

function fetchcookie( $inKey ) {
    $decode = $_COOKIE[$inKey];
   
    for ( $index = 1 ; array_key_exists( $inKey.COOKIE_PORTIONS.$index , $_COOKIE ) ; $index += 1 ) {
        $decode .= $_COOKIE[$inKey.COOKIE_PORTIONS.$index];
    }
   
    $decode = base64_decode( $decode );
    $decode = gzuncompress( $decode );
   
    return unserialize( $decode );
}

// class Cookies {

//     // const COOKIE_PORTIONS = '_piece_';
//     public static string $COOKIE_NAME = '_piece_';

//     // define( 'COOKIE_PORTIONS' , '_piece_' );

//     public static function clearpieces( $inKey , $inFirst ) {
//         $expire = time()-3600;
    
//         for ( $index = $inFirst ; array_key_exists( $inKey.self::$COOKIE_NAME.$index , $_COOKIE ) ; $index += 1 ) {
//             setcookie( $inKey.self::$COOKIE_NAME.$index , '' , $expire , '/' , '' , 0 );
//             unset( $_COOKIE[$inKey.self::$COOKIE_NAME.$index] );
//         }
//     }

//     public static function clearcookie( $inKey ) {
//         self::clearpieces( $inKey , 1 );
//         setcookie( $inKey , '' , time()-3600 , '/' , '' , 0 );
//         unset( $_COOKIE[$inKey] );
//     }

//     public static function storecookie( $inKey , $inValue , $inExpire ) {
//         $decode = serialize( $inValue );
//         $decode = gzcompress( $decode );
//         $decode = base64_encode( $decode );
    
//         $split = str_split( $decode , 4000 );//4k pieces
//         $count = count( $split );
    
//         for ( $index = 0 ; $index < $count ; $index += 1 ) {
//             $result = setcookie( ( $index > 0 ) ? $inKey.self::$COOKIE_NAME.$index : $inKey , $split[$index] , $inExpire , '/' , '' , 0 );
//         }
    
//         self::clearpieces( $inKey , $count );
//     }

//     public static function fetchcookie( $inKey ) {
//         $decode = $_COOKIE[$inKey];
    
//         for ( $index = 1 ; array_key_exists( $inKey.self::$COOKIE_NAME.$index , $_COOKIE ) ; $index += 1 ) {
//             $decode .= $_COOKIE[$inKey.self::$COOKIE_NAME.$index];
//         }
    
//         $decode = base64_decode( $decode );
//         $decode = gzuncompress( $decode );
    
//         return unserialize( $decode );
//     }

// }

    