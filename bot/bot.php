
<?php
error_reporting(E_ALL& ~E_NOTICE );
ini_set('safe_mode','off');
set_time_limit(-1);
ini_set('max_execution_time', -1);

//include "autoload.php";
include "class/webhook.php";
include "class/jsondecoder.php";
// ** DB CONNECT FILE ** //
include "DB/connect.php";

$bot_token = '346742615:AAGbcessuL9GG_6uO3K_kpIVDn5PCeJBzlI';
define('API_URL', 'https://api.telegram.org/bot'.$var->bot_token.'/');


// $count check update
$content = file_get_contents("php://input");
$update = json_decode($content, true);

//$update['message']['chat]['type'] ==> private or grope or channel !

## ** ** ## ** Basic Variable ** ## ** ** ##
include "class/variable/basicvar.php";
include "variable/alert.php";
## ** ** ## ** END Basic Variable ** ## ** ** ##

$var = new BasicVar() ;
$webhook = new Webhook();
$decoder = new JsonDecoder();

if (isset($update["message"]) || isset($update["edited_message"]) ) {
    $var->message_type = "message";
//    include "bots/test.php";

    if ($var->chat_type == "group" || $var->chat_type == "supergroup") {
        include "DB/gAdd.php";
        include "bots/admins.php";
        // ** ** ** Admins Method ** ** ** //
        if ($isAdmin == 1) {


        } elseif ($isAdmin == 0) {

        }
        // ** ** ** END Admins Method ** ** ** //

    } elseif ($var->chat_type == "private") {
        include "bots/web/webCh.php";
        $webhook->sendMessage($var->chat_id , "test Api");
    }
}
elseif (isset($update["channel_post"]) )
{
    $var->message_type = "channel_post";
    include "bots/web/web.php";
    include "DB/gAdd.php";

}
elseif (isset($update["edited_channel_post"]) )
{
    $var->message_type = "edited_channel_post";
    include "bots/web/webCh.php";
}
