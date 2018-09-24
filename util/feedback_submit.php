<?php
    require_once 'conn.php';
    //require_once 'firewall.php';
    $feedback = mysqli_real_escape_string($con,$_POST['feedback']);
    $id = mysqli_real_escape_string($con,$_POST['id']);
   
    //echo $id;
    //echo $pass;
    
    $sql = "INSERT INTO feedback (content, owner)
    VALUES ('$feedback', '$id')";
    //echo $sql;
    if($res = $con -> query($sql)){
        echo "success";
    }else{
        echo "error";
    }
?>