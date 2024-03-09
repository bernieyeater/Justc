<?php

class User {
private $FName, $LName, $email_address, $id, $password_h, $goal;

public function __construct($FName, $LName, $email_address, $id, $password_h, $goal) {
    $this->name = $FName;
    $this->LName = $LName;
    $this->email_address = $email_address;
    $this->id = $id;
    $this->password_h=$password_h;
    $this->goal = $goal; 
}

public function get_FName() {
    return $this->name;
}

public function get_LName() {
    return $this->LName;
}

public function get_email_address() {
    return $this->email_address;
}

public function get_id() {
    return $this->id;
}
public function get_password_h() {
    return $this->password_h;
}

public function get_goal() {
    return $this->goal;
}

public function set_FName($FName) {
    $this->name = $FName;
}
public function set_LName($LName) {
    $this->LName = $LName;
}
public function set_email_address($email_address) {
    $this->email_address = $email_address;
}

public function set_id($id) {
    $this->id = $id;
}
public function set_password_h($password_h) {
    $this->password_h = $password_h;
}
public function set_goal($goal) {
    $this->goal = $goal;
}
}
//user model
function insert_user($user){
    global $database;
        $querry = "INSERT INTO users (FName, LName, email_address, password_hash, goal) "
            ."VALUES (:FName, :LName, :email_address, :password_hash, :goal ) ";
    
    $statement = $database->prepare($querry);
    $statement -> bindValue(":FName",$user->get_FName());
    $statement -> bindValue(":LName",$user->get_LName());
    $statement -> bindValue(":email_address",$user->get_email_address());
    $statement -> bindValue(":password_hash",$user->get_password_h());
    $statement -> bindValue(":goal",$user->get_goal());
    $statement->execute();
    $statement->closeCursor();
}

function update_user($user){
    global $database;
    $querry = "UPDATE users set FName=:FName, LName=:LName, email_address =:email_address, password_hash=:password_hash, goal=:goal where id = :id";
    $statement = $database->prepare($querry);
    $statement -> bindValue(":id",$user->get_id());
    $statement -> bindValue(":FName",$user->get_FName());
    $statement -> bindValue(":LName",$user->get_LName());
    $statement -> bindValue(":email_address",$user->get_email_address());
    $statement -> bindValue(":password_hash",$user->get_password_h());
    $statement -> bindValue(":goal",$user->get_goal());
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
    $querry = "SELECT id, FName, LName, email_address, goal from users";
    $statement = $database->prepare($querry);
    $statement->execute();
    $theReturn = $statement->fetchAll();
    $statement->closeCursor();
    return $theReturn;
}

function get_user_name($user_id){
    global $database;
    $querry = "SELECT id, FName, LName, email_address, goal from users "
              ."WHERE id = :user_id";
    $statement = $database->prepare($querry);
    $statement -> bindValue(":user_id",$user_id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user['name'];
}

function get_user_goal($user_id){
    global $database;
    $querry = "SELECT id, FName, LName, email_address, goal from users "
              ."WHERE id = :user_id";
    $statement = $database->prepare($querry);
    $statement -> bindValue(":user_id",$user_id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user['goal'];
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




