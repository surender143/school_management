<?php
require_once("config.php");
require_once("validate-session.php");

$countryId = $_REQUEST['countryId'];
$selectQuery = "SELECT * FROM `states` where country_id=$countryId";
$countryData = $con->query($selectQuery);

echo '<option value="">--Select State--</option>';
while($_row = $countryData->fetch_assoc()) {
    echo '<option value="'.$_row['id'].'">'.$_row['state_name'].'</option>';
}