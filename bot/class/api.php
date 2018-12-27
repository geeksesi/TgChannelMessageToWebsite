<?php

/**
 * Created by PhpStorm.
 * User: javadkhof
 * Date: 7/15/17
 * Time: 10:13 PM
 */
class Api
{
    public $BOT_TOKEN='346742615:AAHai5XRzpSgTB-CtwbDEBLHLDOs1ErZsz4';
    public $api_url='https://api.telegram.org/bot'.BOT_TOKEN.'/';
        private function exec_curl_request($handle)
        {
            $response = curl_exec($handle);

            if ($response === false) {
                $errno = curl_errno($handle);
                $error = curl_error($handle);
                error_log("Curl returned error $errno: $error\n");
                curl_close($handle);
                return false;
            }
            //intval ==> Get the integer value of a variable
            //curl_getinfo ==> Get information regarding a specific transfer
            $http_code = intval(curl_getinfo($handle, CURLINFO_HTTP_CODE));
            curl_close($handle);

            if ($http_code >= 500) {
                // do not wat to DDOS server if something goes wrong
                sleep(10);
                return false;
            } else if ($http_code != 200) {
                $response = json_decode($response, true);
                error_log("Request has failed with error {$response['error_code']}: {$response['description']}\n");
                if ($http_code == 401) {
                    throw new Exception('Invalid access token provided');
                }
                return false;
            } else {
                $response = json_decode($response, true);
                if (isset($response['description'])) {
                    error_log("Request was successfull: {$response['description']}\n");
                }
                $response = $response['result'];
            }

            return $response;
        }
       public function __call($method, $parameters)
       {
           // $method must be  string !
           if (!is_string($method)) {
               error_log("Method name must be a string\n");
               return false;
           }
           //if parametr is empty make defult array
           if (!$parameters) {
               $parameters = array();
           } else if (!is_array($parameters)) {
               error_log("Parameters must be an array\n");
               return false;
           }

           foreach ($parameters as $key => &$val) {
               // encoding to JSON array parameters, for example reply_markup
               if (!is_numeric($val) && !is_string($val)) {
                   $val = json_encode($val);
               }
           }
           // http_build_query ==> Generate URL-encoded query string
           $url = $this->api_url.$method.'?'.http_build_query($parameters);

           $handle = curl_init($url);
           curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
           curl_setopt($handle, CURLOPT_TIMEOUT, 60);

           return $this->exec_curl_request($handle);
       }




}