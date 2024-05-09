<?php
session_start();
$conn = mysqli_connect("localhost","root","","berwashop");
if (!$conn) {
    echo "not connected";
}
if (!isset($_SESSION['UserName'])) {
    header('location:./Auth/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<style>
.secondary-nav a {
    background-color: dodgerblue;
    color: #fff;
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    text-decoration: none;
    transition: all 0.2s ease;
}

.secondary-nav a:hover {
    background-color: blue;
}
</style>
<body>
    <nav class="navbar">
        <div class="navbar-inner">
            <div class="logo">
                <span class="logo-text">Berwa Shop</span>
            </div>
            <div class="primary-nav">
                <a href="./products.php">Home</a>
                <a href="./productin.php">Product In</a>
                <a href="./productout.php">Product Out</a>
            </div>
            <div class="secondary-nav">
                <span><?php echo $_SESSION["UserName"] ?></span>&nbsp;&nbsp;&nbsp;
                <a href="./Auth/logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <section class="container">

    </section>
</body>

</html>