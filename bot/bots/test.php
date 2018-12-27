<?php
if($var->message_text == "!text")
{

    $webhook->api("forwardMessage" , array("chat_id" =>$var->me_id , "from_chat_id" => $var->chat_id , "message_id" => $var->message_id));


}
elseif($var->message_text == "!id")
{
    $webhook->api("sendMessage" , array("chat_id" =>$var->chat_id , "text" => $alert->requestPostToDB));


}

elseif (isset($update["message"]["forward_from"]) || isset($update["message"]["forward_from_chat"]))
{
//    $webhook->api("sendMessage" , array("chat_id" =>$var->chat_id , "text" => $var->media_document_file8id));
//    $webhook->api("sendMessage" , array("chat_id" =>$id_chat , "text" => $forwardFrom));
    if (isset($var->media_document) || $var->media_documnet !== null || !empty($var->media_document) )
    {
        $webhook->api("sendMessage" , array("chat_id" =>$var->chat_id , "text" => $var->media_document));
    }else
    {
        $webhook->api("sendMessage" , array("chat_id" =>$var->chat_id , "text" => $var->media_document));
    }


}
elseif(isset($forwardFrom ))
{
    $webhook->api("sendMessage" , array("chat_id" =>$var->chat_id, "text" => $update));

}else
{
//    $webhook->api("sendMessage" , array("chat_id" =>$var->chat_id , "text" => $update));
//    $webhook->api("sendMessage" , array("chat_id" =>$var->chat_id , "text" => $update));
    $webhook->api("sendMessage" ,array("chat_id"=> $var->chat_id , "text" =>$alert->requestPostToDB));
}
