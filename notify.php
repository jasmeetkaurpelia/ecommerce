<?php
include "config/db.php";

$product_id = $_POST['product_id'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$stmt = $conn->prepare("INSERT INTO notifications (product_id, email, phone) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $product_id, $email, $phone);
$stmt->execute();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notification Submitted</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .response-box {
            max-width: 500px;
            margin: 100px auto;
            padding: 25px;
            background: #fff;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .response-box p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="response-box">
    <p>✅ Thank you! We’ll notify you when the product is back in stock.</p>
    <a class="back-btn" href="index.php">⬅️ Go Back to Products</a>
</div>

</body>
</html>
