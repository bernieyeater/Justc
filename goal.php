<?php
// goal.php
session_start();
require_once 'models/database.php';
require_once 'models/usersmodel.php';

$user_id = $_SESSION['user_id'];

$action = htmlspecialchars(filter_input(INPUT_POST, "action"));
$new_goal = filter_input(INPUT_POST, 'goal', FILTER_VALIDATE_INT);


if ($action=="update_or_add") {
$success = update_user_goal($user_id, $new_goal);
}

include('views/goalview.php');



