<?php

session_start();
try {
require_once 'models/database.php';
require_once 'models/logmodel.php';
require_once 'models/usersmodel.php';
$foodlogs = []; // Initialization
$totalCalories =0;
$user_goal= 0;
$error_message = "";

$message ="";

$foodlogs = select_yesterday_food($_SESSION["user_id"]);
$user_goal= get_user_goal($_SESSION["user_id"]);

} catch (Exception $e){
    $error_message = $e->getMessage();
}
include('views/totalviewy.php');
