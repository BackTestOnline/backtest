<?php
?>
<div class="vertical-menu">
    <a href="index.php">Admin Home</a>
    <a href="create_post.php">Create Post</a>
    <a href="posts.php">Manage Posts</a>
    <a href="create_user.php">Create User</a>
    <a href="users.php">Manage Users</a>
    <a href="categories.php">Manage Categories</a>

    <?php
    $user_ip = $_SERVER['REMOTE_ADDR'];
    if($user_ip == "::1" || $user_ip == "127.0.0.1"){
        echo "
        <ul class='actions stacked' >
            <li ><a href = '../debug.php' class='button large fit' > Session Debugging </a ></li >
        </ul>";
    }
    ?>
</div>
