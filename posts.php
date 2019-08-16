<?php
include "includes/header.php";
global $connection;

//get posts data
$id = $_GET['id'];
$post_query = "select * from posts as p
left join user as u
on u.id = p.post_creator
where post_id = '$id'";

$post_data = query($post_query);

while($row = mysqli_fetch_assoc($post_data)){

    $creator = $row['post_creator'];     //Post Creator - integer
    $title = $row['post_title'];         //Post Title - string
    $date = $row['post_date'];           //Post Date - String
    $content = $row['post_content'];     //Post Content - varchar
    $views = $row['post_views'];         //Post Views - integer
    $category = $row['post_category'];   //Post Category - integer
    $image = $row['post_image'];         //Post Image - varchar [image name. not location]
    $status = $row['post_status'];       //Post Status - integer (1 - draft, 2 - published, 5 - archived)
    $author = $row['user_first_name'] . " " . $row['user_last_name'];
}
?>

<div id="post-info" style="width: 100%">
    <header>
        <h1><?php echo $title?></h1>
        <p><?php echo $author ?> - Published: <?php echo date('m/d/Y', $date);?></p>
    </header>
    <hr>
</div>

<div>
<?php if(!empty($post_image)){
?>
    <a href="#"><img src="/images/<?php echo $post_image?>" alt=""></a>
<?php
}
?>
    <?php echo $content;?>
</div>

<?php
include "includes/footer.php";
?>