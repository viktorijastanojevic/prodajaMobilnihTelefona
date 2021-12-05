<?php

class User{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;



    public function __construct($id=null, $firstname=null, $lastname=null, $email=null, $password=null){
        $this->id=$id;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->email=$email;
        $this->password=$password;

    }
   

    public static function login($user,$conn){
        $query = "select * from user where email='$user->email' and password='$user->password'";

        return $conn->query($query);

    }

    public static function register($user,$conn){
        $query = "insert into user(firstname, lastname,email, password) values('$user->firstname','$user->lastname','$user->email','$user->password') ";
      echo $query;
        return $conn->query($query);

    }

    public static function getIdByEmail($user,$conn){
        $query = "  select * from user where email='$user->email' ";
        $myArray = array();
       $result= $conn->query($query);
        if($result){
            while($row = $result->fetch_array()){

                $myArray[] = $row;
            }
        }
        return $myArray[0]["id"];

    }

}



?>