<?php
        include '../dbbroker.php';

        include '../index.php';

        if(isset($_POST['deletesend'])){
               $result= Phone::deletePhone($_POST['deletesend'],$conn);
                
         }


?>