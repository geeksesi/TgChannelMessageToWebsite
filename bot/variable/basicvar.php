<?php
////// ** ** ** Check user is Admin or not ** ** ** //
$queryFive = "SELECT * FROM admins WHERE gId=".$id_chat." AND sId=".$id_user;
$resultFive = $DB->query($queryFive);
if($resultFive->num_rows > 0)
{
    $isAdmin = 1;
}
else
{
    $isAdmin = 0;

}
// ** ** ** END Check User is Admin or not ** ** ** //