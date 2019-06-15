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
    <a href="https://www.logomakr.com/0PPIlJ">Logo Designs</a>
<hr>

<!--user dashboard chart-->
<?php
//get all users
echo "<h3>Users Overview:</h3>";
$admin_users = [];
$other_users = [];

$user_query = "select * from user";
$user_res = query($user_query);
if(!$user_res){
    echo "User Sel Query Error: " .mysqli_error($connection);
}
/*else{
    echo "User Sel Query Successful";
}*/

while($row = mysqli_fetch_assoc($user_res)){
    $user_role = $row['role'];
    if($user_role == "admin"){
        $admin_users[] = $user_role;
    }else{
        $other_users[] = $user_role;
    }
}
echo "Total Users: " . $user_count = mysqli_num_rows($user_res);
echo " | Admin Users: " . $admin_role_count = count($admin_users);
echo " | Other Users: " . $other_role_count = count($other_users);

?>
<!--posts dashboard chart-->
<?php include"includes/footer.php";?>