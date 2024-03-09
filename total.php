<?php
//User controller
session_start();
try {
require_once 'models/database.php';
require_once 'models/logmodel.php';
$fooditems = []; // Initialization
$totalCalories =0;
$error_message = "";

$message ="";


//Get all users to display at top of screen
$fooditems = select_today3_food($_SESSION["user_id"]);

} catch (Exception $e){
    $error_message = $e->getMessage();
}
include('views/totalview.php');
