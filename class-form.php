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
                <h4>Add class</h4>
            </div>
            <div class="board">
                <h4>Add class</h4>
            </div>
        </div>
        <div class="data">
                        <?php 
                            require_once("message.php");
                        ?>
                <form action="classes-data.php" method="post" id="classdata">
                    <table border="1" style="border-collapse:collapse;margin-top: 20px;width: 250px;" cellpadding="2">
                        <tr>
                            <td>class_name*</td>
                            <td>
                                <input type="text" name="class_name" value="<?php echo (isset($_SESSION['class_name']))?$_SESSION['class_name']:'';?>">
                            </td>
                        </tr>
                        <tr>
                            <td>status*</td>
                            <td>
                            <?php
                                $selOption = (isset($_SESSION['status']))?$_SESSION['status']:'';
                            ?>
                                <select name="status" id="" style="padding:0 36px" >
                                    <!-- <option value="">None</option> -->
                                    <option value="1" <?php echo ($selOption==='1')?'selected':'';?>>Enable</option>
                                    <option value="0" <?php echo ($selOption==='0')?'selected':'';?>>Disable</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Add Class Section`s</td>
                            <td>
                                <table id="section_table" style="border-collapse:collapse;" class="sec">
                                    <tr>
                                        <th>Section Name</th>
                                        <th>No of Student</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="section_name[]">
                                        </td>
                                        <td>
                                            <input type="text" name="nos[]">
                                        </td>
                                        <td>
                                            <input type="button" id="add_section" value="Add"/>
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
        $('#add_section').click(function(){
            var tRow = '<tr><td><input type="text" name="section_name[]"></td><td> <input type="text" name="nos[]"> </td><td> <input type="button" class="remove_section" value="Remove"/> </td> </tr>';
            $('#section_table').append(tRow);
        });

        $('body').delegate(".remove_section", "click", function(){
            $(this).closest('tr').remove();
        });

    });
    </script>
</body>
</html>
