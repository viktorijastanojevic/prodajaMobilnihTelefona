<?php 
    include 'dbbroker.php';
    include 'model/mobilePhone.php';


 
    $result = Phone::getAllPhones($conn); //za tabelu

  
    $result1 = Phone::getAllPhones($conn); //za poll
   

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
 <script src="js/vote.js"></script>

<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
    
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body  style="   background-image: url('images/bg-03.jfif');    background-repeat: no-repeat;   background-attachment: fixed;  background-size: cover;">
     

     
    

        <div class="mainPart" style="background-color: 	rgb(208,208,208,0.9) ;   border-radius: 5px; padding:30px; margin:10%" >

                        <h2><i class="fa fa-mobile" aria-hidden="true"></i> Mobile phones</h2> 
                       <input type="text" id="myInput" onkeyup="search()" placeholder="Search for names.." title="Type in a name" style="float:right;font-size:25px;border:none;
    border-radius: 5px;">   <i class="fa fa-search" aria-hidden="true" style="float:right; font-size:30px;padding:4px"></i>



                        
                        <table class="table table-hover"  style=" color:black; "  id="myTable">
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
                                        <td> 
                                            <form  method="post">
                                                <button type="button" class="btn btn-success"    data-toggle="modal" data-target="#updateModal" onclick="getDetailsUpdateModal(<?php echo $row['phoneID']?> )" >  <i class="fas fa-pencil-alt"></i> </button> 
                                                <button type="button" class="btn btn-danger"   onclick="deletePhone( <?php echo $row['phoneID']   ?>  )" ><i class="fas fa-trash"></i></button>  
                                                <button type="button" class="btn btn-warning"   data-toggle="modal" data-target="#viewModal"  onclick="getDetailsPreviewModal(<?php echo $row['phoneID']?> )"><i class="far fa-id-card"></i></button>   </td>
                                                </form>
                                            </tr>
                                       
                                 
                                <?php    endwhile  ?>


                            </tbody>
                </table>
                <button type="button" class="btn btn-primary" id="btnAddNew" data-toggle="modal" data-target="#addNewModal" > <i class="fas fa-plus"></i> Add new mobile phone</button>   
                <button type="button" class="btn btn-secondary" id="sortTable"  onclick="sortTable()"  ><i class="fa fa-sort" aria-hidden="true"></i>  Sort table by name descending</button>                    

        </div>




        <div class="mainPart" style="background-color: 	rgb(208,208,208,0.9) ;   border-radius: 5px; padding:30px; margin:10%" >

             <h2><i class="fa fa-mobile" aria-hidden="true"></i>   Which is the best mobile phone?</h2>


                

                
                    <div class="container" style="background-color: rgb(208,208,208,0.9);">
                    <?php
                    
                    
                   
                    while($row = mysqli_fetch_array($result1)) {
                        ?>
                        <button name="vote" onclick="countvalue(this.value)" value="<?php echo $row['phoneID']; ?>"  class="btn btn-warning">
                            <?php echo '<b>'.$row['model'].'</b>'; ?>
                        </button>
                        <?php
                    }
                    ?>
                    <br><br>
                    <div id="showvotebar" style="background-color: 	rgb(208,208,208,0.9)">
                        <?php 
                        $data = array('progress-bar-danger', 'progress-bar-warning', 'progress-bar-info','progress-bar-danger', 'progress-bar-warning', 'progress-bar-info','progress-bar-danger', 'progress-bar-warning', 'progress-bar-info','progress-bar-danger', 'progress-bar-warning', 'progress-bar-info','progress-bar-danger', 'progress-bar-warning', 'progress-bar-info','progress-bar-danger', 'progress-bar-warning', 'progress-bar-info');
                        $total =0;
                        $result= Phone::getAllPhones($conn);
                        while($row = mysqli_fetch_array($result)){
                            $total = $total + $row[5];
                        } 
                        $i = 0;
                        $result= Phone::getAllPhones($conn);
                        while($row = mysqli_fetch_array($result)){ 
                            $percentage = ($row[5] / $total) * 100;
                            echo '<div class="progress" style="height:35px" > ';
                            echo '<div class="progress-bar '.$data[$i].'" role="progressbar" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100" style="font-size:20px;width:'.$percentage.'%">';
                            echo $row[1].'('.round($percentage).')';
                            echo '</div>';
                            echo '</div>';
                            echo '<br>';
                            $i++;
                        }
                        ?>
                    </div>
         
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
                                <input class="input-field" type="text" placeholder="Model" name="model" id="model" required>
                            </div>

                            <div class="input-container">
                                <i class="fa fa-pencil icon"></i>
                                <input class="input-field" type="text" placeholder="Description" name="description" id="description" required>
                            </div>
                            
                            <div class="input-container">
                                <i class="fa fa-pencil icon"></i>
                                <input class="input-field" type="text" placeholder="Price" name="price" id="price" required>
                            </div>
                            
                       
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="add" name="add"> <i class="fas fa-plus"></i> Add</button>
                        </div>                   
                    
                        </form>


                        </div>
                        
                       
                </div>
            </div>
        </div>




 <!-- Modal za update   telefon -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="lblUpdateModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleUpdate">Update mobile phone</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                              
                        <form  id="updateform" style="max-width:500px;margin:auto" method="POST" enctype="multipart/form-data">
 
                            <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Model" name="modelupdate" id="modelupdate" required>
                            </div>

                            <div class="input-container">
                                <i class="fa fa-pencil icon"></i>
                                <input class="input-field" type="text" placeholder="Description" name="descriptionupdate" id="descriptionupdate" required>
                            </div>
                            
                            <div class="input-container">
                                <i class="fa fa-pencil icon"></i>
                                <input class="input-field" type="text" placeholder="Price" name="priceupdate" id="priceupdate" required>
                            </div>
                            <input  class="input-field" type="text" id="hiddenData" name ="hiddenData">
                       
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="update" name="update"  >  Update</button>
                            
                        </div>                   
                    
                        </form>


                        </div>
                        
                       
                </div>
            </div>
        </div>
       
                                    





















                                    
        <!-- profile modal start -->
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Phone <i class="fa fa-mobile" aria-hidden="true"></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container" id="profile">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <img src="http://placehold.it/100x100" id="Img" alt="" class="rounded responsive" style="width: 100px;height: auto;" />
                                </div>
                                <div class="col-sm-6 col-md-8">
                                    <h4 id="modelPreview" class="text-primary"></h4>
                                    <p class="text-secondary">
                                        <input type="hidden" name="hiddenData"   value="">
                                        <i id="descriptionPreview" class="fa fa-pencil" aria-hidden="true"> </i>
                                        <!-- <i id="Email" class="fa fa-envelope-o" aria-hidden="true"></i> -->
                                        <br />
                                        <i id="pricePreview" class="fa fa-tag"  aria-hidden="true"></i>
                                        <br>
                                        <i id="userPreview" class="fas fa-user"  aria-hidden="true"></i>
                                    </p>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- profile modal end -->






















 





 

        <script src="js/searchandsort.js"></script>
    <script src="js/main.js"></script>
</body> 
</html>



 