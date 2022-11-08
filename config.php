<?php
session_start();

$host       = "127.0.0.1";
$username   = "root";
$password   = "";
$dbname     = "school_management";

$con    = mysqli_connect($host,$username,$password,$dbname);

if(!$con){
    echo "enable to connect".mysqli_connect_error();
    die;
}
//echo "connection success..";




?>  