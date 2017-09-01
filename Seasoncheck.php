<?php
//delete season on leaving the admin page so it cannot be accesed in the student page when switching in the url
$link = $_SERVER['PHP_SELF'];
$link_array = explode('/',$link);
$urlpart = end($link_array);
// urlpart is the last part of the url
//if($urlpart !== "4_adminoverview.php"){
//    session_start();
//    session_unset();
//    session_destroy();
//}