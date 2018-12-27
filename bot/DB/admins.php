<?php

error_reporting(E_ALL & ~E_NOTICE  ^ E_DEPRECATED);

include "connect.php";
include "../class/webhook.php";
include "../class/jsondecoder.php";
include "../variable/alert.php";

// ## ** ## ** ## *** Restart Admins Table On MySql *** ## ** ## ** ## //

$queryReboot = "TRUNCATE TABLE admins";
$resultReboot = $DB->query($queryReboot);
    if ($resultReboot === TRUE)
    {
        echo "TABLE WAS RESTART";
        echo "<br> \n";
    }
    else
    {
        error_log("I Can't Restart Admins Table");
    }

// ## ** ## ** ## *** Restart Admins Table On MySql *** ## ** ## ** ## //

$bot_token = '346742615:AAGbcessuL9GG_6uO3K_kpIVDn5PCeJBzlI';
define('API_URL', 'https://api.telegram.org/bot'.$bot_token.'/');
$me_id = '91416644' ;


$webhook = new Webhook();
$decoder = new JsonDecoder();

$queryOne = "SELECT id , vip FROM gList ";
$resultOne = $DB->query($queryOne);
$countOne = $resultOne->num_rows;
if ($countOne > 0)
{
    error_log("Ok numRows > 0 :-) ");
    for ($i=0; $i<$countOne;$i++)
    {
    //
        $fetchOne = $resultOne->fetch_assoc();
        $id_chat = $fetchOne["id"];
        $vip = $fetchOne['vip'];

    //
        $url1 = API_URL."getChatAdministrators?chat_id=".$id_chat;
        $all_admin = $decoder->decoder($url1);

    //
        $url2 = API_URL."getChatMembersCount?chat_id=".$id_chat;
        $count_member = $decoder->decoder($url2);
        $count_member = $count_member["result"];

        // ** ## ## ** ** ## ## *** Check BOT Joined In this Group Or Not !  *** ## ## ** ** ## ** ** //

        if($all_admin["ok"] == false)
        {
            $queryDelete = "DELETE FROM gList WHERE id =".$id_chat;
            $resultDelete = $DB->query($queryDelete);
            if($resultDelete === TRUE)
            {
                $url = curl_init(API_URL."sendMessage?chat_id=-1001080461912&text=".$alertDeleteGroupData);
                print_r(curl_exec($url));
            }
            else
            {
                error_log("I can't Delete Rows From DB");
            }
        }
        else
        {

            // ** ## ## ** ** ## ## *** END Check BOT Joined In this Group Or Not !  *** ## ## ** ** ## ** ** //

            $queryTwo = "UPDATE gList SET countUser= '{$count_member}' WHERE id=".$id_chat;
            $resultTwo = $DB->query($queryTwo);
            if ($resultTwo === TRUE) {
//            error_log("count member is Update with chat_id = '{$id_chat}'");
                echo "CHAT Count Is Update ";
                echo "<br> \n";
            } else {
                error_log("count member is WRONG with chat_id = '{$DB->error}'");
            }
            //
            $num = 0 ;
            do
            {
                if (isset($all_admin["result"][$num]["user"]["id"]) || !empty($all_admin["result"][$num]["user"]["id"]))
                {

                    $id_user = $all_admin["result"][$num]["user"]["id"];
                    $type = $all_admin["result"][$num]["status"];
                    $name = $all_admin["result"][$num]["user"]["first_name"] . " " ." " . " " . $all_admin["result"][$num]["user"]["last_name"] ;
                    $userName = $all_admin["result"][$num]["user"]["username"];
                    $queryThree = "INSERT INTO admins (sID,gId,name,userName,type)VALUES('{$id_user}','{$id_chat}','{$name}','{$userName}','{$type}')";
                    $resultThree = $DB->query($queryThree);
                    if ($resultThree === TRUE) {
                        echo "New record created successfully ";
                        echo "<br> \n";
                    } else {
                        echo "Error: <br>" . $DB->error;
                        echo "<br> \n";
                    }
                    $num = $num + 1 ;
                }else
                {
                    echo "DONE";
                    echo "<br> \n";
                    break;
                }

            }
            while($num < $count_member);

            $queryFour = "UPDATE gList SET countAdmin ='{$num}'WHERE id='{$id_chat}'";
            $resultFour = $DB->query($queryFour);
                if ($resultFour === TRUE)
                {
                    echo "Admin Count Is Update";
                    echo "<br>\n";
                }
                else
                {
                    error_log("I Can't Update CountAdmin Where Chat_id = '{$id_chat}'");
                    echo $DB->error;
                }

        }

    }
}
else
{
    error_log("Num Rows < 0 :-( : '{$countOne}'");
}
$url = curl_init(API_URL."sendMessage?chat_id=-1001080461912&text=".$alertCronAdmin);
print_r(curl_exec($url));
