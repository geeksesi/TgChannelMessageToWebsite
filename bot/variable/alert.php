<?php
include  ( dirname(__FILE__) ."/../class/variable/alert.php");
$alert = new Alert() ;

$alert->test = "hey it's test";

$alert->requestPostToDB = "پیام شما دریافت شد .

پس از بررسی در کانال زیر و همچنین در سایت ما قرار خواهد گرفت .

برای دریافت کد نمایش مطلب در سایت و یا وبلاگ خود به پنل کاربری خود در سایت سر بزنید .

🌏 geeksesi.xyz/telegram

🏰 @geeksesi_web

در صورت بروز مشکل با ایدی سازنده تماس بگیرید : 

🛃 @geeksesi_xyz
" ;

$alert->errorPostToDB = "لطفا !add to web را به صورت ریپلای به پست خود ارسال کنید تا ما پست شما رو در سایت نمایش دهیم ❤️!" ;
