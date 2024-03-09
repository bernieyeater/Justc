<?php
//join controller
//Source code acknowlegement
//Code source from Eric Charnesky, video Secure Websites Chapter 21 lecture
session_start();
try {
require_once 'models/database.php';
require_once 'models/usersmodel.php';

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));
$FName = htmlspecialchars(filter_input(INPUT_POST, "FName"));
$LName = htmlspecialchars(filter_input(INPUT_POST, "LName"));
$password = htmlspecialchars(filter_input(INPUT_POST, "password"));
$password_h = password_hash($password, PASSWORD_DEFAULT);
$email_address = htmlspecialchars(filter_input(INPUT_POST, "email_address"));
$user_radial_button = filter_input(INPUT_POST, "user_radial_button");
$error_message = "";
$user = new User($FName, $LName, $email_address, 0, $password_h,0);
$message ="";

if ($action=="add" &&  $FName != "" && $LName != "" && $email_address!="" && $password!=""){
    if (does_user_exist($email_address)) {
        $error_message ="<br> User already exists, try another email address";
    }else {
    insert_user($user);
    $user_id_temp = find_user_id($email_address);
    //make sure user can follow their own tweets.
    //user_follow($user_id_temp, $user_id_temp);
    $message = $FName." is joined! Proceed to login screen.";
    }
   
} else if ($action==!""){
    $error_message = "<br> Missing name, email or current balance";
}
//Get all users to display at top of screen
$users = select_all_users();

} catch (Exception $e){
    $error_message = $e->getMessage();
}
include('views/joinview.php');
