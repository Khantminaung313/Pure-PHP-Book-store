<?php
session_start();
include ("admin/confs/config.php");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "INSERT INTO orders (name, email, phone, address, status, created_date, modified_date) VALUES ('$name', '$email', '$phone', '$address', '0', NOW(), NOW())";

mysqli_query($conn, $sql);

$order_id = mysqli_insert_id($conn);
foreach($_SESSION['cart'] as $id => $qty) {
    $sql = "INSERT INTO order_items (order_id, book_id, qty) VALUES ($order_id, $id, $qty)";
    mysqli_query($conn, $sql);
}

unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Submitted</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Order Submitted</h1>

    <div class="msg">
        Your order has been submitted. We'll delever the items soon.
        <a href="index.php" class="done">Book Store Home</a>
    </div>

    <div class="footer">
        $copy; <?php echo date("Y") ?>. All right reserved.
    </div>
</body>
</html>