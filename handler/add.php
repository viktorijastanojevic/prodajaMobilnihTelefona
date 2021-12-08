<?php
    include '../dbbroker.php';

    include '../index.php';
 
    
    if(  isset($_POST["description"]) && isset($_POST["model"]) && isset($_POST["price"])   ){
        
        
        $phone = new Phone(null,$_POST["model"],$_POST["description"],$_POST["price"],1 );
        
        $status= Phone::addPhone($phone,$conn);
        
          if($status){
             echo 'Success';
          }else{
              echo $status;
              echo 'Failed';
          }
    }

  

?>