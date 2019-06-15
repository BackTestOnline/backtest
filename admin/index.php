<?php
include "includes/header.php";
if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location: /");
}
?>
<h1>Admin Index</h1>

<?php include"includes/footer.php";?>