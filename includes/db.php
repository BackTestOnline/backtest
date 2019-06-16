<?php

$user_ip = $_SERVER['REMOTE_ADDR'];

if($user_ip === "::1" || $user_ip == "127.0.0.1"){
    $db_user = "root";
    $db_pass = "";
    echo 'User IP - '.$user_ip;
}else{
    $db_user = "backtest";
    $db_pass = "Dr4g0n5!";
}

$db_host = "localhost";
$db_name = "backtest_web";

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$connection){
    echo "Connection Error: ".mysqli_error($connection);
}