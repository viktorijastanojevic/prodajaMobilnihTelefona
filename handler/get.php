<?php
    include '../dbbroker.php';
    include '../model/mobilePhone.php';
 



    if(isset($_POST['updateid']) ){
        
        $result = Phone::getPhoneById($_POST['updateid'],$conn); //prvo ucitavamo sve podatke iz baze za taj telefon da bismo mogli da ih prikazemo
        $response=array();
        while($row=mysqli_fetch_assoc($result)){
            $response = $row;
        }
       // echo $response;
        echo json_encode($response); //php objekat pretvaramo u json objekat
    }else{
        $response['status']=200; //status OK
        $response['message']="Data not found";
    }




    if(isset($_POST['previewid']) ){
        
        $result = Phone::getPhoneById($_POST['previewid'],$conn); //prvo ucitavamo sve podatke iz baze za taj telefon da bismo mogli da ih prikazemo
        $response=array();
        while($row=mysqli_fetch_assoc($result)){
            $response = $row;
        }
       // echo $response;
        echo json_encode($response); //php objekat pretvaramo u json objekat
    }else{
        $response['status']=200; //status OK
        $response['message']="Data not found";
    }
?>