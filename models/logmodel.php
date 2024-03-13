<?php

class foodlog {
private $id, $Date, $Meal, $Description, $Calories, $Portion, $Unit;

public function __construct($id, $Date, $Meal, $Description, $Calories, $Portion, $Unit) {
    $this->Description = $Description;
    $this->Calories = $Calories;
    $this->Portion = $Portion;
    $this->id = $id;
    $this->Date = $Date;
    $this->Meal=$Meal;
    $this->Unit=$Unit;
}

public function get_Description() {
    return $this->Description;
}

public function get_Calories() {
    return $this->Calories;
}

public function get_Portion() {
    return $this->Portion;
}

public function get_id() {
    return $this->id;
}
public function get_Date() {
    return $this->Date;
}
public function get_Meal() {
    return $this->Meal;
}
public function get_Unit() {
    return $this->Unit;
}

public function set_Description($Description) {
    $this->Description = $Description;
}
public function set_Calories($Calories) {
    $this->Calories = $Calories;
}
public function set_Portion($Portion) {
    $this->Portion = $Portion;
}

public function set_id($id) {
    $this->id = $id;
}
public function set_Date($Date) {
    $this->Date = $Date;
}
public function set_Meal($Meal) {
    $this->Meal = $Meal;
}
public function set_Unit($Unit) {
    $this->Unit = $Unit;
}
}
//user model
function insert_foodlog($foodlog){
    global $database;

    $query = "INSERT INTO foodlog (`id`, `Date`, `Meal`, `Description`, `Calories`, `Portion`, `Unit`) VALUES (:id, :Date, :Meal, :Description, :Calories, :Portion, :Unit)";
    $statement = $database->prepare($query);
    $statement -> bindValue(":id",$foodlog->get_id());
    $statement -> bindValue(":Date",$foodlog->get_Date());
    $statement -> bindValue(":Meal",$foodlog->get_Meal());
    $statement -> bindValue(":Description",$foodlog->get_Description());
    $statement -> bindValue(":Calories",$foodlog->get_Calories());
    $statement -> bindValue(":Portion",$foodlog->get_Portion());
    $statement -> bindValue(":Unit",$foodlog->get_Unit());
    $statement->execute();
    $statement->closeCursor();
}


function select_today4_food($user_id) {
    global $database;
    try {
        $today = date('Y-m-d');
        
        $query = "SELECT `Log_ID`, `id`, `Date`, `Meal`, `Description`, `Calories`, `Portion`, `Unit` FROM `foodlog` WHERE DATE(`Date`) = :today AND `id` = :user_id ORDER BY `Meal`";
        
        $statement = $database->prepare($query);
        $statement->bindValue(':today', $today);
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();
        
        $theReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $theReturn;
    } catch (Exception $e) {
        return []; 
    }
}


function select_yesterday_food($user_id) {
    global $database;
    try {
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        
        $query = "SELECT `Log_ID`, `id`, `Date`, `Meal`, `Description`, `Calories`, `Portion`, `Unit` FROM `foodlog` WHERE DATE(`Date`) = :yesterday AND `id` = :user_id ORDER BY `Meal`";
        
        $statement = $database->prepare($query);
        $statement->bindValue(':yesterday', $yesterday);
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();
        
        $theReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $theReturn;
    } catch (Exception $e) {
        return []; 
    }
}



function delete_foodlog($log_id) {
    global $database;
    try {
        $query = "DELETE FROM `foodlog` WHERE `Log_ID` = :log_id";
        
        $statement = $database->prepare($query);
        $statement->bindValue(':log_id', $log_id, PDO::PARAM_INT);
        $statement->execute();
        
        $statement->closeCursor();
        
        return true;
    } catch (Exception $e) {

        return false;
    }
}


function meal_desc($meal_number) {
    if ($meal_number === 1) { return "Breakfast"; }
    if ($meal_number === 2) { return "Lunch"; }
    if ($meal_number === 3) { return "Dinner"; }
    return "Unknown"; 
}
?>




