<?php 
 require_once("config.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php   require_once("head.php");            ?>
</head>
<body>
    <?php    
     require_once("navigation.php");
     //require_once("config.php");
     ?>
    <div class="aside-right">
        <?php 
        require_once("top-header.php");
        ?>
        <div class="section1">
            <div class="board">
                <h4>Add Section</h4>
            </div>
            <div class="board">
                <h4>Add Section</h4>
            </div>
        </div>
        <div class="data">
            <?php if(isset($_SESSION['validation_error'])) {?>
                <div class="error">
                    <?php echo $_SESSION['validation_error'];?>
                </div>
            <?php 
            unset($_SESSION['validation_error']);
            } 
            ?>


                <form action="section-data.php" method="post" >
                    <table border="1" style="border-collapse:collapse; margin-top:20px; width:250px;" cellpadding="2">
                        <tr>
                            <td>section_name*</td>
                            <td><input type="text" name="section_name" value="<?php echo (isset($_SESSION['section_name']))?$_SESSION['section_name']:'';?>"></td>
                        </tr>
                            <td>Class_name*</td>
                            <td>
                            <select name="class" id="" style="padding:0 36px" required>
                                <!-- <option value="">None</option> -->
                                <?php
                                $getvalue = "SELECT * FROM `classes` WHERE  status = 1";
                                $get = $con->query($getvalue);
                                if($get->num_rows > 0) {
                                    while($classRows = $get->fetch_assoc()) {
                                        ?>
                                        <option value="<?= $classRows['id'] ?>"><?= $classRows['class_name'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            </td>
                        </tr>
                        <tr align="center">
                            <td colspan="2"><input type="submit" name="save" value="save"></td>
                        </tr>
                    </table>
                </form>

        </div>
    </div>
    
</body>
</html>



