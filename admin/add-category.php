<?php
include("../connection.php");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $category_name = $_POST['category_name'];
    $category_image = $_FILES['category_image'];
    $category_desc = $_POST['category_desc'];
    $category_image_file_name = 'category-'.time().'.'.pathinfo($category_image['name'], PATHINFO_EXTENSION);
    
    $sql = "";

    if ($id) {
        $sql = "UPDATE `category` SET category_name='$category_name', category_image='$category_image_file_name', category_desc='$category_desc' WHERE id=$id";
    } else {
        $sql = "INSERT INTO `category` (category_name, category_image, category_desc)
        VALUES('$category_name', '$category_image_file_name', '$category_desc')";
    }

    $res = mysqli_query($con, $sql);

    if ($res) {
        move_uploaded_file($category_image['tmp_name'], '../images/category/'.$category_image_file_name);
        header("location:category.php");
    } else {
        die(mysqli_error($con, $sql));
    }
}