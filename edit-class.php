<?php
require_once("config.php");
require_once("validate-session.php");

$class_id = $_REQUEST['id'];
if($class_id) {
    $selSql = "SELECT * FROM `classes` WHERE id=$class_id";
    $class = $con->query($selSql);
    if($class->num_rows) {
        $classRecord = $class->fetch_assoc();
    } else {
        $_SESSION['error']= "Record not found...";
        header("Location: manage-class.php");
    }
} else {
    header("Location: manage-class.php");
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
                <h4>Edit class</h4>
            </div>
            <div class="board">
                <h4>Edit class</h4>
            </div>
        </div>
        <div class="data">
                        <?php 
                            require_once("message.php");
                        ?>
                <form action="update-class.php" method="post" id="classdata">
                <input type="hidden" name="id" value="<?php echo $classRecord['id'];?>">
                    <table border="1" style="border-collapse:collapse;margin-top: 20px;width: 250px;" cellpadding="2">
                        <tr>
                            <td>class_name*</td>
                            <td>
                                <input type="text" name="class_name" value="<?php echo $classRecord['class_name']?>">
                            </td>
                        </tr>
                        <tr>
                            <td>status*</td>
                            <td>`
                                <select name="status" id="" style="padding:0 36px" >
                                    <!-- <option value="">None</option> -->
                                    <option value="1" <?= ($classRecord['status']==1)?'selected':''?>>Enable</option>
                                    <option value="0" <?= ($classRecord['status']==0)?'selected':''?>>Disable</option>
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
    
</body>
</html>
