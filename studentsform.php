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
                <h4>Add student</h4>
            </div>
            <div class="board">
                <h4>Add student</h4>
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


                <form action="students-data.php" method="post" >
                    <table border="1" style="border-collapse:collapse; margin-top:20px; width:250px;" cellpadding="2">
                        <tr>
                            <td>student_name*</td>
                            <td><input type="text" name="student_name" value="<?php echo (isset($_SESSION['student_name']))?$_SESSION['student_name']:'';?>"></td>
                        </tr>
                        <tr>
                            <td>Mobile*</td>
                            <td><input type="text" name="mobile" value="<?php echo (isset($_SESSION['mobile']))?$_SESSION['mobile']:'';?>"></td>
                        </tr>
                        <tr>
                            <td>Email*</td>
                            <td><input type="text" name="email" value="<?php echo (isset($_SESSION['email']))?$_SESSION['email']:'';?>"></td>
                        </tr>
                        <tr>
                            <td>Class*</td>
                            <td>
                            <select name="class" id="class_id" style="padding:0 36px" required>
                                <option value="">None</option>
                                <?php
                                $getvalue = "SELECT * FROM `classes`";
                                $get = $con->query($getvalue);
                                if($get->num_rows > 0) {
                                    while($classRows = $get->fetch_assoc()) {
                                        ?>
                                        <option value="<?= $classRows['id'] ?>"><?= $classRows['class_name'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select><br>
                                <select name="section_id" id="section_id" style="padding:0 11px">
                                    <option value="">--Select Section--</option>
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
    <script>
    $(document).ready(function(){
        $('#class_id').change(function(){
            classId = $(this).val();

            $.ajax({
                url: "get-class-section.php",
                type: 'GET',
                data: {'clsId': classId},
                success: function(result){
                    $('#section_id').html(result);
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



