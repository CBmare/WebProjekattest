


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


<div id="products_box" style="background-image: url(images/bg3.jpg)">
    <?php
    include ("../connection.php");
    $email = $_SESSION['mail'];
    $sel_user="SELECT * FROM users WHERE email = '$email' ";
    $run_user=mysqli_query($con, $sel_user);
    $count= mysqli_num_rows($run_user);
    while($row_user=mysqli_fetch_array($run_user)){
        $user_id= $row_user['id'];
        $user_password = $row_user ['password'];
        $user_name= $row_user['name'];
        $user_email= $row_user['email'];
        $user_weight= $row_user['weight'];
        $user_age= $row_user['age'];
        $_SESSION['password'] = $user_password;


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

    ?>
</div>
<form method="POST" action="" name ="update_workout" >
    <table width="794px" align="center" border="1" bgcolor="#f1533e">
        <tr>
            <td colspan="2" align="center"><h1>Change profile</h1></td>
        </tr>
        <tr>
            <td align="right"><b>Name</b></td>
            <td><input type="text" name="name" value="<?php echo $user_name; ?>"></td>
        </tr>
        <tr>
            <td align="right"><b>Age</b></td>
            <td><input type="text" name="age" value="<?php echo $user_age; ?>"></td>
        </tr>
        <tr>
            <td align="right"><b>Weight</b></td>
            <td><input type="text" name="weight" value="<?php echo $user_weight; ?>"></td>
        </tr>
        <tr>
            <td align="right"><b>Old password</b></td>
            <td><input type="password" name="oldpassword"></td>
        </tr>
        <tr>
            <td align="right"><b>New password</b></td>
            <td><input type="password" name="newpassword"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="update_user" value="Update User"></td>
        </tr>
    </table>
</form>
<?php

if (isset($_POST['update_user']))
{

    $userpassword = $_SESSION['password'];
    //Text Data Variables

    $user_name= $_POST['name'];
    $user_weight = $_POST['weight'];
    $user_age= $_POST['age'];
    $password1 = mysqli_real_escape_string($con, $_POST['oldpassword']);
    $password2 = mysqli_real_escape_string($con, $_POST['newpassword']);








    if ($user_name=='') {
        echo "<script>alert('Please Fill All The Fields!')</script>";
        exit();
    }
    elseif ($user_weight =='') {
        echo "<script>alert('Please Fill All The Fields!')</script>";
        exit();
    }
    elseif ($user_age=='') {
        echo "<script>alert('Please Fill All The Fields!')</script>";
        exit();
    }elseif(!password_verify($password1, $userpassword)){
        echo "<script>alert('Incorect password')</script>";
        exit();
    }


    else{

        $encpass = password_hash($password2, PASSWORD_BCRYPT);

        //Query For Inserting Workout Into Database.....
        $update_exer = "UPDATE users SET name='$user_name',weight = '$user_weight', age='$user_age',password = '$encpass'  WHERE email='$email'";
        $result = $con->query($update_exer);
        if ($result) {
            echo "<script>alert('Profile Updated')</script>";
            echo "<script>window.open('admin_page.php?my_account','_self')</script>";
        }
        else{
            echo "<script>alert('Error')</script>";
        }

    }
}
?>
</body>
</html>
