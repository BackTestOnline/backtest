<?php
include "includes/header.php";
if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location: /");
}
$user_id = $_SESSION['user_id'];
$last_login = "select last_login from last_logins where user_id= '$user_id' ";
$last_login_res = query($last_login);
while($row=mysqli_fetch_assoc($last_login_res)){
    $prev_login = $row['last_login'];
}
?>
<h1>Admin Dashboard : <?php echo $_SESSION['first_name'];?></h1>
<h4>Last Login: <?php echo $prev_login;?></h4>
    <a href="https://www.logomakr.com/0PPIlJ">Logo Designs</a>
<hr>

<!--user dashboard chart-->
<?php
//get all users
echo "<h3>Users Overview:</h3>";
$admin_users = [];
$other_users = [];

$user_query = "select * from user";
$user_res = query($user_query);
if(!$user_res){
    echo "User Sel Query Error: " .mysqli_error($connection);
}
/*else{
    echo "User Sel Query Successful";
}*/

while($row = mysqli_fetch_assoc($user_res)){
    $user_role = $row['role'];
    if($user_role == "admin"){
        $admin_users[] = $user_role;
    }else{
        $other_users[] = $user_role;
    }
}
echo "Total Users: " . $user_count = mysqli_num_rows($user_res);
echo " | Admin Users: " . $admin_role_count = count($admin_users);
echo " | Other Users: " . $other_role_count = count($other_users);

echo '<script>';
echo 'var admin = ' . json_encode($admin_role_count) . ';';
echo 'var user = ' . json_encode($user_count) . ';';
echo 'var other = ' . json_encode($other_role_count) . ';';
echo '</script>';
?>


<div id="user_chart_div">
    <h4 id="user_chart_title"><a href="users.php">User Dashboard</a></h4>
    <div id="user_chart"></div>
</div>
<hr>
<?php
//get all users
echo "<h3>Post Overview:</h3>";
$draft_posts = [];
$published_posts = [];
$archived_posts = [];

$post_query = "select * from posts";
$post_res = query($post_query);
if(!$post_res){
echo "Post Sel Query Error: " .mysqli_error($connection);
}
/*else{
echo "User Sel Query Successful";
}*/

while($row = mysqli_fetch_assoc($post_res)){
    echo $post_status = $row['post_status'];
    if($post_status == "published"){
        $published_posts[] = $post_status;
    }else if($post_status == "draft"){
        $draft_posts[] = $post_status;
    }else{
        $archived_posts[] = $post_status;
    }
}

echo "Total Posts: " . $post_count = mysqli_num_rows($post_res);
echo " | Published Posts: " . $published_count = count($published_posts);
echo " | Draft Posts: " . $draft_count = count($draft_posts);
echo " | Archived Posts: " . $archive_count = count($archived_posts);

echo '<script>';
    echo 'var publish = ' . json_encode($published_posts) . ';';
    echo 'var draft = ' . json_encode($draft_posts) . ';';
    echo 'var archived = ' . json_encode($archive_count) . ';';
    echo 'var posts = ' . json_encode($post_count) . ';';
    echo '</script>';
?>

<?php if($post_count == 0 ){
    echo "<h1 style='color:red;text-align: center'>No Posts have been created. Make some <a href='create_post.php'>here</a></h1>";
}
?>
<div id="post_chart_div">
    <h4 id="post_chart_title"><a href="posts.php">Post Dashboard</a></h4>
    <div id="post_chart"></div>
</div>


<?php include"includes/footer.php";?>

<script>
    var chart = AmCharts.makeChart("user_chart", {
        "type": "serial",
        "theme": "light",
        "columnWidth": 0.8,
        "dataProvider": [{
            "category": "Admin",
            "count": admin
        }, {
            "category": "Other",
            "count": other
        }, {
            "category": "Total",
            "count": user
        }],
        "graphs": [{
            "fillColors": "#c55",
            "fillAlphas": 0.9,
            "lineColor": "#fff",
            "lineAlpha": 0.7,
            "type": "column",
            "valueField": "count"
        }],
        "categoryField": "category",
        "categoryAxis": {
            "title": "User Type"
        },
        "valueAxes": [{
            "title": ""
        }]
    });

    var chart = AmCharts.makeChart("post_chart", {
        "type": "serial",
        "theme": "light",
        "columnWidth": 0.8,
        "dataProvider": [{
            "category": "Archived",
            "count": archived
        }, {
            "category": "Draft",
            "count": draft
        }, {
            "category": "Published",
            "count": publish
        }, {
            "category": "Total",
            "count": posts
        }],
        "graphs": [{
            "fillColors": "#c55",
            "fillAlphas": 0.9,
            "lineColor": "#fff",
            "lineAlpha": 0.7,
            "type": "column",
            "valueField": "count"
        }],
        "categoryField": "category",
        "categoryAxis": {
            "title": "Post Status"
        },
        "valueAxes": [{
            "title": ""
        }]
    });
</script>
