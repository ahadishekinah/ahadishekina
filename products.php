<?php
include "./nav.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   body{
    background: url(./images/blog-4.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    
}
table,th,thead,tbody,td{
    border-collapse: collapse;
    border: 1px solid dodgerblue;
    padding: 40px;
    margin-left:200px
}
h2{
    margin-left:600px; 
    margin-bottom:60px;
    color:dodgerblue
}
.add{
    margin-left:600px;

}
table a{
    color:yellow;
    font-weight:bolder
}
</style>

<body>
    <a href="./addproduct.php" class="add">Add Product</a> <br> <br>
    <table>
        <thead>
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>action</th>
                <th>Import</th>
                
            </tr>
        </thead>
        <tbody>
<?php

$sql = "SELECT * FROM product";
$query = mysqli_query($conn,$sql);
if (mysqli_num_rows($query) > 0) {
    $i = 1;
    while ($fetch =mysqli_fetch_assoc($query)) {
        $tbody = '
        <tr>
                <td>'.$fetch['ProductCode'].'</td>
                <td>'.$fetch['ProductName'].'</td>
                <td><a href="./updateproduct.php?id='.$fetch['ProductCode'].'">Update</a>&nbsp;
                <a href="./deleteproduct.php?id= '.$fetch['ProductCode'].'">Delete</a>&nbsp;</td>
                <td><a href="./addimport.php?id= '.$fetch['ProductCode'].'">Import</a>&nbsp;</td>
                
   
            </tr>
        ';
        echo $tbody;
    }
}

?>
        </tbody>

    </table>
</body>

</html>