<?php
    require_once 'conn.php';
    //require_once 'firewall.php';
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $img = mysqli_real_escape_string($con,$_POST['img']);
    $price = mysqli_real_escape_string($con,$_POST['price']);
    $region = mysqli_real_escape_string($con,$_POST['region']);
    $difficulty = mysqli_real_escape_string($con,$_POST['difficulty']);
    $length = mysqli_real_escape_string($con,$_POST['length']);
    $altitude = mysqli_real_escape_string($con,$_POST['altitude']);
    $duration = mysqli_real_escape_string($con,$_POST['duration']);
    //echo $id;
    //echo $pass;
    
    $sql = "INSERT INTO trips (title, img, price, region, difficulty, length, altitude, duration)
    VALUES ('$name', '$img', '$price','$region', '$difficulty', '$length','$altitude', '$duration')";
    //echo $sql;
    if($res = $con -> query($sql)){
        echo "success";
    }else{
        echo "error";
    }
?>