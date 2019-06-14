<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "backtest_web";

$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$connection){
    echo "Connection Error: ".mysqli_error($connection);
}