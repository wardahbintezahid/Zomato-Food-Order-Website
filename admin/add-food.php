<?php
include("../connection.php");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $food_name = $_POST['name'];
    $food_price = $_POST['price'];
    $food_discount_price = $_POST['discount_price'];
    $food_category = $_POST['category'];
    $food_quantity = $_POST['quantity'];
    $food_image = $_FILES['food_image'];
    $food_desc = filter_var($_POST['desc'], FILTER_SANITIZE_STRING);

    $food_image_name = 'food-'.time().'.'.pathinfo($food_image['name'], PATHINFO_EXTENSION);
    
    $sql = "";

    if ($id) {
        $sql = "UPDATE `food` SET food_name='$food_name', food_price='$food_price', food_discount_price='$food_discount_price', food_category='$food_category', 
        food_quantity='$food_quantity', food_image='$food_image_name', food_desc='$food_desc' WHERE id=$id";
    } else {
        $sql = "INSERT INTO `food` (food_name, food_price, food_discount_price, food_category, food_quantity, food_image, food_desc)
        VALUES('$food_name', '$food_price', '$food_discount_price', '$food_category', '$food_quantity', '$food_image_name', '$food_desc')";
    }

    $res = mysqli_query($con, $sql);

    if ($res) {
        move_uploaded_file($food_image['tmp_name'], '../images/foods/'.$food_image_name);
        header("location:foods.php");
    } else {
        die(mysqli_error($con, $sql));
    }
}