<?php
include("connection.php");

$sql = "SELECT SUM(food_price) AS total_price FROM `cart`";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    echo json_encode(mysqli_fetch_assoc($result));
}