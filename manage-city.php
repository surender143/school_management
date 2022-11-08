<?php
include_once("config.php");
require_once("validate-session.php");
?>
<?php
    $count = "SELECT count(*) as total FROM `citys`";
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
                <h4>Manage-city</h4>
            </div>
            <div class="board">
                <h4>Manage-city</h4>
            </div>
        </div>
        <div class="data">
        <?php require_once("message.php");?>
            <button class="add-class"><a href="city-form.php">Add new city</a></button>
            <table border="1" cellspacing="0" cellpadding="3" width="500">
                <tr>
                    <th>ID</th>
                    <th>Country_name</th>
                    <th>State_name</th>
                    <th>City_name</th>
                    <th>City_Status</th>
                    <th>Action</th>

                </tr>
                <?php
                
                    $selectQuery = "SELECT cit.*, cls.country_name,sec.state_name FROM `citys` as cit, `states` as sec ,`countrys` as cls WHERE cit.state_id=sec.id and sec.country_id=cls.id limit $offset,$limit";
                    $classData = $con->query($selectQuery);
                    if($classData->num_rows > 0) {
                        $i= $offset+1;
                        while($classRows = $classData->fetch_assoc()) {
                            ?>
                            <tr align="center">
                                <td><?php echo $i++;?></td>
                                <td><?php echo $classRows['country_name'];?></td>
                                <td><?php echo $classRows['state_name'];?></td>
                                <td><?php echo $classRows['city_name'];?></td>
                                <td><?php echo ($classRows['city_status']==1)?"Enable":"Disable";?></td>
                                <td>
                                    <a href=".php?id=<?php echo $classRows['id']; ?>"><button class="green">Edit</button></a>
                                    <a  class="delete-class"href=".php?id=<?php echo $classRows['id']; ?>"><button class="red">Delete</button></a>
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
                    <div class="hover"><a href="manage-city.php?page=<?=$ex-1 ?>">Prev</a></div>
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
                    <div class="hover"><a href="manage-city.php?page=<?=$ex+1 ?>">Next</a></div>
                    <?php
                }
            ?>
        </div>
    </div>
    
</body>
</html>
