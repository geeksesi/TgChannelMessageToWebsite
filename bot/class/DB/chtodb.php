<?php
    ini_set('safe_mode','off');
    set_time_limit(-1);
    ini_set('max_execution_time', -1);
class ChToDb
{


    public function toDb($from , $media , $mediaType , $text , $tags , $thumb , $timestamp , $sender , $type = "channel" )
    {
        global $DB ;
        if ($tags !== null )
        {
            $tags = trim($tags);
            $tag = explode(" " , $tags);
        }
        else
        {
            $tag = null;

        }
        $query = "INSERT INTO web (channel_id , sender_id , chat_type , text , media_type , media_link , thumb_link , tag_one , tag_two , tag_three , time ) VALUES ('{$from}' , '{$sender}' , '{$type}' , '{$text}' , '{$mediaType}' , '{$media}' , '{$thumb}' ,'{$tag[0]}','{$tag[1]}','{$tag[2]}','{$timestamp}')";
        $result = $DB->query($query);
        if ($result === TRUE)
        {
            return true ;
        }
        else
        {
            return $DB->error;
        }
    }


}