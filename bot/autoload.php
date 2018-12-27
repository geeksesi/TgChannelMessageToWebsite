<?php
/**
 * Created by PhpStorm.
 * User: javadkhof
 * Date: 7/15/17
 * Time: 10:43 PM
 */

function __autoload($class)
{
    $class = strtolower($class);
    $path = "class/" . $class . ".php";
    if (file_exists($path))
    {
        require_once ($path);
    }else
    {
        echo $class."Not Found";
    }
}

?>