<?php
include("connection.php");

if (!empty($_POST)) {
    $req_arr = $_POST['req_arr'];

    for ($i = 0; $i < sizeof($req_arr); $i++) {
        $food_id = $req_arr[$i]['food_id'];
        $sql = "SELECT food_image FROM `food` WHERE id=$food_id";
        $food_image = mysqli_fetch_assoc(mysqli_query($con, $sql))['food_image'];
        $order_code = ''.rand(10000, 100000).'-'.rand(10000, 100000);
        $order_date = $date = date("d/m/Y");
        $order_payment = "Cash On Delivery";
        $order_status = 0;
        $order_amount = $req_arr[$i]['food_price'];
        $address = $req_arr[$i]['address'];
        
        $new_sql = "INSERT INTO `orders`(food_image, order_code, order_date, order_payment_method, order_delivary_status, order_amount, order_delivary_address)
        VALUES('$food_image', '$order_code', '$order_date', '$order_payment', '$order_status', '$order_amount', '$address')";

        $q = mysqli_query($con, $new_sql);
    }
    
    $sql = "TRUNCATE `cart`";
    $result = mysqli_query($con, $sql);
    echo true;
}