<?php
session_start();
require_once("config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("menu.php");   
?>
    <title>class-list</title>
    <style>
            
        </style>
</head>
<body>
<h1>class List</h1>
<?php 
require_once("message.php");
?>
        <table border="1" cellspacing="0" cellpadding="3" width="500">
            <tr>
                <th>ID</th>
                <th>class_name</th>
                <th>status</th>

            </tr>
            <?php
                $selectQuery = "SELECT * FROM `classes`";
                $classData = $con->query($selectQuery);
                if($classData->num_rows > 0) {
                    while($classRows = $classData->fetch_assoc()) {
                        ?>
                        <tr align="center">
                            <td><?php echo $classRows['ID'];?></td>
                            <td><?php echo $classRows['class_name'];?></td>
                            <td><?php echo ($classRows['status']==1)?"Enable":"Disable";?></td>
                            
                        </tr>
                        <?php
                    }
                }
              
            ?>
            <tr align="center" bgcolor="green"><td colspan="5"><button><a href="classform.php">Add new class</a></button></td></tr>
        </table>
</body>
</html>