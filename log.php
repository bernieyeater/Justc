<?php
//Log controller

session_start();
try {
require_once 'models/database.php';
require_once 'models/usersmodel.php';

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));
$Description = htmlspecialchars(filter_input(INPUT_POST, "Description"));
$Calories = filter_input(INPUT_POST, 'Calories', FILTER_VALIDATE_INT);
$Portion = filter_input(INPUT_POST, 'Portion', FILTER_VALIDATE_FLOAT);
$Type_meal = htmlspecialchars(filter_input(INPUT_POST, "Type_meal"));
$user_radial_button = filter_input(INPUT_POST, "type_meal");
$currentDate = date('Y-m-d');
$id=$_SESSION["user_id"];
$error_message = "";
$FoodItem = new User( 1,$currentDate, $Description, $Calories, $Portion, $unit);
$message ="";

if ($action=="add" &&  $Description != "" && $Calories != "" && $Portion!="" && $password!=""){
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
include('views/logview.php');
