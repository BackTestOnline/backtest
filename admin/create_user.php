<?php
include "includes/header.php";


$pass_email = [
    "subject"=>"Welcome to the Backtest Online System",
    "message"=>"<b>Hi Welcome to Our system</b>

Bear in mind this is a test system"];

if(isset($_POST['submit'])){
    $password = randomPassword(10,1,"lower_case,upper_case,numbers,special_symbols,numbers");

    //add_user($email, $password, $first_name, $last_name, $role, $status)
    if(add_user($_POST['user_email'],$password[0],$_POST['user_firstname'],$_POST['lastname'],$_POST['role'],"free")){
    $to = $_POST['user_email'];
    $subject = "Welcome to the Backtest Online System";
    $message = "
<!DOCTYPE html>
<h1>Welcome to BacktestOnline.</h1>
<br><br>
You have been set up as an ".$_POST['role']." user on our system by ".$_SESSION['first_name']." ".$_SESSION['last_name'].".
<br><br>Here is your username: ".$_POST['user_email']."
<br><br>Please find below your password to log into the system.
<br><br>Password: ".$password[0]."
<br><br><br>
Please Respect others when using our system!";
    $mail = send_email($to,$subject,$message);

    if($mail == "True"){
        echo "Mail Sent.";
    }else{
        echo $mail;
    }
}else{
    echo "User not added Successfully";
    }
}
?>

<h1 style="text-align: center; font-size: 1.5em">Add User:</h1>

    <form action="" role="form" method="post" id="user-form">
        <br>
        <div id="form-field">
            <label for="user_email">Email (This will act as their username)</label>
            <input type="email" name="user_email" id="user_email" required>
        </div>
        <br>
        <div id="form-field">
            <label for="user_firstname">First Name (max 25 characters)</label>
            <input type="text" id="user_firstname" name="user_firstname" maxlength="25" required>
        </div>
        <br>
        <div class="form-group">
            <label for="lastname">lastname</label>
            <input type="text" name="lastname" id="lastname" class="form-control" required>
        </div>
        <br>
        <div>
            <label for="user_role">Select their Role</label>
            <select name="role" id="user_role">
                <option value="public">Public</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <br>
        <div style="text-align: center">
            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block btn-primary" value="Register">
        </div>
    </form>


<p style="text-align: center"><b>NOTE:</b> Upon Saving, a random password will be generated and sent to the user.</p>

<?php
include "includes/footer.php";
?>



