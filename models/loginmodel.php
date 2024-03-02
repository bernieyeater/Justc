<?php
//Source code acknowlegement
//Code source from Eric Charnesky, video Secure Websites Chapter 21 lecture
function login($email_address,$password){
    global $database;
    $querry = "SELECT id, FName, email_address, password_hash from users"
            ." where email_address = :email_address";
    $statement = $database->prepare($querry);
    $statement -> bindValue(":email_address",$email_address);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    if ($user == null){
        return false;
    }
    $password_hash = $user['password_hash'];
    return password_verify($password, $password_hash);

}
function get_user_id($email_address){
    global $database;
    $querry = "SELECT id from users"
            ." where email_address = :email_address";
    $statement = $database->prepare($querry);
    $statement -> bindValue(":email_address",$email_address);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    $the_name = $user['id'];
    return $the_name;

}
