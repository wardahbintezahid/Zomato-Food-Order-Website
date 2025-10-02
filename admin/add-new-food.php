<?php
require_once("includes/header.php");

$id = "";
$food_name = "";
$food_price = "";
$food_discount_price = "";
$food_category = "";
$food_quantity = "";
$food_image = "";
$food_desc = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `food` WHERE id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $food_name = $row['food_name'];
    $food_price = $row['food_price'];
    $food_discount_price = $row['food_discount_price'];
    $food_category = $row['food_category'];
    $food_quantity = $row['food_quantity'];
    $food_image = $row['food_image'];
    $food_desc = $row['food_desc'];
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Food Information</h5>
                        </div>
                        
                        <div class="card-body">
                            
                            <form action="add-food.php" method="post" enctype="multipart/form-data">
                                <div class="input-items">
                                    <div class="row gy-3">

                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <div class="col-md-6">
                                            <div class="input-box">
                                                <h6>Name</h6>
                                                <input type="text" name="name" value="<?php echo $food_name ?>" placeholder="Enter Your Name">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-box">
                                                <h6>Price</h6>
                                                <input type="number" name="price" value="<?php echo $food_price ?>" placeholder="Enter Price">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-box">
                                                <h6>Discount Price</h6>
                                                <input type="number" name="discount_price" value="<?php echo $food_discount_price ?>" placeholder="Enter Discount Price">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-box">
                                                <h6>Category</h6>
                                                <select class="form-select" name="category" value="<?php echo $food_category ?>">
                                                    <option selected="">Select Category</option>
                                                    <?php 
                                                        $sql = "SELECT * FROM `category`";
                                                        $res = mysqli_query($con, $sql);
                                                        if($res) {
                                                            while($row = mysqli_fetch_assoc($res)) {
                                                                if ($row['category_name'] == $food_category) {
                                                                    echo '<option value="'.$row['category_name'].'" selected>'.$row['category_name'].'</option>';
                                                                } else {
                                                                    echo '<option value="'.$row['category_name'].'">'.$row['category_name'].'</option>';
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="input-box">
                                                <h6>Item Quantity</h6>
                                                <input type="number" name="quantity" value="<?php echo $food_quantity ?>" placeholder="Enter Item Quantity">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="input-box">
                                                <h6>Image</h6>
                                                <input type="file" name="food_image">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="input-box">
                                                <h6>Description</h6>
                                                <textarea name="desc" rows="4"><?php echo $food_desc ?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <input type="submit" name="submit" value="Save" class="btn restaurant-button">
                                        </div>

                                    </div>
                                </div>
                            </form>

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