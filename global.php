<?php
// User controller
session_start();
try {
    require_once 'models/database.php';
    require_once 'models/itemmodel.php';
    
    $fooditems = []; 
    $error_message = "";
    $message = "";

    if (isset($_POST['searchTerm'])) {
        $searchTerm = $_POST['searchTerm'];

        $fooditems = search_fooditems($searchTerm);
    } else {

        $fooditems = select_items();
    }

} catch (Exception $e) {
    $error_message = $e->getMessage();
}

include('views/globalview.php');
