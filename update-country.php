<?php
require_once("config.php");
require_once("validate-session.php");


$formData = $_REQUEST;
// echo"<pre>";
// print_r($formData);
// die;    
$country_id = $formData['country_id']; 
$country_name = $formData['country_name']; 
$status = $formData['country_status'];
if($_SERVER['REQUEST_METHOD']=='POST' && isset($formData['save'])){
    if($formData['country_id'] && $formData['country_name']){
        
        //country update query is running here//
        $updSql = "UPDATE `countrys` SET country_name='$country_name', country_status=$status WHERE id=$country_id";
        $con->query($updSql);

        //delete query is running here//
        $stateids = array_filter($formData['state_id']);
        $stateids = implode(",",$stateids);
        $deletestate = "DELETE FROM `states` WHERE id NOT IN ($stateids) and country_id=$country_id";
        $con->query($deletestate);

        //state update and insert query is running here in foreach loop//
        foreach($formData['state_name'] as $key => $state_name){
            $state_name = $state_name;
            $state_status = $formData['state_status'][$key];
            $state_id = $formData['state_id'][$key];
            if($state_name && $state_status && $state_id){
                if($state_id){
                $update = "UPDATE `states` SET state_name='$state_name',state_status=$state_status WHERE id=$state_id";
                $con->query($update);
                }else{
                    $insState = "INSERT INTO `states`( country_id,state_name,state_status) values($country_id,'$state_name',$state_status)";
                    $con->query($insState);
                }
            }
        }

        $_SESSION['success']="Record Update successfully...";
        header("Location: manage-country.php");
    }else{
        echo "record not found";
    }
}else{

}
