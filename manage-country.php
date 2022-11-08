<?php
include_once("config.php");
require_once("validate-session.php");
?>
<?php
    $count = "SELECT count(*) as total FROM `countrys`";
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
                <h4>Manage-country</h4>
            </div>
            <div class="board">
                <h4>Manage-country</h4>
            </div>
        </div>
        <div class="data">
        <?php require_once("message.php");?>
            <button class="add-class"><a href="country-form.php">Add new country</a></button>
            <div class="searchcountry">
                <form action="" method="post">
                    <input type="text" name="search">
                    <input type="submit" value="Search" name="submit">
                </form>
            </div>
            <table border="1" cellspacing="0" cellpadding="3" width="500">
                <tr>
                    <th>ID</th>
                    <th>Country_name</th>
                    <th>Country_Status</th>
                    <th>Action</th>

                </tr>
                <?php
                    if(isset($_REQUEST['submit'])){
                        $search = $_REQUEST['search'];
                        $select = "SELECT * FROM `countrys` WHERE country_name LIKE '$search%'";
                        $searchDate = $con->query($select);
                        if($searchDate -> num_rows > 0){
                            $i = 1;
                            while($searchRow = $searchDate->fetch_assoc()){
                                ?>
                                <tr align="center">
                                <td><?php echo $i++;?></td>
                                <td><?php echo $searchRow['country_name'];?></td>
                                <td><?php echo ($searchRow['country_status']==1)?"Enable":"Disable";?></td>
                                <td>
                                    <a href="edit-country.php?id=<?php echo $searchRow['id']; ?>"><button class="green">Edit</button></a>
                                    <a  class="delete-class"href="delete-country.php?id=<?php echo $searchRow['id']; ?>"><button class="red">Delete</button></a>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                    }else{
                
                    $selectQuery = "SELECT * FROM `countrys` order by id DESC limit $offset,$limit";
                    $classData = $con->query($selectQuery);
                    if($classData->num_rows > 0) {
                        $i= $offset+1;
                        while($classRows = $classData->fetch_assoc()) {
                            ?>
                            <tr align="center">
                                <td><?php echo $i++;?></td>
                                <td><?php echo $classRows['country_name'];?></td>
                                <td><?php echo ($classRows['country_status']==1)?"Enable":"Disable";?></td>
                                <td>
                                    <a href="edit-country.php?id=<?php echo $classRows['id']; ?>"><button class="green">Edit</button></a>
                                    <a  class="delete-class"href="delete-country.php?id=<?php echo $classRows['id']; ?>"><button class="red">Delete</button></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                }
                ?>
                
            </table>
            
            <?php
                if($ex > 1){
                    ?>
                    <div class="hover"><a href="manage-country.php?page=<?=$ex-1 ?>">Prev</a></div>
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
                    <div class="hover"><a href="manage-country.php?page=<?=$ex+1 ?>">Next</a></div>
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
