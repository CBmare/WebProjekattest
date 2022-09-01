<?php 

include ("../connection.php");

	if (isset($_GET['delete_user'])) {
		$delete_id=$_GET['delete_user'];

		$delete_user="DELETE FROM users WHERE id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_user);
		if ($run_delete) {
			echo "<script>alert('Deleted Successfully!')</script>";
			echo "<script>window.open('admin_page.php?view_users','_self')</script>";
		}

	}

?>