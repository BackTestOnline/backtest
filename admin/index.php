<?php
include "includes/header.php";
if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location: /");
}
$user_id = $_SESSION['user_id'];
$last_login = "select last_login from last_logins where user_id= '$user_id' ";
$last_login_res = query($last_login);
while($row=mysqli_fetch_assoc($last_login_res)){
    $prev_login = $row['last_login'];
}
?>
<h1>Admin Dashboard : <?php echo $_SESSION['first_name'];?></h1>
<h4>Last Login: <?php echo $prev_login;?></h4>
<hr>

<?php include"includes/footer.php";?>