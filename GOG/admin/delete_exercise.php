<?php 

include ("../connection.php");

	if (isset($_GET['delete_exercise'])) {
		$delete_id=$_GET['delete_exercise'];

		$delete_exer="DELETE FROM exercises WHERE id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_exer);
		if ($run_delete) {
			echo "<script>alert('Deleted Successfully!')</script>";
			echo "<script>window.open('admin_page.php?view_exercises','_self')</script>";
		}

	}

?>