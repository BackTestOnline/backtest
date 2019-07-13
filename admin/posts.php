<?php
include "includes/header.php";
if(isset($_GET['stat'])){
    if($_GET['stat'] == 'pass'){
        echo "<h1 style='text-align: center;color: darkgreen'>Post Added Successfully</h1>";
    }
}
?>
    <h1>Posts Dashboard</h1>

<?php

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
?>
<div id="post_chart_div">
    <h4 id="post_chart_title"><a href="posts.php">Post Dashboard</a></h4>
    <div id="post_chart"></div>
</div>
<?php
while($row = mysqli_fetch_assoc($post_res)){

    $post_status = $row['post_status'];
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



include "includes/footer.php";
?>

<script>
    var chart1 = AmCharts.makeChart("post_chart", {
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
