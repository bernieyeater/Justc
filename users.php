<?php
//User controller
session_start();
try {
require_once 'models/database.php';
require_once 'models/usersmodel.php';

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));
$FName = htmlspecialchars(filter_input(INPUT_POST, "FName"));
$LName = htmlspecialchars(filter_input(INPUT_POST, "LName"));
$password = filter_input(INPUT_POST, "password");
$password_h = password_hash($password, PASSWORD_DEFAULT);
$email_address = htmlspecialchars(filter_input(INPUT_POST, "email_address"));
$cash_balance = filter_input(INPUT_POST, "cash_balance", FILTER_VALIDATE_FLOAT);
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$user_radial_button = filter_input(INPUT_POST, "user_radial_button");
$error_message = "";
$user = new User($FName, $LName, $email_address, $id, $password_h);
$message ="";

if ($action=="update_or_add" && $user_radial_button=="add" && $FName != "" && $email_address!="" && $password!=""){
    if (does_user_exist($email_address)) {
        $error_message ="<br> User already exists, try another email address";
    }else {
    insert_user($user);
    }
    
} else if ($action=="update_or_add" && $user_radial_button=="update" && $FName != "" && $LName != "" && $email_address !="" && $password_h!="" && $id!="" ){
    if (does_user_exist($email_address)) {
        update_user($user);
    }else {
    $error_message ="<br> User does not exist";
    }
    
} else if ($action=="delete" && $email_address!="" ){
    if (does_user_exist($email_address)) {
    $user_id_temp2 = find_user_id($email_address);
    //delete_tweets_by_user($user_id_temp2);
    delete_user_by_email($user);
    }else {
    $error_message ="<br> User does not exist";
    }
    
} else if ($action==!""){
    $error_message = "<br> Missing name, email or current balance";
}
//Get all users to display at top of screen
$users = select_all_users();

} catch (Exception $e){
    $error_message = $e->getMessage();
}
include('views/usersview.php');
