<?php

class MY_Controller extends CI_Controller
{


    public function character_limiter($str, $n = 500, $end_char = '')
    {
        if (strlen($str) < $n)
        {
            return $str;
        }

        $str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

        if (strlen($str) <= $n)
        {
            return $str;
        }

        $out = "";
        foreach (explode(' ', trim($str)) as $val)
        {
            $out .= $val.' ';

            if (strlen($out) >= $n)
            {
                $out = trim($out);
                return (strlen($out) == strlen($str)) ? $out : $out.$end_char;
            }
        }
    }

    public function findId($title)
    {
        $this->load->model("post") ;
        $query = $this->post->fetchAllPost() ;
        foreach ($query->result() as $item )
        {
            $text = $item->text ;
            $tit = $this->character_limiter($text , 30);
            if ($tit == $title)
            {
                return $item->id ;

            }
            else
            {
                continue;
            }
        }
    }

}