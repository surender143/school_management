<?php
require_once("config.php");
require_once("validate-session.php");


$formData = $_REQUEST;
// echo"<pre>";
// print_r($formData);
// die;    
$state_id = $formData['id']; 
$state_name = $formData['state_name'];
$state_status = $formData['state_status'];
$country_id = $formData['country_id'];
if($_SERVER['REQUEST_METHOD']=='POST' && isset($formData['save'])){
    if($formData['id'] && $formData['state_name']){
        
        //state update query is running here//
        $updSql = "UPDATE `states` SET state_name='$state_name', country_id='$country_id',state_status=$state_status WHERE id=$state_id";
        $con->query($updSql);
        
        // country update query is running here//
    
        //delete query is running here//
        if(isset($formData['city_id'])){
        $cityids = array_filter($formData['city_id']);
        $cityids = implode(",",$cityids);
        $deletecity = "DELETE FROM `citys` WHERE id NOT IN ($cityids) and country_id=$country_id";
        $con->query($deletecity);
        }else{
            $deletecity = "DELETE FROM `citys` WHERE  state_id=$state_id ";
            $con->query($deletecity);
        }
       // city update and insert query is running here in foreach loop//
        foreach($formData['city_name'] as $key => $city_name){
            $city_name = $city_name;
            $city_status = $formData['city_status'][$key];
            $city_id = $formData['city_id'][$key];
            if($city_name && $city_status){
                if($city_id){
                $update = "UPDATE `citys` SET city_name='$city_name',city_status=$city_status WHERE id=$city_id";
                $con->query($update);
                }else{
                   $inscity = "INSERT INTO `citys`( country_id,state_id,city_name,city_status) values($country_id,$state_id,'$city_name',$city_status)";
                    $con->query($inscity);
                }
            }
        }

        $_SESSION['success']="Record Update successfully...";
        header("Location: manage-state.php");
    }else{
        echo "record not found";
    }
}else{

}
