<?php
/**
 *	rip_tags
 *
 *	this foo will replace with empty spaces, tags and control characters
 *
 *
 *  @param   {string}	$string		the string to replace
 */


function rip_tags($string) {

    // ----- remove HTML TAGs -----
    $string = preg_replace ('/<[^>]*>/', ' ', $string);

    // ----- remove control characters -----
    $string = str_replace("\r", '', $string);    // --- replace with empty space
    $string = str_replace("\n", ' ', $string);   // --- replace with space
    $string = str_replace("\t", ' ', $string);   // --- replace with space

    // ----- remove multiple spaces -----
    $string = trim(preg_replace('/ {2,}/', ' ', $string));

    return $string;

}//end rip_tags


/**

 *	trace

 *	this foo will display the content of arrays in a nice and readable fashion

 *  @param   {ARRAY}	$arr		the array to show

 */

function trace($arr){

    echo "<pre>";

    print_r($arr);

    echo "</pre>";

}//end trace


//function get_url_contents($url){
//    $crl = curl_init();
//    $timeout = 5;
//    curl_setopt ($crl, CURLOPT_URL,$url);
//    curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
//    $ret = curl_exec($crl);
//    curl_close($crl);
//    return $ret;
//}