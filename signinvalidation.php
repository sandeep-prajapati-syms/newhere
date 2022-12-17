<!-- INSERT INTO `localuser` (`fname`, `lname`, `mobilNo`, `adress`, `course`, `collage`, `year`, `id`, `password`) VALUES ('tujjn', 'yrfyghnvn', '1234567890', 'hfdfhgytuyuyuu', 'yfhgvn', 'rgfhgvnb', 'rtyhg', NULL, 'rwsfdgfhgnbm'); -->
<?php
require "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mobilNo = $_POST["mobilNo"];
    $address = $_POST["address"];
    $course = $_POST["course"];
    $collage = $_POST["collage"];
    $year = $_POST["year"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM localuser WHERE (mobilNo = '$mobilNo' AND fname = '$fname');";
    $res =  mysqli_query($conn, $sql);
    if(mysqli_num_rows($res)===0){
        $sql = "INSERT INTO `localuser` (`fname`, `lname`, `mobilNo`, `adress`, `course`, `collage`, `year`, `id`, `password`) VALUES ('$fname', '$lname', '$mobilNo', '$address', '$course', '$collage', '$year', NULL, '$password');";
        $result = mysqli_query($conn, $sql);
        if($result){
            session_start();
            $_SESSION['mobilNo'] = $mobilNo;
            $_SESSION['year'] = $year;
            $_SESSION['course'] = $course;
            $_SESSION['fname'] = $fname;
            
        }
        else{
            die("Error". mysqli_connect_error());
        }
    }
    else{
        echo "user already exist";
        header("Location: login.php");
    }

}
header("Location: index.php");
?>