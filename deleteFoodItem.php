<?php
session_start();
require_once 'models/database.php'; 
require_once 'models/logmodel.php'; 

if (isset($_GET['Log_ID'])) {
    $foodLogId = $_GET['Log_ID'];
    
    delete_foodlog($foodLogId);
    
    header('Location: total.php'); 
    exit();
} else {
    echo "Error: No food log ID provided.";
}

