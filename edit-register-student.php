<?php
include_once("config.php");
require_once("validate-session.php");

$class_id = $_REQUEST['id'];
if($class_id) {
    $selSql = "SELECT * FROM `student-registration` WHERE id=$class_id";
    $class = $con->query($selSql);
    if($class->num_rows) {
        $classRecord = $class->fetch_assoc();
    } else {
        $_SESSION['error']= "Record not found...";
        header("Location: registrated-student-list.php");
    }
} else {
    header("Location: registrated-student-list.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php   require_once("head.php"); ?>
    <link rel="stylesheet" href="css/student-registration.css">
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
                <h4>student-registration-form</h4>
            </div>
            <div class="board">
                <h4>student-registration-form</h4>
            </div>
        </div>
        <div class="data">
        <div class="form">
        <div class="reg">
            <h3>Student Registration Form For NDLM Training</h3>
        </div>
    </div>
    <form action="update-register-student.php" method="post">
    <input type="hidden" name="id" value="<?php echo $classRecord['id'];?>">
        <div class="basic">
            <?php  require_once("message.php"); ?>
            <div class="head"><h4>Basic Details:-</h4></div>
            <div class="flex">
                <table class="first">
                    <tr>
                        <th><label for="district">District*:</label></th>
                        <td><input type="text" name="district" id="district" value="<?= $classRecord['district']?>"></td>
                    </tr>
                    <tr>
                        <th><label for="tehsil">Tehsil*:</label></th>
                        <td><input type="text" name="tehsil" id="tehsil" value="<?= $classRecord['tehsil']?>"></td>
                    </tr>
                    <tr>
                        <th><label for="block">Block*:</label></th>
                        <td><input type="text" name="block" id="block" value="<?= $classRecord['block']?>"></td>
                    </tr>
                    <tr>
                        <th><label for="village">Village/Ward*:</label></th>
                        <td><input type="text" name="village" id="village" value="<?= $classRecord['village_ward']?>"></td>
                    </tr>
                    <tr>
                        <th><label for="Panchayat">Panchayat/municipal*:</label></th>
                        <td><input type="text" name="panchayat" id="Panchayat" value="<?= $classRecord['panchayat_municipal']?>"></td>
                    </tr>
                </table>
                <table class="second">
                    <tr>
                        <td>
                            <input type="image" alt="Recent Passport Size Photo">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="basic">
          <div class="head">  <h4>Student Details:-</h4></div>
            <table class="first full">
                <tr>
                    <th><label for="Candidate">Candidate Name*:</label></th>
                    <td><input type="text" name="candidate" id="Candidate" value="<?= $classRecord['candidate_name']?>"></td>
                </tr>
                <tr>
                    <th><label for="Mothers">Mothers Name*:</label></th>
                    <td><input type="text" name="mothers" id="Mothers" value="<?= $classRecord['mothers_name']?>"></td>
                </tr>
                <tr>
                    <th><label for="Father">Father Name*:</label></th>
                    <td><input type="text" name="fathers" id="Father" value="<?= $classRecord['fathers_name']?>"></td>
                </tr>
                <tr>
                    <th><label for="Occupation">Occupation*:</label></th>
                    <td class="half"><input type="text" name="occupation" id="Occupation" value="<?= $classRecord['occupation']?>"></td>

                    <th class="right"><label for="Religion">Religion*:</label></th>
                    <td class="half"><input type="text" name="religion" id="Religion" value="<?= $classRecord['religion']?>"></td>
                </tr>
                <tr>
                    <th><label for="Pincode">Pincode*:</label></th>
                    <td class="half"><input type="text" name="pincode" id="Pincode" value="<?= $classRecord['pincode']?>"></td>

                    <th class="right"><label for="Mobile">Mobile*:</label></th>
                    <td class="half"><input type="text" name="mobile" id="Mobile" value="<?= $classRecord['mobile']?>"></td>
                </tr>
                <tr>
                    <th><label for="Aadhaar">12 Digit Aadhaar No*:</label></th>
                    <td><input type="text" name="aadhaar" id="Aadhaar" value="<?= $classRecord['aadhaar_no']?>"></td>
                </tr>
                <tr>
                    <th><label for="Attach">Attach ID Type*:</label></th>
                    <td class="half"><input type="text" name="attach" id="Attach" value="<?= $classRecord['id_type']?>"></td>

                    <th class="right"><label for="Birth">Date of Birth*:</label></th>
                    <td class="half"><input type="text" name="birth" id="Birth" value="<?= $classRecord['dob']?>"></td>
                </tr>
                <tr>
                    <th><label for="Community">Community*:SC/ST/BPL</label></th>
                    <td class="half half2"><input type="text" name="community" id="Community" class="com" value="<?= $classRecord['community']?>"></td>

                    <th class="right"><label for="General">General/OBC</label></th>
                    <td class="half half2"><input type="text" name="general" id="General" value="<?= $classRecord['general']?>"></td>

                    <th class="right"><label for="ASHA">ASHA/AWW/FPS</label></th>
                    <td class="half half2"><input type="text" name="asha" id="ASHA" value="<?= $classRecord['asha']?>"></td>
                </tr>
                <tr>
                    <th><label for="Differently">Differently Abled*:Yes/No</label></th>
                    <td class="half small"><input type="text" name="differently" id="Differently" value="<?= $classRecord['abled']?>"></td>

                    <th class="right width"><label for="Candidate">Candidate Type*:BPL/NonBPL</label></th>
                    <td class="half small"><input type="text" name="candidate_type" id="Candidate" value="<?= $classRecord['candidate_type']?>"></td>
                </tr>
                <tr>
                    <th class="last"><label for="Institute">Name of Institute Where Studying:-</label></th>
                    <td class="less"><input type="text" name="institute" id="Institute" value="<?= $classRecord['name_of_institute_where_studying']?>"></td>
                </tr>
            </table>
        </div>
        <div class="family">
        <table border="1" style="border-collapse:collapse;">
                <tr>
                    <th width="25%" align="left" style="padding: 10px;">Name</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>Relation</th>
                    <th width="20%">Aadhaar</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td cellpadding="50px"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="sp">
                        <a href="#" class="del">Delete</a>
                        <a href="#">Add More</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="note">
            <table>
               <tr align="left">
                    <th style="text-align:left;"><label for="Upload">Upload photo:</label></th>
                    <td><input type="file" name="Upload" id="Upload"></td>
                </tr>
                <tr>
                    <th style="text-align:left;"><label for="Aadhaar">Upload Signature:</label></th>
                    <td><input type="file" name="Aadhaar" id="Aadhaar"></td>
                </tr>
                <tr>
                    <td>Note*</td>
                </tr>
                <tr>
                    <td>I have no objection for Aadhaar authentication and obtaining NDLM Training through Comtech institute of Technology.</td>
                </tr>
            </table>
        </div>
        <div class="button">
           <button type="submit" name="submit" value="submit">save</button>
        </div>
    </form>
        </div>
    </div>
    
</body>
</html>