<?php
include "./nav.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<style>
    form{
    background: brown;
    color: white;
    width: fit-content;
    padding: 30px;
    font-size: larger;
    margin-left: 600px;
    margin-top: 100px;
}
#link{
color: black;
margin-left: 10px;
font-size: large;
text-decoration: none;
font-weight: bolder;
}
input{
    width: 300px;
    height: 30px;
    outline: none;
}
button{
    width: 150px;
    height: 30px;
    font-weight: bolder;
    margin-left: 80px;
}
</style>
<body>
    <form action="" method="POST">
    <h1>Add New Product</h1>
            <label for="Product Name">Product Name</label><br>
            <input type="text" name="productname"><br><br>
        <button type="submit" name="addnewinfo">Add New Product</button> 
    </form>
        <?php
if (isset($_POST['addnewinfo'])) {
    $productname = $_POST['productname'];
        $add =  mysqli_query($conn,"INSERT INTO product(ProductName) VALUES('{$productname}')");
        if ($add) {
            header("location: ./products.php");
        } }

?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
footer{
    background: rgb(54, 77, 77);
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-size: large;
    position: absolute;
    top: 900px;
    left: 0px;
    width: 100%;
}
</style>
<body>
    <footer>

        <p>&copy; Copyright Rwanda driving license . all rights reserved</p> 
        <p>Done By Ngnewdeveloper in 2024</p>
    </footer>
</body>
</html>