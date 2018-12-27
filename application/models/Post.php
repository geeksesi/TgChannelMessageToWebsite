<?php

class Post extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function fetchAllPost()
    {
       $query = $this->db->get("web");
      return $query ;
    }
    public function singleFetch($what , $equal)
    {
        $query = $this->db->get_where('web', array($what => $equal));
        return $query;
    }

}