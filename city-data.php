<?php 
require_once("config.php");      

$formData = $_REQUEST;
$country_id = $_REQUEST['country_id'];
$state_id = $_REQUEST['state_id'];
$city_name = $_REQUEST['city_name'];
$status = $_REQUEST['city_status'];

if($_SERVER['REQUEST_METHOD']=='POST' && isset($formData['save'])) {
    
    if($formData['country_id'] && $formData['state_id'] && $formData['city_name'] && ($formData['city_status'] or (int)$formData['city_status']===0)) {
        $insClass = "INSERT INTO `citys`(`country_id`, `state_id`,`city_name`,`city_status`) values ($country_id,$state_id,'$city_name',$status)";

        $con->query($insClass);
        $classId = $con->insert_id;
        $_SESSION['success']="City created successfully...";
        header("Location:manage-city.php");
    } else {
        $_SESSION['error']="All * fields are required.";
        $_SESSION['country_name']=$formData['country_id'];
        $_SESSION['state_name']=$formData['state_id'];
        $_SESSION['city_name']=$formData['city_name'];
        $_SESSION['status']=$formData['city_status'];
        header("Location:city-form.php");
    }
} else {
    die("Un-Authorized Access....");
}


?>