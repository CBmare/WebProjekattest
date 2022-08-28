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
	<?php
		if(isset($_GET['view_exercises'])) { 
	?>
	<table align="center" width="794" style="color:white;">
		<tr align="center">
			<td colspan="6"><h2>View All Exercises</h2><br></td>
		</tr>
		<tr>
			<th>Exercise No</th>
			<th>Exercises Category</th>
			<th>Exercise Image</th>
            <th>Workouts</th>
            <th>Time</th>
            <th>Link</th>

		</tr>
        <?php
        $i=0;

        $select_category="SELECT * FROM category";
        $run_category=mysqli_query($con, $select_category);

        $sel_exer="SELECT * FROM exercises WHERE user_id= 2";
        $run_exer=mysqli_query($con, $sel_exer);
        while ($row_exer=mysqli_fetch_array($run_exer)) {

            $exer_id=$row_exer['id'];
            $exer_name=$row_exer['name'];
            $exer_img=$row_exer['image'];
            $exer_category = $row_exer['category_id'];
            $exer_time = $row_exer['time'];
            $exer_link = $row_exer['link'];
            while ($row_category=mysqli_fetch_array($run_category)) {

                $category_id = $row_category['id'];
                $category_name = $row_category['name'];
                if($exer_category == $category_id){
                    $random = $category_name;
                }

            }

            $i++;

            ?>
		<tr align="center">
			<td><?php echo $i; ?></td>
            <td><?php echo $random; ?></td>
			<td><img <?php echo $exer_img; ?>" width="60" height="44"></td>
            <td><?php echo $exer_name; ?></td>
            <td><?php echo $exer_time; ?></td>
            <td><?php echo $exer_link; ?></td>

		</tr>
		<?php } ?>
	</table>
	<?php } ?>
</body>
</html>