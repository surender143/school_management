<?php
require_once("config.php");
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
                <h4>Add state</h4>
            </div>
            <div class="board">
                <h4>Add state</h4>
            </div>
        </div>
        <div class="data">
                        <?php 
                            require_once("message.php");
                        ?>
                <form action="state-data.php" method="post" id="classdata">
                    <table border="1" style="border-collapse:collapse;margin-top: 20px;width: 250px;" cellpadding="2">
                        
                        <tr>
                            <td>state_name*</td>
                            <td>
                                <input type="text" name="state_name" value="<?php echo (isset($_SESSION['state_name']))?$_SESSION['state_name']:'';?>">
                            </td>
                        </tr>
                        <tr>
                            <td>country_name*</td>
                            <td>
                            <select name="country" id="" style="padding:0 36px" required>
                                <!-- <option value="">None</option> -->
                                <?php
                                $getvalue = "SELECT * FROM `countrys`";
                                $get = $con->query($getvalue);
                                if($get->num_rows > 0) {
                                    while($countryRows = $get->fetch_assoc()) {
                                        ?>
                                        <option value="<?= $countryRows['id'] ?>"><?= $countryRows['country_name'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            </td>
                        </tr>
                        <?php unset($_SESSION['state_name']); ?>
                        <tr>
                            <td>state_status*</td>
                            <td>
                            <?php
                                $selOption = (isset($_SESSION['state_status']))?$_SESSION['state_status']:'';
                            ?>
                                <select name="state_status" id="" style="padding:0 36px" >
                                    <!-- <option value="">None</option> -->
                                    <option value="1" <?php echo ($selOption==='1')?'selected':'';?>>Enable</option>
                                    <option value="0" <?php echo ($selOption==='0')?'selected':'';?>>Disable</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Add city</td>
                            <td>
                                <table id="city_table" style="border-collapse:collapse;" class="sec">
                                    <tr>
                                        <th>City Name</th>
                                        <th>City_Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="city_name[]">
                                        </td>
                                        <td>
                                        <?php
                                            $selOption = (isset($_SESSION['city_status']))?$_SESSION['city_status']:'';
                                        ?>
                                            <select name="city_status[]" id="" style="padding:0 36px" >
                                                <!-- <option value="">None</option> -->
                                                <option value="1" <?php echo ($selOption==='1')?'selected':'';?>>Enable</option>
                                                <option value="0" <?php echo ($selOption==='0')?'selected':'';?>>Disable</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="button" id="add_city" value="Add"/>
                                        </td>
                                    </tr>
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
        $('#add_city').click(function(){
            var tRow = '<tr><td><input type="text" name="city_name[]"></td><td><?php
                                            $selOption = (isset($_SESSION['status']))?$_SESSION['status']:'';
                                        ?>
                                            <select name="city_status[]" id="" style="padding:0 36px" ><option value="1" <?php echo ($selOption==='1')?'selected':'';?>>Enable</option><option value="0" <?php echo ($selOption==='0')?'selected':'';?>>Disable</option></select></td><td> <input type="button" class="remove_state"value="Remove"/> </td> </tr>';
            $('#city_table').append(tRow);
        });

        $('body').delegate(".remove_state", "click", function(){
            $(this).closest('tr').remove();
        });

    });
    </script>
    <?php  unset($_SESSION['state_name']); ?>
</body>
</html>
