<?php
include "db.php";
include "functions.php";
session_start();
$img_root = "../../,,/";
?>
<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
<!--    <title>Backtest Online - Home of the B.O.S.S. Software</title>-->
    <meta charset="utf-8" />
    <title>Backtest Online - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <h1><a href="/">Backtest Online</a></h1>


        <nav class="links">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="../admin">Dashboard</a></li>
                <li><a href="../about.php">About</a></li>
                <li><a href="posts.php">Posts</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="../logout.php">LogOut</a></li>
            </ul>
        </nav>

    </header>

    <?php include "navigation.php";?>

    <div id="main">