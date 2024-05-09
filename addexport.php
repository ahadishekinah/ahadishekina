<?php
include "./nav.php";
if ($_GET['id']) {
    $pid = $_GET['id']; 
$select = mysqli_query($conn,"SELECT * FROM product WHERE ProductCode=$pid");
if ($select) {
    $fetch = mysqli_fetch_assoc($select);  
}}
echo '<form action="" method="POST">
   <h1>Export Product</h1>
   <label for="Product Name">Product Name</label><br>
   <input type="text" name="productname" value="'.$fetch['ProductName'].'" readonly><br><br>
   <label for="priceperunit">Unique price</label><br>
   <input type="number" name="priceperunit"> <br><br>
   <label for="priceperunit">Quantity</label><br>
   <input type="number" name="quantity"> <br><br>
   <label for="date">Date</label><br>
   <input type="date" name="date"> <br><br>
<button type="submit" name="export">Export</button> 
   </form>';
?>
        <?php
if (isset($_POST['export'])) {
    $priceperunit = $_POST['priceperunit'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $totalprice = $priceperunit * $quantity;  
    $sql = "SELECT * FROM productout where ProductCode=$pid";
    $query = mysqli_query($conn,$sql);
    $fetch = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) > 0) {
        $newquantity = $fetch['Quantity'] + $quantity;
        $newpriceperunit = $fetch['UniquePrice'];
        $initialtotalprice = $newquantity * $newpriceperunit;
        $newtotalprice = $initialtotalprice;
        $update = mysqli_query($conn,"UPDATE productout SET Quantity=$newquantity,TotalPrice=$newtotalprice WHERE ProductCode=$pid");
        if ($update) {
            $insql = "SELECT * FROM productin where ProductCode=$pid";
            $inquery = mysqli_query($conn,$insql);
            $infetch = mysqli_fetch_assoc($inquery);
            $newimportquantity = $infetch['Quantity'] - $quantity;
            $import = $newimportquantity *  $infetch['UniquePrice'];
            $importupdate = mysqli_query($conn,"UPDATE productin SET quantity=$newimportquantity,totalprice=$import WHERE ProductCode=$pid");
           if ($importupdate) {
            
               echo "Record is updated";
               echo '<a href="./productout.php">Export</a>';
           }
            
        }
    }
    else{
    $add =  mysqli_query($conn,"INSERT INTO productout(UniquePrice,Quantity,TotalPrice,`Date`,ProductCode) VALUES('$priceperunit','$quantity','$totalprice','$date','$pid')");
    if ($add) {
        $insql = "SELECT * FROM productin where ProductCode=$pid";
        $inquery = mysqli_query($conn,$insql);
        $infetch = mysqli_fetch_assoc($inquery);
        $newimportquantity = $infetch['Quantity'] - $quantity;
        $import = $newimportquantity * $infetch['UniquePrice'];
        $importupdate = mysqli_query($conn,"UPDATE productin SET quantity=$newimportquantity,totalprice=$import WHERE ProductCode=$pid");
       if ($importupdate) {
        
           echo "Record is inserted";
           echo '<a href="./productout.php">Export</a>';
       }
        header("location:./productout.php");
    }
}

        }

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
    form{
    background: dodgerblue;
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
</body>
</html>