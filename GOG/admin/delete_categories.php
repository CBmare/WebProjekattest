<?php

include ("../connection.php");

if (isset($_GET['delete_categories'])) {
    $delete_id=$_GET['delete_categories'];

    $delete_category="DELETE FROM category WHERE id='$delete_id'";
    $run_delete=mysqli_query($con,$delete_category);
    if ($run_delete) {
        echo "<script>alert('Deleted Successfully!')</script>";
        echo "<script>window.open('trainer_page.php?view_categories','_self')</script>";
    }

}

?>