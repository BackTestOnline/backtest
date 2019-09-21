<?php
include "includes/header.php";
if(!isset($_GET['token'])){
    header("Location: /");
}else{
    $token = $_GET['token'];
}

if(isset($_POST['submit'])){
    $new = $_POST['new_pass'];
    $confirm = $_POST['confirm_pass'];
    if($new === $confirm){
        $users = query("select * from user where reset_token = '$token'");
        while($row = mysqli_fetch_assoc($users)){
            $id = $row['id'];
        }
        $password = escape(password_hash($new, PASSWORD_BCRYPT, array('cost' => 10)));
        query("update user set user_password = '$password', reset_token = null where reset_token = '$token'");
        $_SESSION['res'] = "reset";
        header("Location: login.php");
    }else{
        echo "<h3 style='color:red; text-align: center;'>Passwords Do Not Match. Please Try Again</h3>";
    }
}
?>

<div style="width:100%">
    <div style="text-align: center; font-size: 4em"><span class="fa fa-user"></span></div>
    <div style="font-size: 2em; text-align: center; font-weight: bold">Reset Password</div>
</div>

    <form action="" method="post">
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

<?php
include "includes/footer.php";
?>