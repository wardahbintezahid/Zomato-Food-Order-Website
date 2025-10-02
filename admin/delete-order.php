<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    $sql = "DELETE FROM `orders` WHERE id=$id";

    $res = mysqli_query($con, $sql);

    if ($res) {
        header("location:order-list.php");
    } else {
        die(mysqli_error($con, $sql));
    }
}