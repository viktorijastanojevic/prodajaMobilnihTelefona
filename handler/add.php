<?php
    include '../dbbroker.php';
    include '../model/mobilePhone.php';
 
    
    if(  isset($_POST["add"]) &&  isset($_POST["description"]) && isset($_POST["model"]) && isset($_POST["price"])   ){
        $image = $_FILES['image'];
        $imageLocation = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        move_uploaded_file($imageLocation,'images/'.$imageName);
        $phone = new Phone(null,$_POST["model"],$_POST["description"],$_POST["price"],1,$image);
        
         Phone::addPhone($phone,$conn);
       
        
        
          if($status){
             echo 'Success';
          }else{
              echo $status;
              echo 'Failed';
          }
    }

  

?>