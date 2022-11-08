<?php
include_once("config.php");
    $formData = $_REQUEST;
   $section_name = $_REQUEST['section_name'];
   $class_name = $_REQUEST['class'];
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($formData['save'])) {
        if($formData['section_name'] && $formData['class'] ) {
            $insstudent = "INSERT INTO `section`(`section_name`, class_name) values ('$section_name','$class_name')";
    
            $con->query($insstudent);
            $_SESSION['success']="section added successfully...";
            header("Location: manage-section.php");
        } else {
            $_SESSION['validation_error']="All * fields are required.";
            header("Location:sectionform.php");
        }
    } else {
        die("Un-Authorized Access....");
    }















