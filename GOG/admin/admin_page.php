<?php

session_start();


include ("../connection.php");
?>
<html>
<head>
    <title>GOG</title>
    <link rel="stylesheet" type="text/css" href="../css/styleuser.css" media="all" />
</head>
<body>
<!-- Main Container Start -->
<div class="wrapper">

    <!-- Header Start -->
    <div class="header">
        <a href="admin_page.php"></a>
        <!-- <img src="images/add2card.jpg" style="float: right"> -->
    </div>
    <!-- Header End -->

    <!-- Content Start -->
    <div class="content_wrapper">
        <div class="right" style="background-image: url()">
            <a href="admin_page.php?view_users">View Users</a>
            <a href="admin_page.php?view_exercises">View Exercises</a>
            <a href="admin_page.php?add_exercises">Add Exercises</a>
            <a href="admin_page.php?view_categories">View Categories</a>
            <a href="admin_page.php?my_account">My Account</a>
            <a href="../logout.php">Admin Logout</a>

        </div>
        <div class="left" style="background-image: url()">
            <!-- Product Display Box Start -->
            <div id="products_box">
                <?php
                if (isset($_GET['view_users'])) {
                    include("view_users.php");
                }
                if (isset($_GET['view_exercises'])) {
                    include("view_exercises.php");
                }
                if (isset($_GET['add_exercises'])) {
                    include("add_exercises.php");
                }
                if (isset($_GET['edit_exercise'])) {
                    include("edit_exercises.php");
                }
                if (isset($_GET['delete_exercise'])) {
                    include("delete_exercise.php");
                }
                if (isset($_GET['delete_user'])) {
                    include("delete_user.php");
                }
                if(isset($_GET['view_categories'])){
                    include ("view_categories.php");
                }
                if(isset($_GET['delete_categories'])){
                    include ("delete_categories.php");
                }
                if(isset($_GET['my_account'])){
                    include ("my_account.php");
                }

                ?>
            </div>
            <!-- Product Display Box End -->
        </div>
    </div>
    <!-- Content End -->



</div>
<!-- Main Container End -->
</body>
</html>