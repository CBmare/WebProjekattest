<?php 

include ("../connection.php");

if (isset($_GET['edit_exercise'])) {
	$edit_exer_id=$_GET['edit_exercise'];

	$sel_exer="SELECT * FROM exercises WHERE id='$edit_exer_id'";
	$run_exer=mysqli_query($con, $sel_exer);
	$row_exer=mysqli_fetch_array($run_exer);
	$exer_up_id=$row_exer['id'];
	$exer_name=$row_exer['name'];
	$sets=$row_exer['time'];
	$day_id=$row_exer['day_id'];
	$exer_img=$row_exer['image'];
	$user_id=$row_exer['user_id'];
    $category_id = $row_exer['category_id'];
    $_SESSION['day_id'] = $day_id;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['category_id'] = $category_id;
}
$day_id1 = $_SESSION['day_id'];
$sel_day="SELECT * FROM days WHERE id='$day_id1'";
$run_day=mysqli_query($con, $sel_day);
$row_days=mysqli_fetch_array($run_day);

$day_edit_name=$row_days['day_name'];

$user_id1 = $_SESSION['user_id'];
$sel_user="SELECT * FROM users WHERE id='$user_id1'";
$run_user=mysqli_query($con, $sel_user);
$row_users=mysqli_fetch_array($run_user);

$category_id1 = $_SESSION['category_id'];
$sel_category="SELECT * FROM category WHERE id='$category_id1'";
$run_category=mysqli_query($con, $sel_category);
$row_category=mysqli_fetch_array($run_category);
$category_edit_name = $row_category['name'];


$email = $_SESSION['mail'];
?>
<html>
<head>
	<title>MyGym | Edit Exercises</title>
</head>
<body bgcolor="#999999">
	<form method="POST" action="" name ="update_workout" >
		<table width="794px" align="center" border="1" bgcolor="#f1533e">
			<tr>
				<td colspan="2" align="center"><h1>Edit or Update Exercises</h1></td>
			</tr>
            <tr>
                <td align="right"><b>Select User</b></td>
                <td>
                    <select name="user_id">

                        <?php
                        $get_user="SELECT * FROM users";
                        $run_user=mysqli_query($con, $get_user);
                        while($row_days=mysqli_fetch_array($run_user)){
                            $user_id=$row_days['id'];
                            $user_name=$row_days['name'];
                            echo "<option value='$user_id'>$user_name</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
			<tr>
				<td align="right"><b>Day</b></td>
				<td>
					<select name="day_id">
						<option value="<?php echo $day_id; ?>"><?php echo $day_edit_name; ?></option>
						<?php
							$get_day="SELECT * FROM days";
							$run_day=mysqli_query($con, $get_day);
							while($row_days=mysqli_fetch_array($run_day)){

								$day_id=$row_days['id'];
								$day_name=$row_days['day_name'];
                                $_SESSION['day'] = $day_id;
								echo "<option value='$day_id'>$day_name</option>";
							}
						?>
					</select>
				</td>
			</tr>
            <tr>
                <td align="right"><b>Category</b></td>
                <td>
                    <select name="category_id">
                        <option value="<?php echo $category_id ; ?>"><?php echo $category_edit_name ; ?></option>
                        <?php
                        $get_day="SELECT * FROM category";
                        $run_day=mysqli_query($con, $get_day);
                        while($row_days=mysqli_fetch_array($run_day)){

                            $day_id=$row_days['id'];
                            $day_name=$row_days['name'];

                            echo "<option value='$day_id'>$day_name</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
			<tr>
				<td align="right"><b>Name Of Exercise</b></td>
				<td><input type="text" name="name" value="<?php echo $exer_name; ?>"></td>
			</tr>

			<tr>
				<td align="right"><b>Number of Sets</b></td>
				<td><input type="text" name="time" value="<?php echo $sets; ?>"></td>
			</tr>
			<tr>
				<td align="right"><b>Exercise Image</b></td>
				<td><input type="file" name="exer_img"><br><img src="exercise_images/<?php echo $exer_img; ?>" width="60" height="44"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="update_workout" value="Update Workout"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php

	if (isset($_POST['update_workout']))
	{


		//Text Data Variables
		$user_id= $_POST['user_id'];
		$exer_name= $_POST['name'];
		$day_id2 = $_POST['day_id'];
		$sets= $_POST['time'];
        $category = $_POST ['category_id'];





		if ($exer_name=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($day_id2 =='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($sets=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}


		else{



			//Query For Inserting Workout Into Database.....
			$update_exer = "UPDATE exercises SET name='$exer_name',category_id = '$category', time='$sets', day_id='$day_id2', image='$exer_img', user_id='$user_id' WHERE id='$edit_exer_id'";
            $result = $con->query($update_exer);
            if ($result) {
				echo "<script>alert('Exercise Updated')</script>";
				echo "<script>window.open('admin_page.php?view_exercises','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>