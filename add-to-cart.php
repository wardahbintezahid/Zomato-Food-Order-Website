<?php
include("connection.php");

if (!empty($_POST)) {
    $food_id = $_POST['food_id'];
    $food_name = $_POST['food_name'];
    $food_category = $_POST['food_category'];
    $food_price = $_POST['food_price'];
    $quantity = $_POST['quantity'];
    $date = date("d/m/Y");
    $status = 0;

    $sql = "INSERT INTO `cart`(food_id, food_name, food_category, food_price, quantity, date, status)
    VALUES('$food_id', '$food_name', '$food_category', '$food_price', '$quantity', '$date', '$status')";

    if (mysqli_query($con, $sql)) {
        echo true;
    } else {
        echo false;
    }
}