<?php
//Log controller

session_start();
try {
require_once 'models/database.php';
require_once 'models/logmodel.php';
require_once 'models/itemmodel.php';

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));
$Description = htmlspecialchars(filter_input(INPUT_POST, "Description"));
$Unit = htmlspecialchars(filter_input(INPUT_POST, "Units"));
$Calories = filter_input(INPUT_POST, 'Calories', FILTER_VALIDATE_INT);
$SubmitGlobal = filter_input(INPUT_POST, 'SubmitGlobal', FILTER_VALIDATE_INT);
$Portion = filter_input(INPUT_POST, 'Portion', FILTER_VALIDATE_FLOAT);
$user_radial_button = filter_input(INPUT_POST, "user_radial_button");


if ($user_radial_button === "Breakfast") {
    $Meal = 1;
} elseif ($user_radial_button === "Lunch") {
    $Meal = 2;
} elseif ($user_radial_button === "Dinner") {
    $Meal = 3;
} else {

    $Meal = 0; 
}

$currentDate = date('Y-m-d');
$id=$_SESSION["user_id"];
$error_message = "";

$thefood = new foodlog($id, $currentDate, $Meal, $Description, $Calories, $Portion, $Unit);
$message ="";

if ($Description !== "" && $Calories !== false && $Portion !== false) {
    insert_foodlog($thefood);
    //$message = $FName." Food Item Added to Log.";
       
} else if ($action==!""){
    $error_message = "<br> Missing Description, Calories or Portion";
}

if ($SubmitGlobal === 1){echo "Submit to Global!";
$theItem = new fooditem($id, $currentDate, $Meal, $Description, $Calories, $Portion, $Unit, 1, 0);
insert_fooditem($theItem);
}

} catch (Exception $e){
    $error_message = $e->getMessage();
}
include('views/logview.php');
