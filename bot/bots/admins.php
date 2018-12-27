<?php

// *** *** *** *** **** END Media Variable **** *** *** *** //

////// ** ** ** Check user is Admin or not ** ** ** //
$queryFive = "SELECT * FROM admins WHERE gId=".$var->chat_id." AND sId=".$var->user_id;
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