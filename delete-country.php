<?php
require_once("config.php");
require_once("validate-session.php");

$country_id = $_REQUEST['id'];
if($country_id) {
    $delSql = "DELETE FROM `countrys` where id=$country_id";
    $con->query($delSql);
    $_SESSION['success']="Record deleted successfully...";
    header("Location: manage-country.php");
} else {
    header("Location: manage-country.php");
}