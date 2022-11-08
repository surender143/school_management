<?php
include_once("config.php");
    $formData = $_REQUEST;
    // echo "<pre>";
    // print_r($formData);
    // die;
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($formData['save'])) {
        
        if($formData['state_name'] && $formData['country']) {
            $insstate = "INSERT INTO `states`(`state_name`, `country_id`, `state_status`) values ('".$formData['state_name']."', ".$formData['country'].", ".$formData['state_status'].")";
            $con->query($insstate);
            $stateId = $con->insert_id;
            $countryId = $formData['country'];
            foreach($formData['city_name'] as $key => $cityName) {
                $cityName = $cityName;
                $status = $formData['city_status'][$key];
                
               if($cityName && $status){
                $inscity = "INSERT INTO `citys`(`country_id`,`state_id`,`city_name`,`city_status`) values($countryId,$stateId,'$cityName' ,$status)";
                $con->query($inscity);
               }
            }
            $_SESSION['success']="state and city added successfully...";
            header("Location: manage-state.php");
        } else {
            $_SESSION['validation_error']="All * fields are required.";
            $_SESSION['state_name']=$formData['state_name'];
            $_SESSION['country']=$formData['country'];
            $_SESSION['state_status']=$formData['state_status'];
            header("Location:state-form.php");
        }
    } else {
        die("Un-Authorized Access....");
    }















