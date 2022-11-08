<?php
include_once("config.php");
    $formData = $_REQUEST;
    echo "<pre>";
    print_r($formData);
    die;
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($formData['save'])) {
        
        if($formData['student_name'] && $formData['mobile'] && $formData['email'] && $formData['class'] ) {
            $insstudent = "INSERT INTO `students`(`student_name`, `mobile`, `email` , `class`) values ('".$formData['student_name']."', ".$formData['mobile'].", '".$formData['email']."' , '".$formData['class']."')";
            $con->query($insstudent);
            $student_id = $con->insert_id;
            // foreach(){

            // }
            $_SESSION['success']="student added successfully...";
            header("Location: manage-student.php");
        } else {
            $_SESSION['validation_error']="All * fields are required.";
            $_SESSION['student_name']=$formData['student_name'];
            $_SESSION['mobile']=$formData['mobile'];
            $_SESSION['email']=$formData['email'];
            $_SESSION['class']=$formData['class'];
            header("Location:studentsform.php");
        }
    } else {
        die("Un-Authorized Access....");
    }















