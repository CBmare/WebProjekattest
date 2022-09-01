<?php
include ("../connection.php");

$email = $_SESSION['mail'];


if (isset($_GET['add_exercises_my'])) {
    $add_id=$_GET['add_exercises_my'];

    $get_user="SELECT * FROM users WHERE email = '$email'";
    $run_user=mysqli_query($con, $get_user);
    while($row_days=mysqli_fetch_array($run_user)){
        $user_id=$row_days['id'];
        $user_name=$row_days['name'];

    }

    $select_exercises="SELECT * FROM exercises WHERE id='$add_id'";
    $run_exercises=mysqli_query($con, $select_exercises);
    while ($row_exercises=mysqli_fetch_array($run_exercises)) {
        $exercises_id=$row_exercises['id'];
        $exercises_name = $row_exercises['name'];
        $category_id = $row_exercises['category_id'];
        $time = $row_exercises['time'];
        $day_id = $row_exercises['day_id'];


        $i++;




        }
    $insert_exer = "INSERT into exercises(name, time, day_id, user_id, category_id) values('$exercises_name','$time','$day_id','$user_id','$category_id')";
    $run_exer = mysqli_query($con, $insert_exer);


    if ($run_exer) {
        echo "<script>alert('Added Successfully!')</script>";
        echo "<script>window.open('user_page.php?view_trainer_exercises','_self')</script>";
    }

}

?>