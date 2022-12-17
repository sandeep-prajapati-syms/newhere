<!-- INSERT INTO `merchant` (`id`, `title`, `dirciption`, `course`, `year`, `price`, `minimum`, `img`, `mobilNo`, `address`, `feature`) VALUES (NULL, 'tghfsh', 'ydehhhnnx', 'fyhdnvnx', 'jgjvbdj', 'ghjvnsdvn', 'thnvhsxn', '', '2222222222', 'hvhsndhhvnxvhnvcnx', '1'); -->
<?php
require "connection.php";
if(isset($_POST['submit']))
{       session_start();
        $title = $_POST["title"];
        $dirciption = $_POST["dirciption"];
        $course = $_POST["course"];
        $year = $_POST["year"];
        $price = $_POST["price"];
        $minimum = $_POST["minimum"];
        $mobilNo = $_SESSION['mobilNo'];
        $address = $_POST["address"];
        $img = $_FILES['img'];

        // print_r($img);

        $filename = $img['name'];
        $filepath = $img['tmp_name'];
        $fileerror = $img['error'];

        if($fileerror == 0){
            $destfile = 'img/'.$filename;
            
            move_uploaded_file($filepath, $destfile);
            $sql = "INSERT INTO `merchant` (`id`, `title`, `dirciption`, `course`, `year`, `price`, `minimum`, `img`, `mobilNo`, `address`, `feature`, `action`) VALUES (NULL, '$title', '$dirciption', '$course', '$year', '$price', '$minimum', '$destfile', '$mobilNo', '$address', '1', 'ok');";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "sucessfully";
                header("Location: products.php");
            }
            else{
                echo"not inserted";
            }

        }

}