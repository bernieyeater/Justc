<?php
// User controller
session_start();
try {
    require_once 'models/database.php';
    require_once 'models/itemmodel.php';
    
    $fooditems = []; 
    $error_message = "";
    $message = "";
    $userID = $_SESSION["user_id"];
    if (isset($_POST['searchTerm'])) {
        $searchTerm = $_POST['searchTerm'];

        $fooditems = search_fooditems2($searchTerm,$userID);
    } else {

        $fooditems = select_items($userID);
    }

} catch (Exception $e) {
    $error_message = $e->getMessage();
}

include('views/globalview.php');
