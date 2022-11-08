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
                <h4>Add city</h4>
            </div>
            <div class="board">
                <h4>Add city</h4>
            </div>
        </div>
        <div class="data">
                        <?php 
                            require_once("message.php");
                        ?>
                <form action="city-data.php" method="post" id="classdata">
                    <table border="1" style="border-collapse:collapse;margin-top: 20px;width: 250px;" cellpadding="2">
                        <tr>
                            <td>country_name*</td>
                            <td>
                            <select name="country_id" id="country_id" style="padding:0 30px" required>
                                <option value="">Select-Country</option>
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
                        <tr>
                            <td>state_name*</td>
                            <td>
                            <select name="state_id" id="state_id" style="padding:0 30px" required>
                                <option value="">Select-State</option>
                                <?php
                                $getvalue = "SELECT * FROM `states`";
                                $get = $con->query($getvalue);
                                if($get->num_rows > 0) {
                                    while($stateRows = $get->fetch_assoc()) {
                                        ?>
                                        <option value="<?= $stateRows['id'] ?>"><?= $stateRows['state_name'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>city_name*</td>
                            <td>
                                <input type="text" name="city_name" id="city_name" size="23" value="<?php echo (isset($_SESSION['city_name']))?$_SESSION['city_name']:'';?>">
                            </td>
                        </tr>
                        <tr>
                            <td>status*</td>
                            <td>
                            <?php
                                $selOption = (isset($_SESSION['city_status']))?$_SESSION['city_status']:'';
                            ?>
                                <select name="city_status" id="" style="padding:0 45px" >
                                    <option value="">Select-City</option>
                                    <option value="1" <?php echo ($selOption==='1')?'selected':'';?>>Enable</option>
                                    <option value="0" <?php echo ($selOption==='0')?'selected':'';?>>Disable</option>
                                </select>
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
        $('#country_id').change(function(){
            countryId = $(this).val();

            $.ajax({
                url: "get-state.php",
                type: 'GET',
                data: {'countryId': countryId},
                success: function(result){
                    $('#state_id').html(result);
                },
                error: function(err){
                    alert("Error...");
                }
            });

        });
    });
</script>
</body>
</html>
