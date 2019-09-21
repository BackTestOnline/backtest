<?php
?>

    <li><a href="/"><h3>Home</h3></a></li>
    <li><a href="about.php"><h3>About</h3></a></li>
    <?php
    if(isset($_SESSION['role'])){
        if($_SESSION['role'] =="admin" || $_SESSION['role'] =="Admin"){
            ?>
            <li><a href="admin"><h3>Admin</h3></a></li>
            <?php
        }
    }
    ?>

