<?php

include_once 'database.php';

class user extends database{
    private $table_name = 'users';
    public $id;
    public $name;
    public $email;
    public $password;

    public function register() {

      try{ 
        $stmt =  $this->conn->prepare("INSERT INTO users (name,email,password)
        VALUES (:name,:email,:password)");

       $this->password = password_hash($this->password,PASSWORD_DEFAULT);
       $stmt->bindParam(':name',$this->name);
       $stmt->bindParam(':email',$this->email);
       $stmt->bindParam(':password',$this->password);  

       if($stmt->execute()) {
         
           return "true";
       } else {
        
        return "false";
       }

    } catch(\Exception $e){

}

}

public function login() {

    try{ 
      $stmt =  $this->conn->prepare("SELECT * FROM users WHERE email = :email");
      $stmt->bindParam(':email',$this->email);
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);


     if( password_verify($this->password,$row['password']) ) {
         return "true";
     } else {
      return "false";
     }

  } catch(\Exception $e){

}

}

}