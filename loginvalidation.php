<?php
require "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $mobilNo = $_POST["mobilNo"];
    $password = $_POST["password"];
    $re = "SELECT * FROM localuser WHERE (`mobilNo` = '$mobilNo') and  (`password`= '$password');";
    $res = mysqli_query($conn, $re);
    $result = mysqli_fetch_array($res);
    $resultOfPassword = (mysqli_num_rows($res)==1);
    

    if($resultOfPassword==true)
    {        
            $re = "SELECT * FROM localuser WHERE `mobilNo` = '$mobilNo' and  `password`= '$password';";
            $res = mysqli_query($conn, $re);
            $result = mysqli_fetch_array($res);
            session_start();
            $_SESSION['mobilNo'] = $mobilNo;
            $_SESSION['year'] = $result['year'];
            $_SESSION['course'] = $result['course'];
            $_SESSION['fname'] = $result['fname'];
            
            header("Location: index.php");
            echo "login successfully";
        
    }
    else{
        header("Location: login.php");
    
    }
}
else{

    echo "scr";
}
?>