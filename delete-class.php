<?php
require_once("config.php");
require_once("validate-session.php");

$class_id = $_REQUEST['id'];
if($class_id) {
    $delSql = "DELETE FROM `classes` where id=$class_id";
    $con->query($delSql);
    $_SESSION['success']="Record deleted successfully...";
    header("Location: manage-class.php");
} else {
    header("Location: manage-class.php");
}