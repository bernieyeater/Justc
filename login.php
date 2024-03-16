<?php

session_start();
try {
 if (!isset($_SESSION['is_logged_in'])){
    $is_logged_in = false;
}

require_once 'models/database.php';
require_once 'models/loginmodel.php';

$email_address = htmlspecialchars(filter_input(INPUT_POST,"email_address"));
$password = htmlspecialchars(filter_input(INPUT_POST,"password"));
$message ="";
$error_message="";
$action = htmlspecialchars(filter_input(INPUT_GET,"action"));

if ($action == "logout"){
    $_SESSION = array();
    session_destroy();
    $message = "<br>Logout successful";
}

if ($email_address !="" && $password !=""){
    if ( login($email_address, $password)){
           $_SESSION['is_logged_in']= true; 
           $_SESSION['user_id']= get_User_id($email_address);
           $is_logged_in = true;
           $message = "<br>Log in successful";
    }else{
        $is_logged_in = false;
        $message = "<br>invalid username or password ";
    } 
}

} catch (Exception $ex) {
    $error_message = $e->getMessage(); 
}
include('views/loginview.php');

