<?php
session_start();
require_once 'models/database.php'; 
require_once 'models/itemmodel.php'; 

if (isset($_GET['Log_ID'])) {
    $foodLogId = $_GET['Log_ID'];
    //echo "Food ID: " . htmlspecialchars($foodLogId); 

    delete_fooditem($foodLogId);
    
    
    header('Location: global.php'); 
    exit();
} else {
    echo "Error: No food log ID provided.";
}

