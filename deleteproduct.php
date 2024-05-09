<?php
include "./nav.php";
if ($_GET['id']) {
    $pid = $_GET['id']; 
    $sql = "DELETE FROM `product` WHERE `ProductCode`=$pid";
    $result = mysqli_query($conn,$sql);
    if ($result === TRUE) {
        header("location: ./products.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>