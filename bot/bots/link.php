<?php
function shortLink($link)
{
    $key = "ULxqM6Slo98W";
    $shorter = "https://do0.ir/send.php?rel=api&key={$key}W&ver=2.5&type=get&L={$link}";
    $json = file_get_contents($shorter);
    $decoder = json_decode($json);
    if ($decoder["success"] == 1)
    {
    return "https://do0.ir/".$decoder["short"];
    }else
    {
        error_log($decoder["error"] . " | " . " " . "error from do0.ir ! check please time !" );
        return false;
    }
}

