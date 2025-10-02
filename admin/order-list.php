<?php
require_once("includes/header.php");

$sql = "SELECT * FROM `orders`";
$result = mysqli_query($con, $sql);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5>Order List</h5>
                    </div>
                    <div>
                        <div class="table-responsive theme-scrollbar">
                            <table class="table category-table dataTable no-footer" id="table_id">
                                <thead>
                                    <tr>
                                        <th>Order Image</th>
                                        <th>Order Code</th>
                                        <th>Date</th>
                                        <th>Payment Method</th>
                                        <th>Delivery Status</th>
                                        <th>Amount</th>
                                        <th class="text-center">Option</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        if ($result) {
                                            while($row = mysqli_fetch_assoc($result)) {
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
                                                            <a class="d-block">
                                                                <span class="order-image">
                                                                    <img src="../images/foods/'.$food_image.'" class="img-fluid">
                                                                </span>
                                                            </a>
                                                        </td>
                                                        <td>'.$order_code.'</td>
                                                        <td>'.$order_date.'</td>
                                                        <td>'.$order_payment_method.'</td>
                                                        '.$order_status.'
                                                        <td>৳'.$order_amount.'</td>
                                                        <td>
                                                            <ul>
                                                                <li>
                                                                    <a href="success-order.php?id='.$id.'">
                                                                        <i class="ri-check-line"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="delete-order.php?id='.$id.'">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </a>
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