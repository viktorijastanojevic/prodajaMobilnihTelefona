<?php

class User{
    private $id;
    private $firstname;
    private $lastName;
    private $email;
    private $password;



    public function __construct($id=null, $firstname=null, $lastName=null, $email=null, $password=null){
        $this->id=$id;
        $this->firstname=$firstname;
        $this->lastName=$lastName;
        $this->email=$email;
        $this->password=$password;

    }
   

    public static function login($user,$conn){
        $query = "select * from user where email='$user->email' and password='$user->password'";

        return $conn->query($query);

    }





}



?>