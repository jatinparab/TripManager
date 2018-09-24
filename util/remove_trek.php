<?php
    require_once 'conn.php';
    $id = mysqli_real_escape_string($con,$_POST['id']);
    
    
    //echo $id;
    //echo $pass;
    
    $sql = "DELETE FROM trips WHERE id='$id'";

    //echo $sql;
    $res = $con -> query($sql);
    if(isset($res)){
        echo 'success';
    }else{
        echo 'error';
    }
?>