<?php

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
?>