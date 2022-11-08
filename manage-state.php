<?php
include_once("config.php");
require_once("validate-session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php   require_once("head.php"); ?>
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" >
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
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
                <h4>Manage-state</h4>
            </div>
            <div class="board">
                <h4>Manage-state</h4>
            </div>
        </div>
        <div class="data">
        <?php require_once("message.php");?>
            <button class="add-class"><a href="state-form.php">Add new state</a></button>
            <table border="1" cellspacing="0" cellpadding="3" width="500" class="state_table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Country_name</th>
                    <th>State_name</th>
                    <th>State_Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <?php
                
                    $selectQuery = "SELECT st.*, coun.country_name FROM `states` as st LEFT JOIN `countrys` as coun ON st.country_id=coun.id order by id DESC ";
                    $stateData = $con->query($selectQuery);
                    if($stateData->num_rows > 0) {
                        $i= 1;
                        while($stateRows = $stateData->fetch_assoc()) {
                            ?>
                            <tr align="center">
                                <td><?php echo $i++;?></td>
                                <td><?php echo $stateRows['country_name'];?></td>
                                <td><?php echo $stateRows['state_name'];?></td>
                                <td><?php echo ($stateRows['state_status']==1)?"Enable":"Disable";?></td>
                                <td>
                                    <a href="edit-state.php?id=<?php echo $stateRows['id']; ?>"><button class="green">Edit</button></a>
                                    <a  class="delete-class"href="delete-state.php?id=<?php echo $stateRows['id']; ?>"><button class="red">Delete</button></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>
                
            </table>
            
        </div>
    </div>
    <script>
            $(document).ready(function(){
                $(".state_table").DataTable();
            });
        </script>
</body>
</html>
