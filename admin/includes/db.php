<?php

$user_ip = $_SERVER['REMOTE_ADDR'];


$db_user = "backtest";
$db_pass = "Dr4g0n5!";
$db_host = "localhost";
$db_name = "backtest_web";

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$connection){
    echo "Connection Error: ".mysqli_error($connection);
}