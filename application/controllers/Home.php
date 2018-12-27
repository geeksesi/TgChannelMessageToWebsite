<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function index()
    {
        $i = 0;
        $this->load->model('post');
        $fetch = $this->post->fetchAllPost();
        foreach ($fetch->result() as $result)
        {

            $row[$i] = $result->id ;
            $channel_id[$i] = $result->channel_id;
            $text[$i] = $result->text ;
            $media_link[$i] = $result->media_link ;
            $thumb[$i] = $result->thumb_link ;
            $tagOne[$i] = $result->tag_one ;
            $tagTwo[$i] = $result->tag_two ;
            $tagThree[$i] = $result->tag_three ;
            $time[$i] = $result->time ;
            $title[$i] = $this->character_limiter($text[$i] ,30 , "");
            $media_type[$i] = $result->media_type;

            $i = $i+1;
        }

        $this->load->view('index' , array(
            "result" => $fetch->result() ,
            'rows' => $fetch->num_rows(),
            'chat_id'=> $channel_id ,
            'row' => $row ,
            'text' => $text ,
            'media' => $media_link ,
            'media_type' => $media_type ,
            'thumb' => $thumb ,
            'tag1' => $tagOne ,
            'tag2' => $tagTwo ,
            'tag3' => $tagThree ,
            'time' => $time ,
            'title' => $title
        ));
    }

    public function single($title)
    {
        echo 'kiram dahanet '.$title;
        die();
        $i = 0;
        $title = urldecode($title);
        $id = $this->findId($title);
        $this->load->model('post');
        $fetch = $this->post->singleFetch('id' ,$id);
        error_log($id. "_______" .$title);
        foreach ($fetch->result() as $result)
        {
            $row[$i] = $result->id ;
            $channel_id[$i] = $result->channel_id;
            $text[$i] = $result->text ;
            $media_link[$i] = $result->media_link ;
            $thumb[$i] = $result->thumb_link ;
            $tagOne[$i] = $result->tag_one ;
            $tagTwo[$i] = $result->tag_two ;
            $tagThree[$i] = $result->tag_three ;
            $time[$i] = $result->time ;
            $titl[$i] = $this->character_limiter($text[$i] ,30 , "");
            $media_type[$i] = $result->media_type;

            $i = $i+1;
        }

        $this->load->view('index' , array(
            "result" => $fetch->result() ,
            'rows' => $fetch->num_rows(),
            'chat_id'=> $channel_id ,
            'row' => $row ,
            'text' => $text ,
            'media' => $media_link ,
            'media_type' => $media_type ,
            'thumb' => $thumb ,
            'tag1' => $tagOne ,
            'tag2' => $tagTwo ,
            'tag3' => $tagThree ,
            'time' => $time ,
            'title' => $titl
        ));
    }
    public function tag($tag)
    {
        $tag = urldecode($tag);
        $tag = "#".$tag;
        $i = 0;
        $this->load->model('post');
        $fetchOne = $this->post->singleFetch('tag_one' , $tag);
        if ($fetchOne !==false)
        {
            foreach ($fetchOne->result() as $result)
            {
                $row[$i] = $result->id ;
                $channel_id[$i] = $result->channel_id;
                $text[$i] = $result->text ;
                $media_link[$i] = $result->media_link ;
                $thumb[$i] = $result->thumb_link ;
                $tagOne[$i] = $result->tag_one ;
                $tagTwo[$i] = $result->tag_two ;
                $tagThree[$i] = $result->tag_three ;
                $time[$i] = $result->time ;
                $titl[$i] = $this->character_limiter($text[$i] ,30 , "");
                $media_type[$i] = $result->media_type;

                $i = $i+1;
            }
        }
        $fetchTwo = $this->post->singleFetch('tag_two' , $tag);
        if ($fetchTwo !==false)
        {

            foreach ($fetchTwo->result() as $result)
            {
                $row[$i] = $result->id ;
                $channel_id[$i] = $result->channel_id;
                $text[$i] = $result->text ;
                $media_link[$i] = $result->media_link ;
                $thumb[$i] = $result->thumb_link ;
                $tagOne[$i] = $result->tag_one ;
                $tagTwo[$i] = $result->tag_two ;
                $tagThree[$i] = $result->tag_three ;
                $time[$i] = $result->time ;
                $titl[$i] = $this->character_limiter($text[$i] ,30 , "");
                $media_type[$i] = $result->media_type;

                $i = $i+1;
            }
        }
        $fetchThree = $this->post->singleFetch('tag_three' , $tag);
        if ($fetchThree !==false)
        {

            foreach ($fetchThree->result() as $result)
            {
                $row[$i] = $result->id ;
                $channel_id[$i] = $result->channel_id;
                $text[$i] = $result->text ;
                $media_link[$i] = $result->media_link ;
                $thumb[$i] = $result->thumb_link ;
                $tagOne[$i] = $result->tag_one ;
                $tagTwo[$i] = $result->tag_two ;
                $tagThree[$i] = $result->tag_three ;
                $time[$i] = $result->time ;
                $titl[$i] = $this->character_limiter($text[$i] ,30 , "");
                $media_type[$i] = $result->media_type;

                $i = $i+1;
            }
        }
        $rows = $i ;

        $this->load->view('index' , array(

            'rows' => $rows,
            'chat_id'=> $channel_id ,
            'row' => $row ,
            'text' => $text ,
            'media' => $media_link ,
            'media_type' => $media_type ,
            'thumb' => $thumb ,
            'tag1' => $tagOne ,
            'tag2' => $tagTwo ,
            'tag3' => $tagThree ,
            'time' => $time ,
            'title' => $titl
        ));
    }
}
