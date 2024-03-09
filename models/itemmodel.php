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

?>




