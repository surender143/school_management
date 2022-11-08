<?php
include_once("config.php");
require_once("validate-session.php");
?>
<?php
    $count = "SELECT count(*) as total FROM `section`";
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
    <?php   require_once("head.php"); ?>
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
                <h4>Registrated-students-List</h4>
            </div>
            <div class="board">
                <h4>Registrated-students-List</h4>
            </div>
        </div>
        <div class="data">
<?php 
require_once("message.php");
?>
        <button class="reg-button"><a href="student-registration-form.php">Register new student</a></button>
        <table border="1" cellspacing="0" cellpadding="3" width="500" class="registrated_student_list">
            <tr>
                <th>ID</th>
                <th>Candidate</th>
                <th>Aadhaar</th>
                <th>Birth</th>
                <th>General</th>
                <th>Action</th>

            </tr>
            <?php
                $selectQuery = "SELECT * FROM `student-registration` limit $offset,$limit";
                $studentsData = $con->query($selectQuery);
                if($studentsData->num_rows > 0) {
                    while($studentsRows = $studentsData->fetch_assoc()) {
                        
                        ?>

                        <tr>
                            <td><?php echo $studentsRows['id']; ?></td>
                            <td><?php echo $studentsRows['candidate_name'];?></td>
                            <td><?php echo $studentsRows['aadhaar_no'];?></td>
                            <td><?php echo $studentsRows['dob'];?></td>
                            <td><?php echo $studentsRows['general'];?></td>
                            <td>
                                <a href="edit-register-student.php?id=<?php echo $studentsRows['id']; ?>"><button class="green">Edit</button></a>
                                <a  class="delete-class" href="delete-register-student.php?id=<?php echo $studentsRows['id']; ?>"><button class="red">Delete</button></a>
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
                   <div class="hover"> <a href="manage-class.php?page=<?=$ex-1 ?>">Prev</a></div>
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
                if( $page > $ex ){
                    ?>
                   <div class="hover"> <a href="manage-class.php?page=<?=$ex+1 ?>">Next</a></div>
                    <?php
                }
            ?>
        </div>
    </div>
    <script>
    $(document).ready(function(){
        $('.delete-class').click(function(e){
            confirmation = confirm("Are you sure want to delete this record...");
            if(!confirmation) {
                e.preventDefault();
            }
            
        });
    });
</script>
</body>
</html>
