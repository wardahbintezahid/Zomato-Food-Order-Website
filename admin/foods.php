<?php
require_once("includes/header.php");

$sql = "SELECT * FROM `food`";
$result = mysqli_query($con, $sql);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>Foods</h5>
                        <form class="d-inline-flex">
                            <a href="add-new-food.php"
                                class="align-items-center m-0 btn save-button d-flex gap-2">
                                <i data-feather="plus-square"></i>
                                Add New Food
                            </a>
                        </form>
                    </div>
                    <div class="table-responsive theme-scrollbar">
                        <div>
                            <table class="table category-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Discount Price</th>
                                        <th>Category</th>
                                        <th>Quantity</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        if ($result) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $id = $row['id'];
                                                $food_name = $row['food_name'];
                                                $food_price = $row['food_price'];
                                                $food_discount_price = $row['food_discount_price'];
                                                $food_category = $row['food_category'];
                                                $food_quantity = $row['food_quantity'];
                                                $food_image = $row['food_image'];
                                                $food_desc = $row['food_desc'];

                                                echo '
                                                    <tr>
                                                        <td>
                                                            <div class="table-image">
                                                                <img src="../images/foods/'.$food_image.'" class="img-fluid"
                                                                    alt="">
                                                            </div>
                                                        </td>
                                                        <td>'.$food_name.'</td>
                                                        <td>৳'.$food_price.'</td>
                                                        <td>৳'.$food_discount_price.'</td>
                                                        <td>'.$food_category.'</td>
                                                        <td>'.$food_quantity.'</td>

                                                        <td>
                                                            <ul>
                                                                
                                                                <li>
                                                                    <a href="add-new-food.php?id='.$id.'">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="delete-category.php?id='.$id.'"><i class="ri-delete-bin-line"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                ';
                                            }
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once("includes/footer.php");
?>