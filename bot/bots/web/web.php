<?php
include ( dirname(__FILE__) . "/../../class/DB/chtodb.php" );
$toweb = new ChToDb();
include ( dirname(__FILE__) . "/../../class/file.php");
$file = new File();

if ($var->chat_id == $var->mainCh_id)
{


    error_log("i take message from main channel ");
    if ( $var->media_photo !== null)
    {
        //very small photo for cover
        $thumb = $file->getFile($var->bot_token , $var->media_photoSmaller_file8id ,"/home/geeksesi/public_html/telegram/upload/" , "photo"  );
        //medium photo
        $mediaLink = $file->getFile($var->bot_token , $var->media_photoMedium_file8id ,"/home/geeksesi/public_html/telegram/upload/" , "photo"  );
        $mediaType = "photo";
    }
    elseif ( $var->media_document !== null  )
    {
        error_log("it's document");
        //very small photo for cover
        $thumb = "https://geeksesi.xyz/telegram/upload/thumbnails/document_thumb.png";
        //medium photo
        $mediaLink = $file->getFile($var->bot_token , $var->media_document_file8id ,"/home/geeksesi/public_html/telegram/upload/" , "document"  );
        $mediaType = "document";
    }
    elseif ( $var->media_voice !==null )
    {
        //very small photo for cover
        $thumb = "https://geeksesi.xyz/telegram/upload/thumbnails/voice_thumb.png";
        //medium photo
        $mediaLink = $file->getFile($var->bot_token , $var->media_voice_file8id , "/home/geeksesi/public_html/telegram/upload/" , "voice"  );
        $mediaType = "voice";
    }
    elseif ( $var->media_video !==null )
    {
        //very small photo for cover
        $thumb = "https://geeksesi.xyz/telegram/upload/thumbnails/video_thumb.png";
        //medium photo
        $mediaLink = $file->getFile($var->bot_token , $var->media_video_file8id , "/home/geeksesi/public_html/telegram/upload/" , "video"  );
        $mediaType = "video";
    }
    elseif ( $var->media_audio !== null)
    {
        //very small photo for cover
        $thumb = "https://geeksesi.xyz/telegram/upload/thumbnails/music_thumb.png";
        //medium photo
        $mediaLink = $file->getFile($var->bot_token , $var->media_audio_file8id , "/home/geeksesi/public_html/telegram/upload/" , "audio"  );
        $mediaType = "audio";
    }
    else
    {
        //very small photo for cover
        $thumb = null;
        //medium photo
        $mediaLink = null;
        $mediaType = null;
        error_log("fuck media");
    }
    $tags = null ;
    $text = null ;
    if ( $var->media_caption !==null)
    {
        //explode Caption
        $text = $var->media_caption ;
        $explode = explode(" " , $var->media_caption);

        foreach ($explode as $ex)
        {
            $split = str_split($ex);
            if ($split[0] == "#")
            {
                $tags = $tags . $ex . " ";
            } else {
                continue;
            }
        }

    }
    elseif ( $var->message_text !==null)
    {
        //explode Text
        $text = $var->message_text;
        $explode = explode(" " , $var->message_text);
        foreach ($explode as $ex)
        {
            $split = str_split($ex);
            if ($split[0] == "#")
            {
                $tags = $tags  . $ex . " ";
            } else {
                continue;
            }
        }

    }

    if (isset($var->forward_fromChat) || $var->forward_fromChat !==null)
    {

    }
    elseif (isset($var->forward_from) || $var->forward_from !==null)
    {

    }


    // add post details in Database
    $webResult = $toweb->toDb($var->forward_fromChat_id ,$mediaLink , $mediaType ,$text ,$tags, $thumb ,$var->message_date , $var->forward_fromChat_user8name , "channel" );
    if ($webResult === true)
    {
     error_log("true ! add in Db is True");
     error_log("text is : {$text}" );
    }
    else
    {
        error_log("false !{$webResult}");
    }
}
