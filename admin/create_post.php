<?php
include "includes/header.php";

$title = "";
if(isset($_POST['add_post'])) {
    $post_title = $_POST['title'];
    $post_content = $_POST['content'];
    $post_category = $_POST['category'];
    $post_creator = $_SESSION['user_id'];
    $post_status = $_POST['status'];
    $post_date = time();


    if (isset($_POST['image'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $post_image = $_POST['image'];
    } else {
        $post_iamge = "";
    }
    if (!empty($post_content)) {
        //insert into posrs
        $insert_query = "insert into posts (post_title,post_content,post_date,post_creator,post_category,post_image, post_status)";
        $insert_query .= " values('$post_title','$post_content','$post_date','$post_creator','$post_category','$post_image','$post_status')";
        $insert_post_res = query($insert_query);
        if (!$insert_post_res) {
            echo "<h1 style='text-align: center;color:red;'>Error creating post:<br>" . mysqli_error($connection) . "</h1>";
        } else {
            header("Location: posts.php?stat=pass");
        }
    } else {
        header("Location: create_post.php?stat=fail&title=$post_title&content=$post_content");
    }
}
if(isset($_GET['stat'])&&$_GET['stat']=="fail"){

    if(!empty($_GET['content'])){
        $content = $_GET['content'];
    }else{
        echo "<h1 style='text-align: center;color:red;'>Error creating post: Content Cannot Be Empty</h1>";
    }

    if(!empty($_GET['title'])){
        $title = $_GET['title'];
    }else{
        echo "<h1 style='text-align: center;color:red;'>Title cannot be Empty</h1>";
    }

}
?>
<h1>Add Post:</h1>

<div id="form-post">
    <form action="create_post.php" method="post" enctype="multipart/form-data">

        <div id="form-field">
            <label for="title">Post Title:</label>
            <input type="text" name="title" id="title" value="<?php echo $title; ?>" required>
        </div>
        <br><br>
        <div id="form-field">
            <label for="category">Post Category:</label>
            <select name="category" id="category">
<!--                <option value="null" selected>Please Select a category</option>-->
                <?php
                $sel_cat_query = "select * from post_category";
                $sel_cat_res = query($sel_cat_query);
                if(!$sel_cat_res){
                    echo "Category Error:".mysqli_error($sel_cat_res);
                }
                while($row = mysqli_fetch_assoc($sel_cat_res)){
                    $cat_id = $row['id'];
                    $cat_name = $row['category'];
                    echo "<option value='$cat_id'>$cat_name</option>";
                }
                ?>
            </select>
        </div>
        <br>
        <div id="form-field">
            <label for="image">Post Image:</label>
            <input type="file" name="image" id="image">
<!--            <input type="submit" value="Upload Image" name="submit">-->
        </div>
        <br><br>
        <div id="form-field">
            <label for="content">Post Content:</label>
            <textarea name="content" id="content" cols="30" rows="10" required></textarea>
        </div>
        <br><br>
        <div id="form-field">
            <label for="status">Post Status:</label>
            <select name="status" id="status">
            <?php
            $select_status_query= "select * from post_status_options";
            $select_status = query($select_status_query);
            while($row = mysqli_fetch_assoc($select_status)){
                $status_id = $row['id'];
                $status_name = $row['status'];
                echo "<option value='$status_id'>$status_name</option>";
            }

            ?>
            </select>

        </div>
        <br>
    <button type="submit" name="add_post" id="add_post" class="btn btn-primary">Add Post</button>
    </form>
</div>

<?php
include "includes/footer.php";
?>

<script>
    CKEDITOR.replace( 'content' );
</script>
