<?php

class fooditem {
private $id, $Date, $Meal, $Description, $Calories, $Portion, $Unit, $SubmitGlobal, $ApprovedGlobal;

public function __construct($id, $Date, $Meal, $Description, $Calories, $Portion, $Unit, $SubmitGlobal, $ApprovedGlobal) {
    $this->Description = $Description;
    $this->Calories = $Calories;
    $this->Portion = $Portion;
    $this->id = $id;
    $this->Date = $Date;
    $this->Meal=$Meal;
    $this->Unit=$Unit;
    $this->SubmitGlobal=$SubmitGlobal;
    $this->ApprovedGlobal=$ApprovedGlobal;
    
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
public function get_SubmitGlobal() {
    return $this->SubmitGlobal;
}
public function get_ApprovedGlobal() {
    return $this->ApprovedGlobal;
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
public function set_SubmitGlobal($SubmitGlobal) {
    $this->SubmitGlobal = $SubmitGlobal;
}
public function set_ApprovedGlobal($ApprovedGlobal) {
    $this->ApprovedGlobal = $ApprovedGlobal;
}
}
//user model
function insert_fooditem($fooditem){
    global $database;

    $query = "INSERT INTO fooditem (`id`, `Description`, `Calories`, `Portion`, `Unit`, `SubmitGlobal`) VALUES (:id, :Description, :Calories, :Portion, :Unit, :SubmitGlobal )";
    $statement = $database->prepare($query);
    $statement -> bindValue(":id",$fooditem->get_id());
    $statement -> bindValue(":Description",$fooditem->get_Description());
    $statement -> bindValue(":Calories",$fooditem->get_Calories());
    $statement -> bindValue(":Portion",$fooditem->get_Portion());
    $statement -> bindValue(":Unit",$fooditem->get_Unit());
    $statement -> bindValue(":SubmitGlobal",$fooditem->get_SubmitGlobal());
    $statement->execute();
    $statement->closeCursor();
}



function select_items($user_id) {
    global $database;
    try {
        // Modified query to include a WHERE clause that filters by user ID
        $query = "SELECT `Myfood_ID`, `id`, `Description`, `Calories`, `Portion`, `Unit`, `SubmitGlobal`, `ApprovedGlobal` FROM `fooditem` WHERE `id` = :user_id";
        $statement = $database->prepare($query);
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT); // Bind the user_id parameter
        $statement->execute();
        
        $theReturn = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        
        return $theReturn;
    } catch (Exception $e) {
        return []; 
    }
}

function search_fooditems($searchTerm ) {
    global $database;
    $searchTerm = "%{$searchTerm}%"; 
    try {
        $query = "SELECT `Myfood_ID`,`id`, `Description`, `Calories`, `Portion`, `Unit`, `SubmitGlobal`, `ApprovedGlobal` FROM `fooditem` WHERE `Description` LIKE :searchTerm";
        $statement = $database->prepare($query);
        $statement->bindValue(':searchTerm', $searchTerm);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $results;
    } catch (Exception $e) {
        // Handle or log the error here
        return [];
    }
}

function search_fooditems2($searchTerm, $user_id) {
    global $database;
    $searchTerm = "%{$searchTerm}%";
    try {
        $query = "SELECT `Myfood_ID`, `id`, `Description`, `Calories`, `Portion`, `Unit`, `SubmitGlobal`, `ApprovedGlobal` FROM `fooditem` WHERE `Description` LIKE :searchTerm AND `id` = :user_id";
        
        $statement = $database->prepare($query);
        $statement->bindValue(':searchTerm', $searchTerm);
        $statement->bindValue(':user_id', $user_id, PDO::PARAM_INT); // Bind the user_id parameter
        $statement->execute();
        
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        
        return $results;
    } catch (Exception $e) {
        // Handle or log the error here
        return [];
    }
}

function delete_fooditem($Myfood_ID) {
    global $database;
    try {
        // Prepare the DELETE statement to remove the item with the given Myfood_ID
        $query = "DELETE FROM `fooditem` WHERE `Myfood_ID` = :Myfood_ID";
        
        $statement = $database->prepare($query);
        $statement->bindValue(':Myfood_ID', $Myfood_ID, PDO::PARAM_INT);
        $statement->execute();
        
        $statement->closeCursor();
        
        return true; // Indicate success
    } catch (Exception $e) {
        // Optionally, log the exception details for debugging purposes
        return false; // Indicate failure
    }
}


function select_single_fooditem($myfood_id) {
        global $database; 

        try {
            $query = "SELECT `Myfood_ID`, `id`, `Description`, `Calories`, `Portion`, `Unit`, `SubmitGlobal`, `ApprovedGlobal` FROM `fooditem` WHERE `Myfood_ID` = :Myfood_ID LIMIT 1";
            $statement = $database->prepare($query);
            $statement->bindValue(':Myfood_ID', $myfood_id, PDO::PARAM_INT);
            $statement->execute();
            
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $statement->closeCursor();
            
            return $result;
        } catch (Exception $e) {
            return null; // Or handle the exception as needed
        }
    }
?>




