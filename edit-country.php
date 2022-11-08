<?php
require_once("config.php");
require_once("validate-session.php");

$country_id = $_REQUEST['id'];
if($country_id) {
    $selSql = "SELECT * FROM `countrys` WHERE id=$country_id";
    $country = $con->query($selSql);
    if($country->num_rows) {
        $countryRecord = $country->fetch_assoc();
    } else {
        $_SESSION['error']= "Record not found...";
        header("Location: manage-country.php");
    }
} else {
    header("Location: manage-country.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php require_once("head.php"); ?>
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
                <h4>Edit country</h4>
            </div>
            <div class="board">
                <h4>Edit country</h4>
            </div>
        </div>
        <div class="data">
                        <?php 
                            require_once("message.php");
                        ?>
                <form action="update-country.php" method="post" id="classdata">
                <input type="hidden" name="country_id" value="<?php echo $countryRecord['id'];?>">
                    <table border="1" style="border-collapse:collapse;margin-top: 20px;width: 250px;" cellpadding="2">
                        <tr>
                            <td>country_name*</td>
                            <td>
                                <input type="text" name="country_name" value="<?php echo $countryRecord['country_name']?>">
                            </td>
                        </tr>
                        <tr>
                            <td>status*</td>
                            <td>
                                <select name="country_status" id="" style="padding:0 36px" >
                                    <!-- <option value="">None</option> -->
                                    <option value="1" <?= ($countryRecord['country_status']==1)?'selected':''?>>Enable</option>
                                    <option value="0" <?= ($countryRecord['country_status']==0)?'selected':''?>>Disable</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Edit and Add state</td>
                            <td>
                                <table id="state_table" style="border-collapse:collapse;" class="sec">
                                    <tr>
                                        <th>S.no</th>
                                        <th>State Name</th>
                                        <th>State_Status</th>
                                        <th>Action</th>
                                        <th><input type="button" id="add_state" value="Add"/></th>
                                    </tr>
                                    
                                    <?php
                
                                        $selectQuery = "SELECT * FROM `states` WHERE country_id=$country_id";
                                        $stateData = $con->query($selectQuery);
                                        if($stateData->num_rows > 0) {
                                            $i=1;
                                            while($stateRows = $stateData->fetch_assoc()) {
                                                ?>
                                                <tr align="center">
                                                    <td><input type="hidden" name="state_id[]" value="<?php echo $stateRows['id'];?>"><?php echo $i++;?></td>
                                                    <td><input type="text" name="state_name[]" value="<?php echo $stateRows['state_name'];?>"></td>
                                                    <td>
                                                        <select name="state_status[]" id="" style="padding:0 36px" >
                                                            <!-- <option value="">None</option> -->
                                                            <option value="1" <?= ($stateRows['state_status']==1)?'selected':''?>>Enable</option>
                                                            <option value="0" <?= ($stateRows['state_status']==0)?'selected':''?>>Disable</option>
                                                        </select>
                                                    </td>
                                                    <td> <input type="button" class="remove_state" value="Delete"/>  </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                </table>
                            </td>
                        </tr>
                        <tr align="center">
                            <td colspan="2"><input type="submit" name="save"value="save"></td>
                        </tr>
                    </table>
                </form>
            </div>
    </div>
    <script>
    $(document).ready(function(){
        $('#add_state').click(function(){
            var tRow = '<tr><input type="hidden" name="state_id[]"><td></td><td><input type="text" name="state_name[]"></td><td><?php
                                            $selOption = (isset($_SESSION['state_status']))?$_SESSION['state_status']:'';
                                        ?>
                                            <select name="state_status[]" id="" style="padding:0 36px" ><option value="1" <?php echo ($selOption==='1')?'selected':'';?>>Enable</option><option value="0" <?php echo ($selOption==='0')?'selected':'';?>>Disable</option></select></td><td> <input type="button" class="remove_state"value="Remove"/> </td> </tr>';
            $('#state_table').append(tRow);
        });

        $('body').delegate(".remove_state", "click", function(){
            $(this).closest('tr').remove();
        });

    });
    </script>
</body>
</html>
