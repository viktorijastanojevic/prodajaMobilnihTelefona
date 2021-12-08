<?php 
    include 'dbbroker.php';
    include 'model/mobilePhone.php';

    session_start();
    $result = Phone::getAllPhones($conn);


   

    //$p = new Phone(null,"AAA","BBB",10,1 );
    //Phone::addPhone($p,$conn);

    
        
         





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile phones</title>
    <link rel="stylesheet" href="css/style.css">
 
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
    
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   
   <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
 
  padding: 10px;
  outline: none;
    width: 100%;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
 
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>

</head>
<body  style="   background-image: url('images/bg-03.jfif');    background-repeat: no-repeat;   background-attachment: fixed;  background-size: cover;">
     

     
    

        <div class="mainPart" style="background-color: 	rgb(208,208,208,0.9) ;   border-radius: 5px; padding:30px; margin:20%" >

                        <h2><i class="fa fa-mobile" aria-hidden="true"></i> Mobile phones</h2>



                        
                        <table class="table table-hover"  style=" color:black; " >
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Model</th>
                                <th scope="col">Description</th>
                                <th scope="col"><i class="fas fa-euro-sign"></i>  Price</th>
                                <th scope="col"><i class="fas fa-user"></i>  User</th>
                                
                                <th scope="col">Options</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php    while($row = $result->fetch_array()):  ?>

                           
                                        <tr>
                                        <th scope="row">  <?php echo $row["phoneID"]   ?>    </th>
                                        <td> <?php echo $row["model"]   ?> </td>
                                        <td>  <?php echo $row["description"]   ?> </td>
                                        <td> <?php echo $row["price"]   ?> </td>
                                        <td> <?php echo $row["user"]   ?> </td>
                                         
                                        </tr>
                                        <tr>
                                 
                                <?php    endwhile  ?>


                            </tbody>
                </table>
                <button type="button" class="btn btn-primary" id="btnAddNew" data-toggle="modal" data-target="#addNewModal" >Add new mobile phone</button>                      

        </div>





                                                 <!-- MODALI -->

 
 

        <!-- Modal za add new telefon -->
        <div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="lblAddNewModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleAdd">Add new mobile phone</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                              
                        <form  id="addform" style="max-width:500px;margin:auto" method="POST" enctype="multipart/form-data">
 
                            <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Model" name="model" id="model">
                            </div>

                            <div class="input-container">
                                <i class="fa fa-pencil icon"></i>
                                <input class="input-field" type="text" placeholder="Description" name="description" id="description">
                            </div>
                            
                            <div class="input-container">
                                <i class="fa fa-pencil icon"></i>
                                <input class="input-field" type="text" placeholder="Price" name="price" id="price">
                            </div>
                            
                       
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="add" name="add">Add</button>
                        </div>                   
                    
                        </form>


                        </div>
                        
                       
                </div>
            </div>
        </div>








 









   
    <script src="js/main.js"></script>
</body> 
</html>