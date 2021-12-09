<?php
        include '../dbbroker.php';

        include '../home.php';

        if(isset($_POST['deletesend'])){
               $result= Phone::deletePhone($_POST['deletesend'],$conn);
                
         }


?>