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
    $this->unit=$Unit;
}

public function get_Description() {
    return $this->name;
}

public function get_Calories() {
    return $this->LName;
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
    $this->name = $Description;
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
        $querry = "INSERT INTO foodlog (id, Date, Meal, Desciption, Calories, Portion, Unit) "
            ."VALUES (:id, :Date, :Meal, :Description, :Portion, :Unit) ";
    
    $statement = $database->prepare($querry);
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

function update_user($user){
    global $database;
    $querry = "UPDATE users set FName=:FName, LName=:LName, email_address =:email_address, password_hash=:password_hash where id = :id";
    $statement = $database->prepare($querry);
    $statement -> bindValue(":id",$user->get_id());
    $statement -> bindValue(":FName",$user->get_FName());
    $statement -> bindValue(":LName",$user->get_LName());
    $statement -> bindValue(":email_address",$user->get_email_address());
    $statement -> bindValue(":password_hash",$user->get_password_h());
    $statement->execute();
    $statement->closeCursor();
}

function delete_user_by_email($user){
    global $database;
    $querry = "DELETE FROM users WHERE email_address = :email_address";
    
    $statement = $database->prepare($querry);
    $statement -> bindValue(":email_address",$user->get_email_address());
    $statement->execute();
    $statement->closeCursor();
}

function select_all_users(){
    global $database;
    $querry = "SELECT id, FName, LName, email_address from users";
    $statement = $database->prepare($querry);
    $statement->execute();
    $theReturn = $statement->fetchAll();
    $statement->closeCursor();
    return $theReturn;
}

function get_user_name($user_id){
    global $database;
    $querry = "SELECT id, FName, LName, email_address from users "
              ."WHERE id = :user_id";
    $statement = $database->prepare($querry);
    $statement -> bindValue(":user_id",$user_id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user['name'];
}
function does_user_exist($email_address){
    global $database;
    $querry = "SELECT id, FName, LName, email_address from users "
              ."WHERE email_address = :email_address";
    $statement = $database->prepare($querry);
    $statement -> bindValue(":email_address",$email_address);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    if ($user!=null) {
        return true;
    }
    else {
        return false;}
}

function does_name_exist($FName){
    global $database;
    $querry = "SELECT id, FName, LName, email_address from users "
              ."WHERE name = :name";
    $statement = $database->prepare($querry);
    $statement -> bindValue(":FName",$FName);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    if ($user!=null) {
        return true;
    }
    else {
        return false;}
}

function find_user_id($email_address){
        global $database;
    $querry = "SELECT id, FName, LName, email_address from users "
              ."WHERE email_address = :email_address";
    $statement = $database->prepare($querry);
    $statement -> bindValue(":email_address",$email_address);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user['id'];
}

function find_user_id_from_name($FName){
     global $database;
    $querry = "SELECT id, FName, LName, email_address from users "
              ."WHERE name = :name";
    $statement = $database->prepare($querry);
    $statement -> bindValue(":name",$FName);
    $statement -> bindValue(":LName",$LName);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user['id'];
}

?>




