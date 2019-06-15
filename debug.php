<?php
include "includes/header.php";

if(!isset($_SESSION['email'])){
    echo "<h1>No Sessions Set</h1>";
}else{
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
}

include "includes/footer.php";