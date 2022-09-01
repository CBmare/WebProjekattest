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
if(isset($_GET['view_categories'])) {
    ?>
    <table align="center" width="794" style="color:white;">
        <tr align="center">
            <td colspan="6"><h2>View All Categories</h2><br></td>
        </tr>
        <tr>
            <th>Category No</th>
            <th>Category Name</th>
            <th>Delete</th>
        </tr>
        <?php
        $i=0;
        $sel_category="SELECT * FROM category";
        $run_category=mysqli_query($con, $sel_category);
        while ($row_exer=mysqli_fetch_array($run_category)) {
            $category_id=$row_exer['id'];
            $category_name = $row_exer['name'];


            $i++;

            ?>
            <tr align="center">
                <td><?php echo $i; ?></td>
                <td><?php echo $category_name; ?></td>
                <td><a href="admin_page.php?delete_categories=<?php echo $category_id; ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>
</body>
</html>