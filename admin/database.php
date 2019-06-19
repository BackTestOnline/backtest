<?php
include "includes/header.php";

if(isset($_POST['local'])){

}

if(isset($_POST['live'])){
    echo "update Live Database";
}
?>

    <form action="database.php" method="post">
        <button type="submit" name="local" id="'local">Update Local Database</button>
    </form>

    <form action="database.php" method="post">
        <button type="submit" name="live" id="'live">Update Live Database</button>
    </form>


<?php
include "includes/footer.php"
?>