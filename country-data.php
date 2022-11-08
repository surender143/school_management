<?php 
require_once("config.php");      

$formData = $_REQUEST;
// echo "<pre>";
// print_r($formData);
// die;
if($_SERVER['REQUEST_METHOD']=='POST' && isset($formData['save'])) {
    
    if($formData['country_name'] && ($formData['country_status'] or (int)$formData['country_status']===0)) {
        $insCountry = "INSERT INTO `countrys`(`country_name`, `country_status`) values ('".$formData['country_name']."', ".$formData['country_status'].")";
        $con->query($insCountry);
        $countryId = $con->insert_id;

        foreach($formData['state_name'] as $key => $stateName) {
            $stateName = $stateName;
            $status = $formData['state_status'][$key];
            
            if($stateName && $status){
                $insState = "INSERT INTO `states`(`country_id`, `state_name`, `state_status`) values($countryId, '$stateName', $status)";
                $con->query($insState); 
            }
        }
        $_SESSION['success']="country and state Added successfully...";
        header("Location:manage-country.php");
    } else {
        $_SESSION['error']="All * fields are required.";
        $_SESSION['country_name']=$formData['country_name'];
        $_SESSION['status']=$formData['country_status'];
        header("Location:country-form.php");
    }
} else {
    die("Un-Authorized Access....");
}


?>