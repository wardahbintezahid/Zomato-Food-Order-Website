<?php
include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `food` WHERE id=$id";
    $result = mysqli_query($con, $sql);

    echo json_encode(mysqli_fetch_assoc($result));
}