<?php

class File extends JsonDecoder
{
    private function url ($bot_token , $fileId)
    {
       return $apiUrl = 'https://api.telegram.org/bot'.$bot_token.'/getFile?file_id='.$fileId ;
    }
    public function pathToUp($uploadPath , $downloadLink ,$fileName)
    {
        $file = $uploadPath.$fileName;
        file_put_contents($file, file_get_contents($downloadLink));
        return true ;
    }
    public function getFile($botToken , $fileId , $uploadPath ,$type)
    {


        $url = $this->url($botToken , $fileId);
        $decode = parent::decoder($url);
        $path = $decode["result"]["file_path"];
        $size = $decode["result"]["file_size"];
        $downloadLink = "https://api.telegram.org/file/bot".$botToken."/".$path ;
//        $path2 = str_replace($type."/" , "" , $path );
        $this->pathToUp($uploadPath , $downloadLink , $path);
        $link = "https://geeksesi.xyz/telegram/upload/".$path;
        return $link ;

    }

}