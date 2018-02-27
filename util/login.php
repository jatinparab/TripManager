<?php
    require_once 'conn.php';
    //require_once 'firewall.php';
    $id = mysqli_real_escape_string($con,$_POST['email']);
    $pass = mysqli_real_escape_string($con,$_POST['password']);
    //echo $id;
    //echo $pass;
    
    $sql = "SELECT * FROM users WHERE email='$id' AND password='$pass'";
    //echo $sql;
    $res = $con -> query($sql);

    if(mysqli_num_rows($res) == 1){
        $row = $res -> fetch_assoc();
        session_start();
        if($row['isAdmin'] == 1){
            $_SESSION["isAdmin"] = 1;
        }else{
            $_SESSION["isAdmin"] = 0;
        }
        
        $_SESSION["id"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        echo "success";
    }else{
        echo "error";
    }
?>