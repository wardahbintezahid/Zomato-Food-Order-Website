<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    $sql = "DELETE FROM `food` WHERE id=$id";

    $res = mysqli_query($con, $sql);

    if ($res) {
        header("location:foods.php");
    } else {
        die(mysqli_error($con, $sql));
    }
}