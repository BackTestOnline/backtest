<?php
include "includes/header.php";
if(!isset($_GET['token'])){
    header("Location: /");
}
?>

<div style="width:100%">
    <div style="text-align: center; font-size: 4em"><span class="fa fa-user"></span></div>
    <div style="font-size: 2em; text-align: center; font-weight: bold">Reset Password</div>
</div>



<?php
include "includes/footer.php";
?>