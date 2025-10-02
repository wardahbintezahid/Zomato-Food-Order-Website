<?php
include("connection.php");

$sql = "SELECT * FROM `cart`";
$result = mysqli_query($con, $sql);

$arr = array();
$res_count = mysqli_num_rows($result);


if ($res_count > 0) {
    for ($i = 0; $i < $res_count; $i++) {
        array_push($arr, mysqli_fetch_assoc($result));
    }
    
    echo json_encode($arr);
}