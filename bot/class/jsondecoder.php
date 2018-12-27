<?php

class JsonDecoder
{
    public function decoder($url)
    {
        $content = file_get_contents($url);
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_URL, $url);
//        $result = curl_exec($ch);
//        curl_close($ch);
        return $decoder = json_decode($content,true);
    }

    public function fowrardMessage($apiUrl ,$chatId , $fromChatId , $messageId )
    {
        $urlAlertPost = $apiUrl."forwardMessage?chat_id={$chatId}&from_chat_id={$fromChatId}&message_id={$messageId}&disable_notification=true";
        $result = $this->decoder($urlAlertPost);
        if ($result["ok"] === true)
        {
            error_log("it's true :)) ");
        }else
        {
            error_log("it's false :(( ");
        }
    }
}