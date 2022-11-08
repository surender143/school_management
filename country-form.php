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
                <h4>Add country</h4>
            </div>
            <div class="board">
                <h4>Add country</h4>
            </div>
        </div>
        <div class="data">
                        <?php 
                            require_once("message.php");
                        ?>
                <form action="country-data.php" method="post" id="classdata">
                    <table border="1" style="border-collapse:collapse;margin-top: 20px;width: 250px;" cellpadding="2">
                        <tr>
                            <td>country_name*</td>
                            <td>
                                <input type="text" name="country_name" value="<?php echo (isset($_SESSION['country_name']))?$_SESSION['country_name']:'';?>">
                            </td>
                        </tr>
                        <?php unset($_SESSION['country_name']); ?>
                        <tr>
                            <td>country_status*</td>
                            <td>
                            <?php
                                $selOption = (isset($_SESSION['country_status']))?$_SESSION['country_status']:'';
                            ?>
                                <select name="country_status" id="" style="padding:0 36px" >
                                    <!-- <option value="">None</option> -->
                                    <option value="1" <?php echo ($selOption==='1')?'selected':'';?>>Enable</option>
                                    <option value="0" <?php echo ($selOption==='0')?'selected':'';?>>Disable</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Add state</td>
                            <td>
                                <table id="state_table" style="border-collapse:collapse;" class="sec">
                                    <tr>
                                        <th>State Name</th>
                                        <th>State_Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="state_name[]">
                                        </td>
                                        <td>
                                        <?php
                                            $selOption = (isset($_SESSION['state_status']))?$_SESSION['state_status']:'';
                                        ?>
                                            <select name="state_status[]" id="" style="padding:0 36px" >
                                                <!-- <option value="">None</option> -->
                                                <option value="1" <?php echo ($selOption==='1')?'selected':'';?>>Enable</option>
                                                <option value="0" <?php echo ($selOption==='0')?'selected':'';?>>Disable</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="button" id="add_state" value="Add"/>
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
        $('#add_state').click(function(){
            var tRow = '<tr><td><input type="text" name="state_name[]"></td><td><?php
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
    <?php  unset($_SESSION['country_name']); ?>
</body>
</html>
