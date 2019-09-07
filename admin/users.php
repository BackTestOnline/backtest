<?php
include "includes/header.php";
?>

<h1>User Dashboard</h1>

<?php
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
</script>

<h2>Registered Users:</h2>

<table>
    <thead>
        <tr>
            <th style="width: 20px">User ID</th>
            <th style="width: 50px">Email</th>
            <th style="width: 50px">First Name</th>
            <th style="width: 50px">Last Name</th>
            <th style="width: 30px">Role</th>
            <th style="width: 30px">Status</th>
        </tr>
    </thead>
    <?php

    //get users
    $user_query = "select * from user";
    $user_res = query($user_query);

    while($row = mysqli_fetch_assoc($user_res)){

        $user_id = $row['id'];
        $user_email = $row['user_email'];
        $user_first_name = $row['user_first_name'];
        $user_last_name = $row['user_last_name'];
        $user_role = $row['role'];
        $user_status = $row['status'];

        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_first_name}</td>";
        echo "<td>{$user_last_name}</td>";
        echo "<td>{$user_role}</td>";
        echo "<td>{$user_status}</td>";
        echo "</tr>";
    }
    ?>
</table>
<?php
include "includes/footer.php";
?>


