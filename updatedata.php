<?php
include("dbbroker.php");
include "model/mobilePhone.php";
if($_POST['val'])
{
    $id = $_POST['val']; 
    $newcout = 5;
    $result = Phone::getPhoneById($id,$conn);
    $row = mysqli_fetch_row($result);
    $count = $row[5]+1;
    $update = "UPDATE `phone` SET `count` = '$count' WHERE `phoneID` = '$id' ";
    if(mysqli_query($conn, $update)){
        $total = 0;
        $result= Phone::getAllPhones($conn);
        while($row = mysqli_fetch_array($result)){
            $total = $total + $row[5];
        }
        $i = 0;
        $data = array('progress-bar-danger', 'progress-bar-warning', 'progress-bar-info','progress-bar-danger', 'progress-bar-warning', 'progress-bar-info','progress-bar-danger', 'progress-bar-warning', 'progress-bar-info','progress-bar-danger', 'progress-bar-warning', 'progress-bar-info','progress-bar-danger', 'progress-bar-warning', 'progress-bar-info','progress-bar-danger', 'progress-bar-warning', 'progress-bar-info');
        $result= Phone::getAllPhones($conn);
        while($row=mysqli_fetch_array($result)){
            $percentage = ($row[5] / $total) * 100;
            echo '<div class="progress" style="height:35px" >';
            echo '<div class="progress-bar '.$data[$i].'" role="progressbar" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100" style="font-size:20px;width:'.$percentage.'%">';
            echo $row[1].'('.round($percentage).')';
            echo '</div>';
            echo '</div>';
            echo '<br>';
            $i++;
        }
    }
}
?>