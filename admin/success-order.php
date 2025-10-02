<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    $sql = "UPDATE `orders` SET order_delivary_status=1 WHERE id=$id";

    $res = mysqli_query($con, $sql);

    if ($res) {
        header("location:order-list.php");
    } else {
        die(mysqli_error($con, $sql));
    }
}