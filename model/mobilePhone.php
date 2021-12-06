<?php

class Phone{
    private $id;
    private $model;
    private $description;
    private $price;
    private $user;
    private $image;



    public function __construct($id=null,$model=null,$description=null,$price=null,$user=null, $image=null) 
    {
        $this->id=$id;
        $this->model=$model;
        $this->description=$description;
        $this->price=$price;
        $this->image=$image; 
        $this->user=$user; 

    }

    public static function getAllPhones($conn){
            //vracamo sve telefone ali i sve podatke o korisniku koji je vezan za taj telefon 
        $query= "select * from phone p inner join user u on u.id=p.user";
        return $conn->query($query);
    }


    public static function addPhone($phone, $conn){
    
        $query= "insert into phone(model,description,price,user,image) values('$phone->model','$phone->description',$phone->price,$phone->user,'$phone->image')";
        print_r($query);
        return $conn->query($query);
        
    
    }

}

?>