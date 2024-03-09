<?php

class fooditem {
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
function insert_fooditem($fooditem){
    global $database;

    $query = "INSERT INTO foodlog (`id`, `Date`, `Meal`, `Description`, `Calories`, `Portion`, `Unit`) VALUES (:id, :Date, :Meal, :Description, :Calories, :Portion, :Unit)";
    $statement = $database->prepare($query);
    $statement -> bindValue(":id",$fooditem->get_id());
    $statement -> bindValue(":Date",$fooditem->get_Date());
    $statement -> bindValue(":Meal",$fooditem->get_Meal());
    $statement -> bindValue(":Description",$fooditem->get_Description());
    $statement -> bindValue(":Calories",$fooditem->get_Calories());
    $statement -> bindValue(":Portion",$fooditem->get_Portion());
    $statement -> bindValue(":Unit",$fooditem->get_Unit());
    $statement->execute();
    $statement->closeCursor();
}
function select_today_food() {
    global $database;
    try {
        $query = "SELECT `id`, `Date`, `Meal`, `Description`, `Calories`, `Portion`, `Unit` FROM `foodlog`";
        $statement = $database->prepare($query);
        $statement->execute();
        $theReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $theReturn;
    } catch (Exception $e) {
        // Handle or log the error here
        return []; // Return an empty array to ensure $fooditems is always an array
    }
}

function select_today2_food() {
    global $database;
    try {
        // Get today's date in the same format as your Date column
        $today = date('Y-m-d');
        
        // Modify the query to select records where the date is today
        $query = "SELECT `id`, `Date`, `Meal`, `Description`, `Calories`, `Portion`, `Unit` FROM `foodlog` WHERE DATE(`Date`) = :today";
        
        $statement = $database->prepare($query);
        // Bind the $today variable to the :today parameter in the SQL query
        $statement->bindValue(':today', $today);
        $statement->execute();
        
        $theReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $theReturn;
    } catch (Exception $e) {
        // Handle or log the error here
        return []; // Return an empty array to ensure $fooditems is always an array
    }
}

function select_today3_food($user_id) {
    global $database;
    try {
        $today = date('Y-m-d');
        
        $query = "SELECT `id`, `Date`, `Meal`, `Description`, `Calories`, `Portion`, `Unit` FROM `foodlog` WHERE DATE(`Date`) = :today AND `id` = :user_id";
        
        $statement = $database->prepare($query);
        $statement->bindValue(':today', $today);
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT); // Bind the user ID parameter
        $statement->execute();
        
        $theReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $theReturn;
    } catch (Exception $e) {
        // Handle or log the error here
        return []; // Return an empty array to ensure $fooditems is always an array
    }
}

function meal_desc($meal_number) {
    if ($meal_number === 1) { return "Breakfast"; }
    if ($meal_number === 2) { return "Lunch"; }
    if ($meal_number === 3) { return "Dinner"; }
    return "Unknown"; // Default case
}
?>




