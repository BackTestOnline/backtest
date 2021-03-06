<?php
include "includes/header.php";

if(isset($_POST['submit'])){
    $email = $_POST['email'];

    $users = query("select * from user where user_email = '$email'");
    while($row = mysqli_fetch_assoc($users)){
        $firstname = $row['user_first_name'];
    }
    if(mysqli_num_rows($users) == 0){
        echo "<h3 style='color: red; text-align: center'>There doesn't seem to be an account with this email. If you believe this is in error please contact us on <a href='mailto:support@backtestonline.com'>Support@backtestonline.com</a></h3>";
    }else{
        $length = random_int(26,50);
        $tokenArr = randomPassword($length,1,"lower_case,upper_case,numbers");
        $token = $tokenArr[0];
        query("update user set reset_token = '$token' where user_email = '$email'");
        $link = "www.backtestonline.com/reset.php?token=".$token;
        $message = "<h1>Reset Your Password.</h1>
".$firstname.",
<br><br>
Thank you for requesting to reset your password.
<br>Please follow the below link to reset your password.
<br><br>
<a href='$link'>Reset Password</a>
<br><br>
Or Copy and Paste the below link into your browser:
<br><br>
".$link."
<br><br>
If you did not request this email, you can disregard it.
<br>
If you beleive someone is trying to gain access to your account, please contact <a href='mailto:support@backtestonline.com'>support@backtestonline.com</a>";
        $send = send_email($email, "Password Reset", $message);
        if($send){
            echo "Request Sent.";
            $_SESSION['res'] = "Sent";
            header("Location: login.php");
        }else{
            echo $send;
        }
    }
}

?>

<div style="width:100%; text-align: center">
    <h3><i class="fa fa-user fa-4x"></i></h3>
    <h2 class="text-center">Reset Password</h2>
    <div style="text-align: center;">To request a password reset please enter your email address below and if its on our system you will receive a password reset link.</div>
</div>
    <br>
<div>
    <form action="" role="form" method="post" id="user-form">
        <div id="form-field" style="text-align: center">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <br>
        <div style="text-align: center">
            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block btn-primary" value="Send">
        </div>
    </form>
</div>

<div style="text-align: center;">To ensure our emails dont get filtered to your junk please add "support@backtestonline.com" to your trusted contacts.</div>
<?php
include "includes/footer.php";
?>