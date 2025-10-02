<?php
require_once("includes/header.php");

$sql = "SELECT * FROM `category`";
$result = mysqli_query($con, $sql);

$sale_sql = "SELECT SUM(order_amount) AS total_income FROM `orders`";
$total_income = mysqli_fetch_assoc(mysqli_query($con, $sale_sql));

$order_count_sql = "SELECT COUNT(*) AS total_orders FROM `orders`";
$order_count = mysqli_fetch_assoc(mysqli_query($con, $order_count_sql));

$food_count_sql = "SELECT COUNT(id) AS total_foods FROM `food`";
$food_count = mysqli_fetch_assoc(mysqli_query($con, $food_count_sql));

$order_sql = "SELECT * FROM `orders` LIMIT 5";
$order_result = mysqli_query($con, $order_sql);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-md-12 col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Menu category</h5>
                        </div>
                        <div class="card-body">
                            <div class="categories-section">
                                <div class="theme-arrow">
                                    <div class="swiper categories-slider categories-style">
                                        <div class="swiper-wrapper">
                                            <?php
                                                if ($result) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        $id = $row['id'];
                                                        $category_name = $row['category_name'];
                                                        $category_image = $row['category_image'];
                                                        $category_desc = $row['category_desc'];
        
                                                        echo '
                                                            <div class="swiper-slide">
                                                                <a href="add-new-categorys.php?id='.$id.'" class="food-categories">
                                                                    <img class="img-fluid categories-img" src="../images/category/'.$category_image.'">
                                                                    <h4 class="dark-text">'.$category_name.'</h4>
                                                                </a>
                                                            </div>
                                                        ';
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next categories-next"></div>
                                    <div class="swiper-button-prev categories-prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-sm-6 ">
                    <div class="card widgets-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div
                                    class="col-lg-5 d-flex d-lg-block justify-content-between align-items-center">
                                    <h5>Total Sale</h5>
                                    <h2>৳<?php
                                        if ($total_income['total_income']) {
                                            echo $total_income['total_income'];
                                        } else {
                                            echo 0;
                                        }
                                    ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-sm-6 ">
                    <div class="card widgets-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div
                                    class="col-lg-5 d-flex d-lg-block justify-content-between align-items-center">
                                    <h5>Total Order</h5>
                                    <h2>
                                    <?php
                                        if ($order_count['total_orders']) {
                                            echo $order_count['total_orders'];
                                        } else {
                                            echo 0;
                                        }
                                    ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-6 d-none d-xxl-block">
                    <div class="card widgets-card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <h5>Total Food Item</h5>
                                    <h2>
                                    <?php
                                        if ($food_count['total_foods']) {
                                            echo $food_count['total_foods'];
                                        } else {
                                            echo 0;
                                        }
                                    ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5>Latest 5 Order</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive theme-scrollbar">
                        <div>
                            <table class="table user-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>Order Image</th>
                                        <th>Order Code</th>
                                        <th>Date</th>
                                        <th>Payment Method</th>
                                        <th>Delivery Status</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        if ($order_result) {
                                            while($row = mysqli_fetch_assoc($order_result)) {
                                                $id = $row['id'];
                                                $food_image = $row['food_image'];
                                                $order_code = $row['order_code'];
                                                $order_date = $row['order_date'];
                                                $order_payment_method = $row['order_payment_method'];
                                                $order_delivary_status = $row['order_delivary_status'];
                                                $order_amount = $row['order_amount'];

                                                $order_status = "";

                                                if ($order_delivary_status == 0) {
                                                    $order_status = '
                                                        <td class="order-pending">
                                                            <span  class="font-primary f-w-500">Pending</span>
                                                        </td>
                                                    ';
                                                } else {
                                                    $order_status = '
                                                        <td class="order-success">
                                                            <span class="font-success f-w-500">Success</span>
                                                        </td>
                                                    ';
                                                }

                                                echo '
                                                    <tr>
                                                        <td>
                                                            <div class="table-image">
                                                                <img src="../images/foods/'.$food_image.'" class="img-fluid">
                                                                <h5>Fish Burger</h5>
                                                            </div>
                                                        </td>
                                                        <td>'.$order_code.'</td>
                                                        <td>'.$order_date.'</td>
                                                        <td>'.$order_payment_method.'</td>
                                                        '.$order_status.'
                                                        <td>৳'.$order_amount.'</td>
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
<!-- Container-fluid Ends-->

<?php
require_once("includes/footer.php");
?>