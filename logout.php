<?php
include"includes/header.php";
session_destroy();
echo "<h1 style='font-size: 30px; text-align: center;'>You Have been signed out. It is best to close this page!</h1>";
header("Location: index.php?res=logout")
?>
<?php
include "includes/footer.php";
?>