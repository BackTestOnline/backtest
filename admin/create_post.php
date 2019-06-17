<?php
include "includes/header.php";

if(isset($_POST['add_post'])){
    $post_title = $_POST['title'];
    $post_content = $_POST['content'];
    $post_category = $_POST['category'];
    $post_creator = $_SESSION['user_id'];

    if(isset($_POST['image'])){
        $post_image = $_POST['image'];
    }else{
        $post_iamge = "";
    }
    //insert into posrs
    $insert_query = "insert into posts (post_title,post_content,post_creator,post_category,post_image)";
    $insert_query .= " values('$post_title','$post_content','$post_creator','$post_category','$post_image')";
    $insert_post_res = query($insert_query);
    if(!$insert_post_res){
        echo "<h1 style='text-align: center;color:red;'>Error creating post:".mysqli_error($connection)."</h1>";
    }else{
        header("Location: posts.php?stat=pass");
    }
}
?>
<h1>Add Post:</h1>

<div id="form-post">
    <form action="create_post.php" method="post">

        <div id="form-field">
            <label for="title">Post Title:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <br><br>
        <div id="form-field">
            <label for="category">Post Category:</label>
            <select name="category" id="category">
                <option value="null" selected>Please Select a category</option>
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
        </div>
        <br><br>
        <div id="form-field">
            <label for="content">Post Content:</label>
            <textarea name="content" id="content" cols="30" rows="10" required></textarea>
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
