<?php


class BasicVar
{
    private $updat;
    private $chat ;
    private $user ;
    private $message ;
    private $reply ;
    private $forward ;
    private $media ;
    public $message_type ;
    public $me_id = '91416644' ;
    public $mainCh_id = "-1001133951346" ;
    public $bot_token = '346742615:AAGbcessuL9GG_6uO3K_kpIVDn5PCeJBzlI';
    public $apiUrl = "https://api.telegram.org/bot346742615:AAGbcessuL9GG_6uO3K_kpIVDn5PCeJBzlI/";
    public $testCh_id = "-1001135667436";
// * # ** ## *** ### **** #### Message Chat Variable #### **** ### *** ## ** # * //
    private function chat($method , $option , $gOc  ) {
        global $update;
        $this->updat = $update;
        // **** *** ** * Chat * ** *** **** //
        $this->chat =  array(
            'type' => $this->updat[$gOc]["chat"]["type"] ,
            'id' => $this->updat[$gOc]["chat"]["id"]
            );
        if($this->chat["type"] == "private" )
        {
            $this->chat['title'] = $this->updat[$gOc]["chat"]["first_name"] ." "." "." ". $this->updat[$gOc]["chat"]["last_name"];
            $this->chat['userName'] = $this->updat[$gOc]["chat"]["username"];
        }
        elseif($this->chat["type"] == "supergroup" )
        {
            $this->chat['title'] = $this->updat[$gOc]["chat"]["title"];
            $this->chat['userName'] = "null";
        }
        elseif($this->chat["type"] == "group" )
        {
            $this->chat['title'] = $this->updat[$gOc]["chat"]["title"];
            $this->chat['userName'] = "null";
        }
        elseif( $this->chat["type"] == "channel" )
        {
            $this->chat['title'] = $this->updat[$gOc]["chat"]["title"];
            $this->chat['userName'] = $this->updat[$gOc]["chat"]["username"];
        }
        if($option !== null || !empty($option) )
        {
            return $this->chat[$method][$option];
        }
        else
        {
            return $this->chat[$method];
        }

    }
// * # ** ## *** ### **** #### Reply To Message #### **** ### *** ## ** # * //
    private function reply($method , $option , $gOc  )
    {
        global $update;
        $this->updat = $update;


        $this->reply = array(
            'id' => $this->updat[$gOc]["reply_to_message"]["message_id"] ,
            'chat' => $this->updat[$gOc]["reply_to_message"]["from"] ,
            //    id
            //    first_name`ligerr`aznm
            //    last_name
            //    username
            //    language_code

            'from' => $this->updat[$gOc]["reply_to_message"]["chat"] ,
            'date' => $this->updat[$gOc]["reply_to_message"]["date"] ,
        );
        // ### ## # Reply To Forward # ## ### //
        if (isset($reply["forward_from"]) || isset($reply["forward_from_chat"]))
        {
            $this->reply["forwardFrom"] = $this->updat[$gOc]["reply_to_message"]["forward_from"] ;
            //    id
            //    first_name
            //    last_name
            //    username
            //    language_code

            $this->reply["forwardFromChat"] = $this->updat[$gOc]["reply_to_message"]["forward_from_chat"] ;
            //    id
            //    title
            //    username
            //    type

            $this->reply["forwardFromMessageId"] = $this->updat[$gOc]["reply_to_message"]["forward_from_message_id"];
            $this->reply["forwardFromMessageDate"] = $this->updat[$gOc]["reply_to_message"]["forward_date"];
        }

        // ### ## # Reply To Media # ## ### //

        # ## ### ### #### PIC #### ### ### ## #

        if( isset( $this->updat[$gOc]["reply_to_message"]["photo"] ) )
        {


            $this->reply["photoSmaller"] = $this->updat[$gOc]["reply_to_message"]["photo"]["0"];
            //file_id
            //file_size
            //file_path
            //width
            //height

            $this->reply["photoSmall"] = $this->updat[$gOc]["reply_to_message"]["photo"]["1"];
            //file_id
            //file_size
            //widthٓ 
            //height

            $this->reply["photoMedium"] = $this->updat[$gOc]["reply_to_message"]["photo"]["2"];
            //file_id
            //file_size
            //width
            //height

            $this->reply["photoLarge"] = $this->updat[$gOc]["reply_to_message"]["photo"]["3"];
            //file_id
            //file_size
            //width
            //height

        }
        # ## ### ### #### DOCUMENT #### ### ### ## #

        elseif (isset( $this->updat[$gOc]["reply_to_message"]["document"] ))
        {
            $this->reply["document"] = $this->updat[$gOc]["reply_to_message"]["document"] ;
            //mime_type
            //file_id
            //file_size
            $this->reply["documentThumb"] = $this->updat[$gOc]["reply_to_message"]["document"]["thumb"];
            //file_id
            //file_size
            //width
            //height
        }
        # ## ### ### #### VOICE #### ### ### ## #

        elseif (isset( $this->updat[$gOc]["reply_to_message"]["voice"] ))
        {
            $this->reply["voice"] = $this->updat[$gOc]["reply_to_message"]["voice"] ;
            //duration
            //mime_type
            //file_id
            //file_size

        }
        # ## ### ### #### AUDIO #### ### ### ## #
        elseif (isset( $this->updat[$gOc]["reply_to_message"]["audio"] ))
        {
            $this->reply["audio"] = $this->updat[$gOc]["reply_to_message"]["audio"];
            //duration
            //mime_type
            //file_id
            //file_size
            //title
            //performer

        }
        # ## ### ### #### VIDEO #### ### ### ## #
        elseif (isset( $this->updat[$gOc]["reply_to_message"]["video"] ))
        {
            $this->reply["video"] = $this->updat[$gOc]["reply_to_message"]["video"];
            //duration
            //mime_type
            //file_id
            //file_size
            //width
            //height
            $this->reply["videoThumb"] = $this->updat[$gOc]["reply_to_message"]["video"]["thump"];
            //file_id
            //file_size
            //width
            //height

        }

        // * ** *** **** ## Caption ## **** *** ** * //
        if (isset( $this->updat[$gOc]["reply_to_message"]["caption"] ))
        {
            $this->reply["caption"] = $this->updat[$gOc]["reply_to_message"]["caption"] ;
        }
        // ### ## # Reply To Text # ## ### //
        elseif (isset( $this->updat[$gOc]["reply_to_message"]["text"] ))
        {
            $this->reply["text"] = $this->updat[$gOc]["reply_to_message"]["text"] ;
        }
        if($option !== null || !empty($option) )
        {
            return $this->reply[$method][$option];
        }
        else
        {
            return $this->reply[$method];
        }

    }
// * # ** ## *** ### **** #### Forward #### **** ### *** ## ** # * //
    private function forward($method , $option , $gOc  )
    {
        global $update;
        $this->updat = $update;

        // **** *** ** * ForWard * ** *** **** //
        $this->forward["from"] = $this->updat[$gOc]["forward_from"] ;
        //    id
        //    first_name
        //    last_name
        //    username
        //    language_code

        $this->forward["fromChat"] = $this->updat[$gOc]["forward_from_chat"] ;
        //    id
        //    title
        //    username
        //    type

        $this->forward["fromMessageId"] = $this->updat[$gOc]["forward_from_message_id"];
        $this->forward["date"] = $this->updat[$gOc]["forward_date"];
        if($option !== null || !empty($option) )
        {
            return $this->forward[$method][$option];
        }
        else
        {
            return $this->forward[$method];
        }


    }
// * # ** ## *** ### **** #### Media #### **** ### *** ## ** # * //
    private function media($method , $option , $gOc  )
    {
        global $update;
        $this->updat = $update;


        # ## ### ### #### PIC #### ### ### ## #

        if( isset( $this->updat[$gOc]["photo"] ) )
        {
            $this->media["photo"] = $this->updat[$gOc]["photo"] ;

            $this->media["photoSmaller"] = $this->media["photo"]["0"];
            //file_id
            //file_size
            //file_path
            //width
            //height

            $this->media["photoSmall"] = $this->media["photo"]["1"];
            //file_id
            //file_size
            //width
            //height

            $this->media["photoMedium"] = $this->media["photo"]["2"];
            //file_id
            //file_size
            //width
            //height

            $this->media["photoLarge"] = $this->media["photo"]["3"];
            //file_id
            //file_size
            //width
            //height

        }
        # ## ### ### #### DOCUMENT #### ### ### ## #

        elseif (isset( $this->updat[$gOc]["document"] ))
        {
            $this->media["document"] = $this->updat[$gOc]["document"] ;
            //mime_type
            //file_id
            //file_size
            $this->media["documentThumb"] = $this->media["document"]["thumb"];
            //file_id
            //file_size
            //width
            //height
        }
        # ## ### ### #### VOICE #### ### ### ## #

        elseif (isset( $this->updat[$gOc]["voice"] ))
        {
            $this->media["voice"] = $this->updat[$gOc]["voice"] ;
            //duration
            //mime_type
            //file_id
            //file_size

        }
        # ## ### ### #### AUDIO #### ### ### ## #
        elseif (isset( $this->updat[$gOc]["audio"] ))
        {
            $this->media["audio"] = $this->updat[$gOc]["audio"];
            //duration
            //mime_type
            //file_id
            //file_size
            //title
            //performer

        }
        # ## ### ### #### VIDEO #### ### ### ## #
        elseif (isset( $this->updat[$gOc]["video"] ))
        {
            $this->media["video"] = $this->updat[$gOc]["video"];
            //duration
            //mime_type
            //file_id
            //file_size
            //width
            //height
            $this->media["videoThumb"] = $this->media["video"]["thump"];
            //file_id
            //file_size
            //width
            //height

        }

            // * ** *** **** ## Caption ## **** *** ** * //
        if (isset( $this->updat[$gOc]["caption"] ))
        {
            $this->media["caption"] = $this->updat[$gOc]["caption"] ;
        }


        if($option !== null || !empty($option) )
        {
            return $this->media[$method][$option];
        }
        else
        {
            return $this->media[$method];
        }
    }
// * # ** ## *** ### **** #### User #### **** ### *** ## ** # * //
    private function user($method , $option , $gOc  )
    {
        global $update;
        $this->updat = $update;
        $this->user = array(
            'id' => $this->updat[$gOc]["from"]["id"] ,
            'familyName' => $this->updat[$gOc]["from"]["id"] ,
            'lastName' => $this->updat[$gOc]["from"]["id"] ,
            'userName' => $this->updat[$gOc]["from"]["id"]
        );
        if($option !== null || !empty($option) )
        {
            return $this->user[$method][$option];
        }
        else
        {
            return $this->user[$method];
        }

    }
// * # ** ## *** ### **** #### Message #### **** ### *** ## ** # * //
    private function message($method , $option , $gOc  )
    {
        global $update;
        $this->updat = $update;

        // **** *** ** * Message * ** *** **** //
        $this->message = array(
            'id' => $this->updat[$gOc]["message_id"] ,
            'date' => $this->updat[$gOc]["date"] ,
            'text' => $this->updat[$gOc]["text"] ,

        );
        if($option !== null || !empty($option) )
        {
            return $this->message[$method][$option];
        }
        else
        {
            return $this->message[$method];
        }
    }

// * # ** ## *** ### **** #### Call  #### **** ### *** ## ** # * //

