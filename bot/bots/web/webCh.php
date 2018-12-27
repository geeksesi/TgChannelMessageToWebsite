<?php

if ($var->message_text == "!add to web" )
{
    if ($var->reply_id !==null)
    {
        $webhook->api("sendMessage" ,array("chat_id"=> $var->chat_id , "text" =>$alert->requestPostToDB ));
//
         $decoder->fowrardMessage($var->apiUrl , $var->testCh_id , $var->chat_id , $var->reply_id);
//
    }
    else
    {
        $messageS =  $webhook->api("sendMessage" ,array("chat_id"=> $var->chat_id , "text" =>$alert->errorPostToDB ));
    }
}
elseif (isset($update["edited_channel_post"]))
{
    $webhook->api("forwardMessage" , array("chat_id" =>$var->testCh_id , "from_chat_id" => $var->chat_id , "message_id" => $var->message_id));
}


