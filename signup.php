<?php
include "includes/header.php";


$user_email = "";
$user_first_name = "";
$user_last_name = "";

//language feature
if(isset($_GET['lang']) && !empty($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];

    if(isset($_SESSION['lang'])&& $_SESSION['lang'] != $_GET['lang']){
        echo "<script type='text/javascript'>location.reload();</script>";
    }
}
if(isset($_SESSION['lang'])){
    require "includes/languages/" . $_SESSION['lang'] . ".php";

}else{
    require "includes/languages/en.php";
}

if(isset($_POST['submit'])) {
    //grab values from post
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    //escape the variables
    $email = escape($email);
    $password = escape($password);
    $firstname = escape($firstname);
    $lastname = escape($lastname);

    //remove any whitespace
    $firstname = trim($firstname);
    $lastname = trim($lastname);
    $password = trim($password);
    $email = trim($email);



    //ecnrypts password for security
    $password = password_hash($password, PASSWORD_DEFAULT);

//    die($password);
    //check if email exits
    if(!empty($email) && !empty($password)) {
        $emailQry = email_exists($email);
        if($emailQry){
            //echo "Query Successful!";
        }else{
            echo "Query Failed: ". mysqli_error($connection);
        }
        $emailExist = mysqli_num_rows($emailQry);
        //echo "<br>Emails = " . $emailExist;
    }
    //die();

    if($emailExist === 0){$insert_user_query = "insert into user (user_email, user_password, user_first_name, user_last_name, status) ";
        $insert_user_query .= "values('$email','$password','$firstname','$lastname',10)";
        $insert_user_result = query($insert_user_query);
        if($insert_user_result){
            echo "User Added.";
            header("Location: login.php?res=true");
        }else{
            echo "Error adding user: ".mysqli_error($connection);
        }
    }else{
        echo "<h1 style='color:red'>Email already exists. Please use a different email</h1>";
    }


}
?>

<!--Language Selection-->
<div class="pull-right" style="width:150px;">
    <form method="get" class="navbar-form navbar-right" id="language_form">
        <select name="lang" class="form-control" onchange="changeLang()">
            <option value="en" <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){echo "selected";}?>>English</option>
            <option value="es" <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'es'){echo "selected";}?>>Spanish</option>
        </select>
    </form>
</div>
<?php
if(!empty($message)){
    echo $message;
}
?>
<!--signup form-->
<br>
<h2><?php echo _REGISTER ?></h2>

<br>
<form action="signup.php" method="post" id="sign-up">
    <!--<div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="<?php /*echo _USERNAME*/?>">
    </div>
    <br>-->
    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="<?php echo _EMAIL?>. This will be your username" value="<?php echo $user_email?>" required>
    </div>
    <br>
    <div>
        <label for="firstname">FirstName</label>
        <input type="text" id="firstname" name="firstname" placeholder="<?php echo _FIRSTNAME?>" value="<?php echo $user_first_name ?>" required>
    </div>
    <br>
    <div>
        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname" placeholder="<?php echo _LASTNAME?>" value="<?php echo $user_last_name  ?>" required>
    </div>
    <br>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="<?php echo _PASSWORD?>" required>
    </div>
    <br>
    <button class="btn btn-primary" type="submit" name="submit" value="submit" style="width:100%;"><?php echo _REGISTER?></button>
</form>


    <script>
        function changeLang(){
            document.getElementById('language_form').submit();
        }
    </script>

<?php
include "includes/footer.php";
?>