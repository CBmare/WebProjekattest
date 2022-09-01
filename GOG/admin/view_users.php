<html>
<head>
    <title>GOG</title>
<style type="text/css">
	table{
		background-color: darkgrey;
	}
	tr,th{
		border: 2px solid white;
	}
</style>
</head>
<body>
	<table align="center" width="794" style="color:white;">
		<tr align="center">
			<td colspan="6"><h2>View All User</h2><br></td>
		</tr>
		<tr>
			<th>User No</th>
			<th>User Name</th>
			<th>User Email</th>
			<th>User Weight</th>
			<th>User Age</th>
            <th>User type</th>
			<th>Delete</th>
		</tr>
		<?php 
		$i=0;
			$sel_user="SELECT * FROM users";
			$run_user=mysqli_query($con, $sel_user);
			while ($row_user=mysqli_fetch_array($run_user)) {
				$user_id=$row_user['id'];
				$user_name=$row_user['name'];
				$user_email=$row_user['email'];
				$user_weight=$row_user['weight'];
				$user_age=$row_user['age'];
                $user_type = $row_user['user_type'];

				$i++;
			
		?>
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $user_name; ?></td>
			<td><?php echo $user_email; ?></td>
			<td><?php echo $user_weight; ?></td>
			<td><?php echo $user_age; ?></td>
            <td><?php echo $user_type; ?></td>
			<td><a href="admin_page.php?delete_user=<?php echo $user_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>