    public function __get($name)
    {
        global $update;
        $this->updat = $update;

         $explode = explode("_" , $name);

            $type = $explode[0] ;
            $method = $explode[1];
        if ($explode[2] !== null || !empty($explode[2]))
        {
            $option = $explode[2];
            $option = str_replace("8" , "_" , $option);
        }
        else
        {
            $option = null ;
        }
        switch ($type)
        {
            case "reply" :
                if ($option !== null || !empty($option) )
                {
                    return $this->reply($method , $option , $this->message_type);
                }
                else
                {
                    return $this->reply($method ,null , $this->message_type);
                }
                break;
//
            case "message" :
                if ($option !== null || !empty($option) )
                {
                    return $this->message($method , $option , $this->message_type);
                }
                else
                {
                    return $this->message($method ,null , $this->message_type);
                }
                break;
//
            case "forward" :
                if ($option !== null || !empty($option) )
                {
                    return $this->forward($method , $option , $this->message_type );
                }
                else
                {
                    return $this->forward($method ,null , $this->message_type);
                }
                break;
//
            case "chat" :
                if ($option !== null || !empty($option) )
                {
                    return $this->chat($method , $option , $this->message_type );
                }
                else
                {
                    return $this->chat($method ,null , $this->message_type);
                }
                break;
//
            case "user" :
                if ($option !== null || !empty($option) )
                {
                    return $this->user($method , $option , $this->message_type );
                }
                else
                {
                    return $this->user($method ,null , $this->message_type);
                }
                break;
//
            case "media" :
                if ($option !== null || !empty($option) )
                {
                    return $this->media($method , $option , $this->message_type );
                }
                else
                {
                    return $this->media($method ,null , $this->message_type);
                }
                break;
            default:
                return "error in variable please check me";
        }
    }

}