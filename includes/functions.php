<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

function send_email($to,$subject,$message){
    $mail =  new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "n3plcpnl0143.prod.ams3.secureserver.net";
    $mail->Username = "support@backtestonline.com";
    $mail->Password = "B@ckt35t";
    $mail->Port = 587;
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('support@backtestonline.com', 'Support');
    $mail->addCC('web@backtestonline.com');
    $mail->addAddress($to);
    $mail->Subject =$subject;
    $mail->Body = $message;

    if($mail->send()){
        return "True";
    }else{
        return $mail->ErrorInfo;
    }
}

function send_support($user, $name,$subject,$message){
    $mail =  new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "n3plcpnl0143.prod.ams3.secureserver.net";
    $mail->Username = "support@backtestonline.com";
    $mail->Password = "B@ckt35t";
    $mail->Port = 587;
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    $mail->setFrom($user, $name);
    $mail->addCC('web@backtestonline.com');
    $mail->addAddress("support@backtestonline.com");
    $mail->Subject =$subject;
    $mail->Body = $message;

    if($mail->send()){
        return "True";
    }else{
        return $mail->ErrorInfo;
    }
}

function escape($str){
    global $connection;
    $result = mysqli_real_escape_string($connection, $str);
    return $result;
}

function email_exists($email){

    $emailRes = query("select * from user where user_email = '$email'");

    //if email exists, return false
    // else return true
    $email_count = mysqli_num_rows($emailRes);
    if($email_count != 0){
        return $emailRes;
    }else{
        return $emailRes;
    }
}

function query($qry){
    global $connection;
    $result = mysqli_query($connection, $qry);
    if(confirm($result)){
        return $result;
    }else{
        return false;
    }
}

function confirm($res){
    if($res){
        return $res;
    }else{
        return false;
    }
}

function login_user($username, $password){
    global $connection;
    //get the user inputted data
    $user_email = $username;
    $user_password = $password;
    //get the database password using the email
    $get_db_pass_query = "select * from user where user_email = '$user_email'";
    $get_db_pass_result = query($get_db_pass_query);
    if(!$get_db_pass_result){
        die("Error: ".mysqli_error($connection));
    }
    $user_count = mysqli_num_rows($get_db_pass_result);
    if($user_count==0){
        header("Location: login.php?status=failed");
    } else{
        while ($row = mysqli_fetch_assoc($get_db_pass_result)) {
            $db_password = $row['user_password'];
            $db_id = $row['id'];
            $db_f_name = $row['user_first_name'];
            $db_s_name = $row['user_last_name'];
            $db_role = $row['role'];
            $db_status = $row['status'];
        }
        $bcrypt_password = password_verify($user_password, $db_password);
        echo $bcrypt_password;
        if ($bcrypt_password == $db_password && $db_status == 10) {

            $_SESSION['email'] = $user_email;
            $_SESSION['firstname'] = $db_f_name;
            $_SESSION['lastname'] = $db_s_name;
            $_SESSION['role'] = $db_role;
            $_SESSION['id'] = $db_id;
            header("Location: index.php");
        } else if ($bcrypt_password == $db_password && $db_status === 5) {
            header("Location: login.php?status=failed");
        }
    }
}

function randomPassword($length,$count, $characters) {
    $symbols = array();
    $passwords = array();
    $used_symbols = '';
    $pass = '';

    $symbols["lower_case"] = 'abcdefghijklmnopqrstuvwxyz';
    $symbols["upper_case"] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $symbols["numbers"] = '1234567890';
    $symbols["special_symbols"] = '!?~@#-_+<>[]{}';

    $characters = explode(",",$characters);
    foreach ($characters as $key=>$value) {
        $used_symbols .= $symbols[$value];
    }
    $symbols_length = strlen($used_symbols) - 1;
    for ($p = 0; $p < $count; $p++) {
        $pass = '';
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $symbols_length);
            $pass .= $used_symbols[$n];
        }
        $passwords[] = $pass;
    }
    return $passwords;
}
?>