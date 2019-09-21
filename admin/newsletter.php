<?php
include "includes/header.php";

$title = "";
if(isset($_POST['send_newsletter'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    newsletter($title, $content);
}
if(isset($_GET['stat'])&&$_GET['stat']=="fail"){

    if(!empty($_GET['content'])){
        $content = $_GET['content'];
    }else{
        echo "<h1 style='text-align: center;color:red;'>Error creating Newsletter: Content Cannot Be Empty</h1>";
    }

    if(!empty($_GET['title'])){
        $title = $_GET['title'];
    }else{
        echo "<h1 style='text-align: center;color:red;'>Title cannot be Empty</h1>";
    }

}
?>
<h1>Send Newsletter:</h1>

<div id="form-post">
    <form action="create_post.php" method="post" enctype="multipart/form-data">

        <div id="form-field">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo $title; ?>" required>
        </div>
        <br>
        <div id="form-field">
            <label for="content">Content:</label>
            <textarea name="content" id="content" cols="30" rows="10" required></textarea>
        </div>
        <br>
    <button type="submit" name="send_newsletter" id="send_newsletter" class="btn btn-primary" style="width: 100%;">Add Post</button>
    </form>
</div>

<?php
include "includes/footer.php";
?>

<script>
    CKEDITOR.replace( 'content' );
</script>
