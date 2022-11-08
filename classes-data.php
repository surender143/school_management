<?php 
require_once("config.php");      

$formData = $_REQUEST;


if($_SERVER['REQUEST_METHOD']=='POST' && isset($formData['save'])) {
    
    if($formData['class_name'] && ($formData['status'] or (int)$formData['status']===0)) {
        $insClass = "INSERT INTO `classes`(`class_name`, `status`) values ('".$formData['class_name']."', ".$formData['status'].")";
        $con->query($insClass);
        $classId = $con->insert_id;

        foreach($formData['section_name'] as $key => $sectionName) {
            $sectionName = $sectionName;
            $nos = $formData['nos'][$key];
            
            $insSection = "INSERT INTO `section`(`class_name`, `section_name`, `number_of_students`) values($classId, '$sectionName', $nos)";
            $con->query($insSection);
        }
        $_SESSION['success']="Class created successfully...";
        header("Location:manage-class.php");
    } else {
        $_SESSION['error']="All * fields are required.";
        $_SESSION['class_name']=$formData['class_name'];
        $_SESSION['status']=$formData['status'];
        header("Location:classform.php");
    }
} else {
    die("Un-Authorized Access....");
}


?>