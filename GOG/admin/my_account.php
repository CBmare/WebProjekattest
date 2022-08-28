
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
if(isset($_GET['my_account'])) {
?>
<div id="products_box" style="background-image: url(images/bg3.jpg)">
    <?php

    $sel_user="SELECT * FROM users WHERE id = 1 ";
    $run_user=mysqli_query($con, $sel_user);
    $count= mysqli_num_rows($run_user);
    while($row_user=mysqli_fetch_array($run_user)){
        $user_id= $row_user['id'];
        $user_name= $row_user['name'];
        $user_email= $row_user['email'];
        $user_weight= $row_user['weight'];
        $user_age= $row_user['age'];


        echo "
									<div id='single_product'>
									<table align='center'>
										<tr>
											<th>User Name: </th>
											<td>$user_name</td>
										</tr>
										<tr>
											<th>Email: </th>
											<td>$user_email</td>
										</tr>
										<tr>
											<th>Weight: </th>
											<td>$user_weight KG</td>
										</tr>
										<tr>
										    <th>Age: </th>
										    <td>$user_age</td>
                                        </tr>
									</table>
									</div>
								";
    }
}
    ?>
</div>
</body>
</html>
