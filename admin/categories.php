<?php
include "includes/header.php";


if(isset($_POST['add_cat'])){
    $cat_name = $_POST['category'];
    $cat_name = escape($cat_name);

    $insert_cat_query = "insert into post_category (category) values('$cat_name')";
    $insert_cat = query($insert_cat_query);

    if(!$insert_cat) {
        echo "<h1 style='color:red; text-align:center'>Error adding category: " . mysqli_error($connection)."</h1>";
    }else{
        echo "<h1 style='color:darkgreen; text-align:center;'>Category Added Successfully</h1>";
    }
}

if(isset($_GET['stat'])&&isset($_GET['id'])){
    $id = $_GET['id'];
    $del_cat_qry = "delete from post_category where id = $id";
    $del_cat_res = query($del_cat_qry);
    header("Location: categories.php");
}
?>

<h1>Backtest Online: Categories</h1>

    <form action="categories.php" method="post">
        <label for="category">Category Name:</label>
        <input type="text" name="category" id="category">
        <br>
        <button type="submit" name="add_cat" class="btn btn-primary">Add Category</button>
    </form>
<br><br>
<h1>Available Categories:</h1>

<?php
$cat_query = "select * from post_category";
$cat_res = query($cat_query);
?>
<table>
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Action</th>
    </tr>

    <?php
    while($row = mysqli_fetch_assoc($cat_res)){
        $cat_id = $row['id'];
        $cat_name = $row['category'];

        echo "<tr>";
        echo "<td>".$cat_id."</td>";
        echo "<td>".$cat_name."</td>";
        echo "<td><a href='categories.php?stat=del&id=$cat_id'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
</table>
<?php
include "includes/footer.php";
?>