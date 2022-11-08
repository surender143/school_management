<?php
include_once("config.php");
if(!isset($_SESSION['isLoggedIn'])== true){
header("location:dashboard.php");
}

$formData = $_POST;

if($_SERVER['REQUEST_METHOD']=='POST' && isset($formData['login'])) {
    $username = $formData['username'];
    $password = md5($formData['password']);
    $selUser = "SELECT id,name FROM `users` where username='$username' and password='$password'";
    $userResult = $con->query($selUser);
    if($userResult->num_rows > 0) {
        $userData = $userResult->fetch_assoc();
        $_SESSION['isLoggedIn']= true;
        $_SESSION['name'] = $userData['name'];
        header("Location: dashboard.php");
    } else {
        $_SESSION['error'] = "Login credentials are invalid. Please try again!";
        header("Location: loginform.php");
    }
} else {
    $_SESSION['error'] = "Un-Authorised Access...";
    header("Location: loginform.php");
}