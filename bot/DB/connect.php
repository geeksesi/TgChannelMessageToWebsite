<?php
header('Content-Type: text/html; charset=utf-8');
// // // // // // // // // // // // // // // // // // // // // // //

define("SERVER_NAME" , "localhost");
define("DB_NAME" , "geeksesi_tg_bot");
define("USER_NAME" , "geeksesi_wp");
define("PASS_WORD" , "09100101543");

// // // // // // // // // // // // // // // // // // // // // // //

$DB = new mysqli(SERVER_NAME , USER_NAME , PASS_WORD , DB_NAME);


$DB->query("SET character_set_results=utf8 ");
mb_language('uni');
mb_internal_encoding('UTF-8');
$DB->query("set names 'utf8'");

## ** ## *** CHECK Connection DB *** ## ** ##

//if ($DB->connect_error) {
//    error_log("Can't Connect To DB  | TG BOOT| ");
//}else{
//error_log("YES I Can Connect To DB  | TG BOOT| ");
//}