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
        <a href="index.php"><img src="images/header.jpg"></a>
        <!-- <img src="images/add2card.jpg" style="float: right"> -->
    </div>
    <!-- Header End -->

    <!-- Content Start -->
    <div class="content_wrapper">
        <div class="right" style="background-image: url(images/right.jpg)">
            <a href="trainer_page.php?view_exercises">View Exercises</a>
            <a href="trainer_page.php?view_categories">View Categories</a>
            <a href="trainer_page.php?add_exercises">Add Exercises</a>
            <a href="trainer_page.php?my_account">My Account</a>
            <a href="../logout.php">Logout</a>
        </div>
        <div class="left" style="background-image: url(images/bg1.jpg)">
            <!-- Product Display Box Start -->
            <div id="products_box">
                <?php

                if (isset($_GET['view_exercises'])) {
                    include("view_exercises.php");
                }
                if(isset($_GET['view_categories'])){
                    include ("view_categories.php");
                }

                if(isset($_GET['add_exercises'])){
                    include ("add_exercises.php");
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