<?php
include "includes/header.php";
//  include "includes/navigation.php";
//echo $status = session_status();

$message= "";

if(isset($_GET['res'])){
    if($_GET['res'] == 'true'){
        $message = "User Added Successfully. Please sign in with details provided";
    }
}

if(isset($_GET['status'])){
    if($_GET['status'] === 'failed'){
        $message = "Incorrect sign in details. Please Try again or contact <a href='mailto:jon.james@backtestonline.com'>jon.james@backtestonline.com</a>";
    }
}

if(isset($_POST['login'])){
    $email = $_POST['username'];
    $password = $_POST['password'];

    $email = escape($email);
    $password = escape($password);

    $query = "select * from user";
    $query .= " where user_email = '{$email}'";
    $sel_user_query = query($query);

    if(!$sel_user_query){
        die("Query Failed: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($sel_user_query) != 1){
        echo "<h2 style='text-align:center; color: #d11010'>Invalid Details please try again</h2>";
    }else {
        while ($row = mysqli_fetch_array($sel_user_query)) {

            $db_user_id = $row['id'];
            $db_email = $row['user_email'];
            $db_password = $row['user_password'];
            $db_user_firstname = $row['user_first_name'];
            $db_user_lastname = $row['user_last_name'];
            $db_user_role = $row['role'];
            $db_status = $row['status'];
        }

        //$hash_pass = crypt($password, $db_password);

        echo $u_password = password_verify($password, $db_password);

        if($u_password && $email === $db_email){
            echo "<h1>Details Correct</h1>";
            $_SESSION['email'] = $db_email;
            $_SESSION['user_id'] = $db_user_id;
            $_SESSION['first_name'] = $db_user_firstname;
            $_SESSION['last_name'] = $db_user_lastname;
            $_SESSION['role'] = $db_user_role;
            header("Location: /");
        }else{
            echo "<h1>details incorrect</h1>";
        }

    }
}
?>
<!-- Page Content -->

	<div class="form-gap"></div>
	<div class="container">
		<div class="row">
			<div style="width: 100%; margin: 0 50px 0 50px;">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center" style="text-align: center; width: 100%;">


							<h3><i class="fa fa-user fa-4x"></i></h3>
							<h2 class="text-center">Login</h2>
                            <h1 id="message"><?php echo $message;?></h1>
							<div class="panel-body">


								<form id="login-form" role="form" autocomplete="off" class="form" method="post">

									<div class="form-group">
										<div class="input-group">
											<input name="username" type="text" class="form-control" placeholder="Enter Username" required>
										</div>
									</div>
<br>
									<div class="form-group">
										<div class="input-group">
											<input name="password" type="password" class="form-control" placeholder="Enter Password" required>
										</div>
									</div>
<br>
									<div class="form-group">

										<input name="login" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
									</div>


								</form>

							</div><!-- Body-->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<?php include "includes/footer.php";?>
