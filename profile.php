<?php
include "includes/header.php";

if(!isset($_SESSION['email'])){
    header("Location: /");
}

$user_id = $_SESSION['user_id'];
$user_email = $_SESSION['email'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];

?>

<h1>Edit Profile</h1>

    <form action="" role="form" method="post" id="user-form">
        <br>
        <div id="form-field">
            <label for="user_email">Email</label>
            <input type="email" name="user_email" id="user_email" class="form-control" value="<?php echo $user_email ?>" required>
        </div>
        <br>
        <div id="form-field">
            <label for="user_firstname">First Name (Cannot be Changed)</label>
            <input type="text" id="user_firstname" name="user_firstname" class="form-control" maxlength="25" value="<?php echo $first_name ?>" disabled>
        </div>
        <br>
        <div class="form-field">
            <label for="lastname">Last Name (Cannot be Changed)</label>
            <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $last_name ?>" disabled>
        </div>
        <br>
        <div class="form-field">
            <label for="password">New Password</label>
            <input type="password" required>
            <label for="password">Confirm Password</label>
            <input type="password" required>
        </div>
    </form>

<?php
include "includes/footer.php";
?>