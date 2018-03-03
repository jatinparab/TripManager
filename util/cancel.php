<?php
    require_once 'conn.php';
    //require_once 'firewall.php';
    $id = mysqli_real_escape_string($con,$_POST['id']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $owner = mysqli_real_escape_string($con,$_POST['owner']);
    //echo $id;
    //echo $pass;
    
    $sql = "DELETE FROM booked_trips WHERE date ='$date'";
    //echo $sql;
    if($res = $con -> query($sql)){
        echo "success";
    }else{
        echo "error";
    }
?>