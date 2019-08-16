<?php

global $connection;

include "includes/header.php";
if(isset($_GET['res'])){
    echo "<h1 style='text-align: center; color: red;'>You have been successfully logged out</h1>";
}

// get all the possts form the data base and display them in index. 
//====== VIEWING RIGHTS =======//
//->Admin - All posts, published and unpublished
//->Standard - All Published Posts
//->Editors - All Posts that they make, published and unpublished
//->No Role - All Published Posts


//get user role from session
if(isset($_SESSION['role'])) {
    $user_role = $_SESSION['role'];
    $user_id = $_SESSION['user_id'];
}

//// get posts from backtest_web.posts, selecting appropriate posts for the user role
if(isset($user_role)) {
    if ($user_role == "admin") {
        $query = "select * from posts as p
left join user as u
on p.post_creator = u.id";

    } else if ($user_role == "editor") {
        $query = "select * from posts as p
left join user as u
on p.post_creator = u.id
where post_creator = '$user_id'";
    }

    else {
        $query = "select * from posts as p
left join user as u
on p.post_creator = u.id
where post_status = 2";
    }

}else{
    $query = "select * from posts as p
left join user as u
on p.post_creator = u.id
where post_status = 2";
}

////queries the post table and gets results
$post_array = query($query);
//if($post_array)echo "Posts received: ".mysqli_num_rows($post_array);

while($row = mysqli_fetch_assoc($post_array)){
    $id = $row['post_id'];               //Post ID - integer
    $creator = $row['post_creator'];     //Post Creator - integer
    $title = $row['post_title'];         //Post Title - string
    $date = $row['post_date'];           //Post Date - String
    $content = $row['post_content'];     //Post Content - varchar
    $views = $row['post_views'];         //Post Views - integer
    $category = $row['post_category'];   //Post Category - integer
    $image = $row['post_image'];         //Post Image - varchar [image name. not location]
    $status = $row['post_status'];       //Post Status - integer (1 - draft, 2 - published, 5 - archived)
    $author = $row['user_first_name'] . " " . $row['user_last_name'];
    ?>

    <article class="post">
        <header>
            <div class="title">
                <h2><a href="posts.php?id=<?php echo $id;?>"><?php echo $title;?></a></h2>
            </div>
            <div class="meta">
                <time class="published"><?php echo date('m/d/Y', $date);?></time>
                <span id="name"><?php echo $author;?></span>
            </div>
        </header>
        <?php if(!empty($post_image)){
            ?>
            <a href="#"><img src="/images/<?php echo $post_image?>" alt=""></a>
        <?php
        }else{
            ?>
<!--            <p>No image available for this post</p>-->
        <?php
        }
        ?>
        <?php echo $content;?>
    </article>

    <?php
}

?>

        <!-- Pagination -->
       <!-- <ul class="actions pagination">
            <li><a href="" class="disabled button large previous">Previous Page</a></li>
            <li><a href="#" class="button large next">Next Page</a></li>
        </ul>-->



<?php include "includes/footer.php"?>