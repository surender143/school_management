<?php
require_once("config.php");

$student_registration = $_REQUEST;

$district = $student_registration['district'];
$tehsil = $student_registration['tehsil']; 
$block = $student_registration['block']; 
$village = $student_registration['village']; 
$panchayat = $student_registration['panchayat']; 
$candidate = $student_registration['candidate'];
$mothers = $student_registration['mothers']; 
$fathers = $student_registration['fathers']; 
$occupation = $student_registration['occupation']; 
$religion = $student_registration['religion']; 
$pincode = $student_registration['pincode']; 
$mobile = $student_registration['mobile']; 
$aadhaar = $student_registration['aadhaar']; 
$attach = $student_registration['attach']; 
$birth = $student_registration['birth'];  
$community = $student_registration['community']; 
$general = $student_registration['general']; 
$asha = $student_registration['asha']; 
$differently = $student_registration['differently'];
$candidate_type = $student_registration['candidate_type']; 
$institute = $student_registration['institute'];

if($_SERVER['REQUEST_METHOD']=='POST' && isset($student_registration['submit'])){
    if($student_registration['district'] && $student_registration['tehsil'] && $student_registration['block'] && $student_registration['village'] && $student_registration['panchayat'] && $student_registration['candidate'] && $student_registration['mothers'] && $student_registration['fathers'] && $student_registration['occupation'] && $student_registration['religion'] && $student_registration['pincode'] && $student_registration['mobile'] && $student_registration['aadhaar'] && $student_registration['attach'] && $student_registration['birth'] && $student_registration['community'] && $student_registration['general'] && $student_registration['asha'] && $student_registration['differently'] && $student_registration['candidate_type'] && $student_registration['institute']){
    $student_registration_data =" INSERT INTO `student-registration`(`district`,`tehsil`,`block`,`village_ward`,`panchayat_municipal`,`candidate_name`,`mothers_name`,`fathers_name`,`occupation`,`religion`,`pincode`,`mobile`,`aadhaar_no`,`id_type`,`dob`,`community`,`general`,`asha`,`abled`,`candidate_type`,`name_of_institute_where_studying`) values('$district','$tehsil','$block','$village','$panchayat','$candidate','$mothers','$fathers','$occupation','$religion','$pincode','$mobile','$aadhaar','$attach','$birth','$community','$general','$asha','$differently','$candidate_type','$institute')";
    $con->query($student_registration_data);
    $_SESSION['success']="student registered successfull";
      header("Location:registrated-student-list.php");
    }else{
        $_SESSION['error']="All * fields are required.";
        header("Location:student-registration-form.php");
    }
}else{
    die("Un-Authorized Access....");
}





?>