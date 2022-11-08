<?php
require_once("config.php");
require_once("validate-session.php");

$selectQuery = "SELECT * FROM `classes`";
$classData = $con->query($selectQuery);
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
    <?php   require_once("head.php");  ?>
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
                    <h4>Manage section</h4>
                </div>
                <div class="board">
                    <h4>Manage section</h4>
                </div>
            </div>
            <div class="data">
            <?php require_once("message.php");?>
            <button class="add-class"><a href="sectionform.php">Add new section</a></button>
            <table border="1" cellspacing="0" cellpadding="3" width="500">
                <tr>
                    <th>ID</th>
                    <th>Class_name</th>
                    <th>Section_name</th>

                </tr>
                <?php
                    $selectQuery = "SELECT sec.*, cls.class_name FROM `section` as sec, `classes` as cls where sec.class_name=cls.id limit $offset,$limit";
                    $classData = $con->query($selectQuery);
                    if($classData->num_rows > 0) {
                        $i=$offset+1;
                        while($classRows = $classData->fetch_assoc()) {
                            ?>
                            <tr align="center">
                                <td><?php echo $i++;?></td>
                                <td><?php echo $classRows['class_name'];?></td>
                                <td><?php echo $classRows['section_name'];?></td>
                                
                            </tr>
                            <?php
                        }
                    }
                
                ?>
                
            </table>
            
            <?php
             if($ex > 1){
                ?>
                <div class="hover"><a href="manage-section.php?page=<?=$ex-1 ?>">Prev</a></div>
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
                   <div class="hover"> <a href="manage-section.php?page=<?=$ex+1 ?>">Next</a></div>
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



                    