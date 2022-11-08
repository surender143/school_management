<?php
require_once("config.php");
require_once("validate-session.php");

$classId = $_REQUEST['clsId'];
$selectQuery = "SELECT * FROM `section` where class_name=$classId";
$secData = $con->query($selectQuery);

echo '<option value="">--Select Section--</option>';
while($_row = $secData->fetch_assoc()) {
    echo '<option value="'.$_row['id'].'">'.$_row['section_name'].'</option>';
}