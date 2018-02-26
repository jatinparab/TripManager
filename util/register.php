<?php
    require_once 'conn.php';
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $contact_number = mysqli_real_escape_string($con,$_POST['contact_number']);
    $gender = mysqli_real_escape_string($con,$_POST['gender']);
    
    //echo $id;
    //echo $pass;
    
    $sql = "INSERT INTO users (username, email, password, contact_number, gender)
    VALUES ('$username', '$email', '$password', '$contact_number','$gender')";

    //echo $sql;
    $res = $con -> query($sql);
    if(isset($res)){
        echo 'success';
    }else{
        echo 'error';
    }
?>