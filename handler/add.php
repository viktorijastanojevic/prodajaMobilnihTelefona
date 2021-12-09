<?php
    include '../dbbroker.php';

    include '../home.php';
    include 'login.php';
    
    if(  isset($_POST["description"]) && isset($_POST["model"]) && isset($_POST["price"])   ){
        
        
        $phone = new Phone(null,$_POST["model"],$_POST["description"],$_POST["price"],$_SESSION['currentUser'] );
        
        $status= Phone::addPhone($phone,$conn);
        
          if($status){
             echo 'Success';
          }else{
              echo $status;
              echo 'Failed';
          }
    }

  

?>