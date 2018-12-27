<?php
//error_log("opened this file ");

$queryOne = "SELECT id FROM gList WHERE id ='{$var->chat_id}'" ;
$resultOne = $DB->query($queryOne);

if($resultOne->num_rows == 0)
{
//    error_log("GRoup not set in my db");
    ini_set('safe_mode','off');
    set_time_limit(-1);
    ini_set('max_execution_time', -1);


// ** ## ** ## ***  *** ## ** ## ** //

//
    $url3 = API_URL."getChat?chat_id=".$var->chat_id;
    $get_chat = $decoder->decoder($url3);
    $description = $get_chat["result"]["description"];
    $photo_chat = $get_chat["result"]["photo"]["big_file_id"];
    $inv_link = null ;
//
    $queryTwo = "INSERT INTO gList (id,type,title,userName,description,invLink,picture) VALUES ('{$var->chat_id}','{$type_chat}','{$var->chat_title}','{$uname_chat}','{$description}','{$inv_link}','{$photo_chat}')";
    $resultTwo = $DB->query($queryTwo);
    if ($resultTwo === true )
    {
//        $webhook->api("sendMessage" , array( "chat_id" => $var->chat_id , "text" => "Hey Your Group Add in my DataBase 😎 Thank You ❤️ " ));
       error_log("Group with this name : '{$var->chat_title}' was added on DB ");

    }
}
elseif ($resultOne->num_rows > 0) {
    $queryThree = "SELECT * FROM gList WHERE id='{$var->chat_id}'";
    $resultThree = $DB->query($queryThree);
    if ($resultThree->num_rows > 0) {
        $fetchThree = $resultThree->fetch_assoc();
        $vip = $fetchThree["vip"];
        $type = $fetchThree["type"];
        $register_time = $fetchThree["regTime"];


    } else
    {
        error_log("DB error".$var->user_id);
    }

//    $webhook->api("sendMessage" , array( "chat_id" => $var->chat_id , "text" => "Your Group Was Added to database" ));
//    error_log("GROUP Was Set on my db");

}