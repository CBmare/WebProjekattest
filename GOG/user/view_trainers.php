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
if(isset($_GET['view_trainers'])) {
    ?>
    <table align="center" width="794" style="color:white;">
        <tr align="center">
            <td colspan="6"><h2>View All Exercises</h2><br></td>
        </tr>
        <tr>
            <th>Trainer No</th>
            <th>Trainer name</th>
            <th>Trainer weight</th>
            <th>Trainer age</th>


        </tr>
        <?php
        $i=0;
        $select_trainer="SELECT * FROM users WHERE user_type= 'trainer'";
        $run_trainer=mysqli_query($con, $select_trainer);
        while ($row_trainer=mysqli_fetch_array($run_trainer)) {
            $trainer_id=$row_trainer['id'];
            $trainer_name=$row_trainer['name'];
            $trainer_weight = $row_trainer['weight'];
            $trainer_age = $row_trainer['age'];


            $i++;

            ?>
            <tr align="center">
                <td><?php echo $i; ?></td>
                <td><?php echo $trainer_name; ?></td>
                <td><?php echo $trainer_weight; ?></td>
                <td><?php echo $trainer_age; ?></td>


            </tr>
        <?php } ?>
    </table>
<?php } ?>
</body>
</html>