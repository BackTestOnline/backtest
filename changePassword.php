<?php
include "includes/header.php";

if(isset($_POST['submit'])){

    //cehcks if teh old password is the currently stored one
    $old_pass = $_POST['old_pass'];
    $user_id = $_SESSION['user_id'];
    $dbPass = query("select user_password from user where id = '$user_id'");
    while($row = mysqli_fetch_assoc($dbPass)){
        $dbPassword = $row['user_password'];
    }
    $access = password_verify($old_pass, $dbPassword);
    if($access){
        $newPass = $_POST['new_pass'];
        $confirmPass = $_POST['confirm_pass'];

        if($newPass === $confirmPass) {
//            echo "Password Changed";
            $password = escape(password_hash($newPass, PASSWORD_BCRYPT, array('cost' => 10)));
            $updateUser = query("update user set user_password = '$password' where id = '$user_id'");
            if(!$updateUser){
                echo "<h3 style='text-align: center; color: red;'>Error updating password. Please Try again or contact <a href='mailto:support@backtestonline.com'>support@backtestonline.com</a> for assistance</h3>";
            }
        }else{
            echo "<h3 style='text-align: center; color: red;'>Passwords do not match. Please Try Again</h3>";
        }
    }else{
        echo "<h3 style='text-align: center; color: red;'>Old Password is Incorrect. Please Try Again</h3>";
    }
}
?>

<div style="width:100%">
    <div style="text-align: center; font-size: 3em"><span class="fa fa-user"></span></div>
    <div style="font-size: 2em; text-align: center; font-weight: bold">Change Password</div>
</div>
    <br>
<div style="text-align: center">
    <form action="" method="post">
        <div id="form-group">
            <label for="old_pass">Current Password</label>
            <input type="password" id="old_pass" name="old_pass" required>
        </div>
        <br>
        <div id="form-group">
            <label for="new_pass">New Password</label>
            <input type="password" id="new_pass" name="new_pass" required>
        </div>
        <div id="form-group">
            <label for="confirm_pass">Confirm Password</label>
            <input type="password" id="confirm_pass" name="confirm_pass" required>
        </div>
        <br>
        <div style="text-align: center">
            <input type="submit" name="submit" id="btn-submit" class="btn btn-custom btn-lg btn-block btn-primary" value="Save">
        </div>
    </form>
</div>
<?php
include "includes/footer.php";
?>