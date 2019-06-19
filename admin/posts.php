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
include "includes/footer.php";
?>