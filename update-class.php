<?php
require_once("config.php");
require_once("validate-session.php");


$formData = $_REQUEST;
$id = $formData['id']; 
$class_name = $formData['class_name'];
$status = $formData['status'];
if($_SERVER['REQUEST_METHOD']=='POST' && isset($formData['save'])){
    if($formData['id'] && $formData['class_name'] ){
        $updSql = "UPDATE `classes` SET class_name='$class_name', status=$status WHERE id=$id";
        $con->query($updSql);
        $_SESSION['success']="Record Update successfully...";
        header("Location: manage-class.php");
    }else{
        echo "record not found";
    }
}else{

}
