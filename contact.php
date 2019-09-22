<?php
include "includes/header.php";

if(isset($_POST['submit'])){
    $mail = $_POST['title'];
    $subject = $_POST['subject'];
    $name = $_POST['name'];
    $content = $_POST['content'];
    $mail = send_support($mail, $name, $subject, $content);
    if($mail){
        echo "<h3 style='color: green; text-align: center'>Support Request Sent Successfully</h3>";
    }else{
        echo "<h3 style='color: red; text-align: center'>Failed to submit. Please Try again or contact <a href='mailto:support@backtestonline.com'>support@backtestonline.com</a>.</h3>";
    }
}
?>

<div style="text-align: center">
    <div style="text-align: center; font-size: 4em"><span class="fa fa-envelope"></span></div>
    <h1 style="font-size: 1.4em; text-align: center; font-weight: bold">Contact Us</h1>
</div>

    <div id="form-post">
        <form action="" method="post" enctype="multipart/form-data">
            <div id="form-field">
                <label for="title">Email:</label>
                <input type="email" name="title" id="title"" required>
            </div>
            <br>
            <div id="form-field">
                <label for="name">Full Name:</label>
                <input type="text" name="name" id="name"" required>
            </div>
            <br>
            <div id="form-field">
                <label for="subject">Subject:</label>
                <input type="text" name="subject" id="subject"" required>
            </div>
            <br>
            <div id="form-field">
                <label for="content">Message:</label>
                <textarea name="content" id="content" cols="30" rows="10" required></textarea>
            </div>
            <br>
            <div id="form-group" style="text-align: center;">
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


<?php
include "includes/footer.php";
?>