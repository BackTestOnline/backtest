<?php
include "db.php";
include "functions.php";

if(isset($_SESSION['email'])){
    echo "<title>SIGNED IN</title>";
}else{
    echo "<title>Backtest Online - Home of the B.O.S.S. Software</title>";
}

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
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
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
                <li><a href="about.php">About</a></li>
<!--                <li><a href="#">Feugiat</a></li>-->
<!--                <li><a href="#">Tempus</a></li>-->
<!--                <li><a href="#">Adipiscing</a></li>-->
            </ul>
        </nav>
        <nav class="main">
            <ul>
                <li class="search">
                    <a class="fa-search" href="#search">Search</a>
                    <form id="search" method="get" action="#">
                        <input type="text" name="query" placeholder="Search" />
                    </form>
                </li>
                <li class="menu">
                    <a class="fa-bars" href="#menu">Menu</a>
                </li>
            </ul>
        </nav>
    </header>

    <?php include "includes/navigation.php"?>

    <div id="main">