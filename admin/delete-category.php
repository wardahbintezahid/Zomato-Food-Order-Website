<?php
include("../connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
   
    $sql = "DELETE FROM `category` WHERE id=$id";

    $res = mysqli_query($con, $sql);

    if ($res) {
        header("location:category.php");
    } else {
        die(mysqli_error($con, $sql));
    }
}