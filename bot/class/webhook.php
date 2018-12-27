<?php

/**
 * Created by PhpStorm.
 * User: javadkhof
 * Date: 7/16/17
 * Time: 12:00 AM
 */
class Webhook
{
    public function api($method , $parametrs)
    {

        if (!is_string($method))
        {
            error_log("Method Must be a string \n");
            return false;
        }
        if (!$parametrs)
        {
            $parametrs = array();
        }elseif (!is_array($parametrs))
        {
            error_log("Parameters must be an array \n");
        }
        $parametrs["method"] = $method;

        header("Content-Type: application/json");
        echo json_encode($parametrs);
        return true ;
    }
    function sendMessage($chatId , $text , $parseMode= "" , $disableWebPagePreview= "" , $disableNotification= "" , $replyToMessageId= "" , $replyMarkup = "" )
    {
        $arg = array(
            "method"                    => "sendMessage"            ,
            "chat_id"                   => $chatId                  ,
            "text"                      => $text                    ,
            "parse_mode"                => $parseMode               ,
            "disable_web_page_preview"  => $disableWebPagePreview   ,
            "disable_notification"      => $disableNotification     ,
            "reply_to_message_id"       => $replyToMessageId        ,
            "reply_markup"              => $replyMarkup
        );
        header("Content-Type: application/json");
        echo json_encode($arg);
        return true ;
    }


}
