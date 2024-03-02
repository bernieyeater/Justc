<?php
//Log controller

session_start();
try {
require_once 'models/database.php';
require_once 'models/logmodel.php';

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));
$Description = htmlspecialchars(filter_input(INPUT_POST, "Description"));
$Calories = filter_input(INPUT_POST, 'Calories', FILTER_VALIDATE_INT);
$Portion = filter_input(INPUT_POST, 'Portion', FILTER_VALIDATE_FLOAT);
$user_radial_button = filter_input(INPUT_POST, "user_radial_button");
//$Type_meal = htmlspecialchars(filter_input(INPUT_POST, "Type_meal"));

if ($user_radial_button === "Breakfast") {
    $Meal = 1;
} elseif ($user_radial_button === "Lunch") {
    $Meal = 2;
} elseif ($user_radial_button === "Dinner") {
    $Meal = 3;
} else {
    // Handle unexpected value or no selection
    $Meal = 0; // or another default value or error handling
}

//$user_radial_button = filter_input(INPUT_POST, "type_meal");
//echo "Meal Type:".$Type_meal;
$currentDate = date('Y-m-d');
$id=$_SESSION["user_id"];
$Unit="Cup";
$error_message = "";

echo "ID:".$id;
$thefood = new fooditem($id, $currentDate, $Meal, $Description, $Calories, $Portion, $Unit);
$message ="";

if ($Description !== "" && $Calories !== false && $Portion !== false) {
    insert_fooditem($thefood);
    //$message = $FName." Food Item Added to Log.";
       
} else if ($action==!""){
    $error_message = "<br> Missing Description, Calories or Portion";
}


} catch (Exception $e){
    $error_message = $e->getMessage();
}
include('views/logview.php');
