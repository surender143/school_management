<?php
require_once("config.php");
require_once("validate-session.php");

$selectQuery = "SELECT * FROM `classes`";
$classData = $con->query($selectQuery);
?>
<?php
    $count = "SELECT count(*) as total FROM `students`";
    $countvalue = $con->query($count);
    $countrow = $countvalue->fetch_assoc();
    
    $limit = 5;

    $page = ceil($countrow['total']/$limit);
   
    if(isset($_REQUEST['page'])){
        $ex = $_REQUEST['page'];
    }else{
        $ex = 1;
    }
    $offset=($ex-1)*$limit;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php   require_once("head.php");            ?>
</head>
<body>
    <?php    
     require_once("navigation.php");
     ?>
    <div class="aside-right">
            <?php 
            require_once("top-header.php");
            ?>
        <div class="section1">
                <div class="board">
                    <h4>manage student</h4>
                </div>
                <div class="board">
                    <h4>manage student</h4>
                </div>
            </div>
            <div class="data">
            <?php if(isset($_SESSION['success'])) {?>
            <div class="success">
                <?php echo $_SESSION['success'];?>
            </div>
        <?php 
            unset($_SESSION['success']);
            } 
        ?>
        <button class="add-student"><a href="studentsform.php">Add new student</a></button>
        <table border="1" cellspacing="0" cellpadding="3" width="500">
            <tr>
                <th>ID</th>
                <th>Student name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Class</th>
                <th>Action</th>

            </tr>
            <?php
                $selectQuery = "SELECT * FROM `students` limit $offset,$limit";
                $studentsData = $con->query($selectQuery);
                if($studentsData->num_rows > 0) {
                    
                    $i = $offset+1;
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
                            <td>
                                    <a href="#"><button class="green">Edit</button></a>
                                    <a href="#"><button class="red">Delete</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                }
            ?>
        </table>
        <?php
            if($ex > 1){
                ?>
                <div class="hover"><a href="manage-student.php?page=<?=$ex-1 ?>">Prev</a></div>
                <?php
            }
            for($i = 1;$i <= $page;$i++ ){
                if($i == $ex){
                    $active = "active";
                }else{
                    $active = "";
                }
                ?>
                <div class="page <?= $active ?>"><a href="?page=<?=$i ?>"><?=  $i.'&nbsp';?></a></div>
                <?php
            }
            if($page > $ex){
                ?>
               <div class="hover"> <a href="manage-student.php?page=<?=$ex+1 ?>">Next</a></div>
                <?php
            }
        ?>
        </div>
    </div>
</body>
</html>



                    