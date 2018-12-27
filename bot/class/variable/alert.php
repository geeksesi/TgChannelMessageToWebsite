<?php

class Alert
{
    protected $alert ;
    public function __set($name, $value)
    {
       $this->alert[$name] = $value;
    }
    public function __get($name)
    {
       return $this->alert[$name];
    }
}