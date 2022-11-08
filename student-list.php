<?php
require_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>students-list</title>
</head>
<body>
<h1>students List</h1>
<?php 
require_once("message.php");
?>
        <table border="1" cellspacing="0" cellpadding="3" width="500">
            <tr>
                <th>ID</th>
                <th>Student name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Class</th>

            </tr>
            <?php
                $selectQuery = "SELECT * FROM `students`";
                $studentsData = $con->query($selectQuery);
                if($studentsData->num_rows > 0) {
                    
                    $i = 1;
                    while($studentsRows = $studentsData->fetch_assoc()) {
                        
                        ?>

                        <tr>
                            <td><?php                         
                            echo $i;
                            $i++;
                            
                            ?></td>
                            <td><?php echo $studentsRows['student_name'];?></td>
                            <td><?php echo $studentsRows['Mobile'];?></td>
                            <td><?php echo $studentsRows['Email'];?></td>
                            <td><?php echo $studentsRows['Class'];?></td>
                            
                        </tr>
                        

                        <?php
                    }
                }
              
            ?>
            <tr align="center" bgcolor="green"><td colspan="5"><button><a href="studentsform.php">Add new student</a></button></td></tr>
        </table>
</body>
</html>