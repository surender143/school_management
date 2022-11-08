<?php
require_once("config.php");
$state_id = $_REQUEST['id'];
if($state_id) {
    $selSql = "SELECT * FROM `states` WHERE id=$state_id";
    $state = $con->query($selSql);
    if($state->num_rows) {
        $stateRecord = $state->fetch_assoc();
        $country_id = $stateRecord['country_id'];
    } else {
        $_SESSION['error']= "Record not found...";
        header("Location: manage-state.php");
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
                <h4>Edit state</h4>
            </div>
            <div class="board">
                <h4>Edit state</h4>
            </div>
        </div>
        <div class="data">
                        <?php 
                            require_once("message.php");
                        ?>
                <form action="update-state.php" method="post" id="classdata">
                <input type="hidden" name="id" value="<?php echo $stateRecord['id'];?>">
                    <table border="1" style="border-collapse:collapse;margin-top: 20px;width: 250px;" cellpadding="2">
                        
                        <tr>
                            <td>state_name*</td>
                            <td>
                                <input type="text" name="state_name" value="<?php echo $stateRecord['state_name']?>">
                            </td>
                        </tr>
                        <?php  unset($_SESSION['state_name']); ?>
                        <tr>
                            <td>status*</td>
                            <td>
                            <select name="state_status" id="" style="padding:0 36px" >
                            <!-- <option value="">None</option> -->
                            <option value="1" <?= ( $stateRecord['state_status']==1)?'selected':''?>>Enable</option>
                            <option value="0" <?= ( $stateRecord['state_status']==0)?'selected':''?>>Disable</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>country_name*</td>
                            <td>
                            <select name="country_id" id="" style="padding:0 36px" required>
                                <!-- <option value="">None</option> -->
                                <?php
                                $getvalue = "SELECT * FROM `countrys`";
                                $get = $con->query($getvalue);
                                if($get->num_rows > 0) {
                                    while($countryRows = $get->fetch_assoc()) {
                                        ?>
                                        <option value="<?= $countryRows['id'] ?>" <?= ( $countryRows['id']==$country_id)?'selected':''?>><?= $countryRows['country_name'] ?></option>
                                        <option value="<?= $countryRows['id'] ?>" <?= ( $countryRows['id']==$country_id)?'selected':''?>><?= $countryRows['country_name'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            </td>
                        </tr>
                        <?php unset($_SESSION); ?>
                        <tr>
                            <td>Edit and Add City</td>
                            <td>
                            <table id="state_table" style="border-collapse:collapse;" class="sec">
                                    <tr>
                                        <th>S.no</th>
                                        <th>city Name</th>
                                        <th>city_Status</th>
                                        <th>Action</th>
                                        <th><input type="button" id="add_city" value="Add"/></th>
                                    </tr>
                                    
                                    <?php
                
                                        $selectQuery = "SELECT * FROM `citys` WHERE state_id = $state_id";
                                        $cityData = $con->query($selectQuery);
                                        if($cityData->num_rows > 0) {
                                            $i=1;
                                            while($cityRows = $cityData->fetch_assoc()) {
                                                ?>
                                                <tr align="center">
                                                    <td><input type="hidden" name="city_id[]" value="<?php echo $cityRows['id'];?>"><?php echo $i++;?></td>
                                                    <td><input type="text" name="city_name[]" value="<?php echo $cityRows['city_name'];?>"></td>
                                                    <td>
                                                        <select name="city_status[]" id="" style="padding:0 36px" >
                                                            <!-- <option value="">None</option> -->
                                                            <option value="1" <?= ($cityRows['city_status']==1)?'selected':''?>>Enable</option>
                                                            <option value="0" <?= ($cityRows['city_status']==0)?'selected':''?>>Disable</option>
                                                        </select>
                                                    </td>
                                                    <td> <input type="button" class="remove_city" value="Delete"/>  </td>
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
    <?php  unset($_SESSION['state_name']); ?>
    <script>
    $(document).ready(function(){
        $('#add_city').click(function(){
            var tRow = '<tr><input type="hidden" name="city_id[]"><td></td><td><input type="text" name="city_name[]"></td><td><?php
                                            $selOption = (isset($_SESSION['city_status']))?$_SESSION['city_status']:'';
                                        ?>
                                            <select name="city_status[]" id="" style="padding:0 36px" ><option value="1" <?php echo ($selOption==='1')?'selected':'';?>>Enable</option><option value="0" <?php echo ($selOption==='0')?'selected':'';?>>Disable</option></select></td><td> <input type="button" class="remove_city"value="Remove"/> </td> </tr>';
            $('#state_table').append(tRow);
        });

        $('body').delegate(".remove_city", "click", function(){
            $(this).closest('tr').remove();
        });

    });
    </script>
</body>
</html>
