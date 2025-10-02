<?php
require_once("includes/header.php");
?>

<!-- page head section starts -->
<section class="page-head-section">
    <div class="container page-heading">
        <h2 class="h3 mb-3 text-white text-center">Order Information</h2>
    </div>
</section>
<!-- page head section end -->

<!--  account section starts -->
<section class="account-section section-b-space pt-0">
    <div class="container">
        <div class="layout-sec">
            <div class="row g-lg-4 g-4">
                <div class="col-lg-8">
                    <div class="payment-section">
                        <div class="title mb-0">
                            <div class="loader-line"></div>
                            <h3>Choose Payment Method</h3>
                        </div>

                        <div class="payment-list-box">
                            <div class="form-check d-flex justify-content-between ps-0 w-100">
                                <label class="form-check form-check-reverse" for="flexRadioDefault4">
                                    Cash On Delivery
                                </label>                        
                                <input class="form-check-input" type="radio" name="flexRadioDefault4" checked>
                            </div>
                        </div>
                        <div class="payment-list-box">
                            <div class="form-check d-flex justify-content-between ps-0 w-100">
                                <label class="form-check form-check-reverse" for="flexRadioDefault4">
                                    Bkash Payment
                                </label>                        
                                <input class="form-check-input" type="radio" name="flexRadioDefault4" checked>
                            </div>
                        </div>
                        <div class="payment-list-box">
                            <div class="form-check d-flex justify-content-between ps-0 w-100">
                                <label class="form-check form-check-reverse" for="flexRadioDefault4">
                                    Nagad Payment
                                </label>                        
                                <input class="form-check-input" type="radio" name="flexRadioDefault4" checked>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-summery-section sticky-top">
                        <div class="checkout-detail">
                            
                            <div class="cart-address-box">
                                <div class="add-img">
                                    <img class="img-fluid img" src="assets/images/home.png" alt="rp1">
                                </div>
                                <div class="add-content">
                                    <textarea id="delivary-address" class="form-control" rows="3" placeholder="Delivary address here..."></textarea>
                                </div>
                            </div>

                            <h3 class="fw-semibold dark-text checkout-title">
                                Order Summery
                            </h3>
                            <ul>
                                <?php
                                    $sql = "SELECT * FROM `cart`";
                                    $result = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo '
                                            <li>
                                                <div class="horizontal-product-box">
                                                    <div class="product-content">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5>'.$row['food_name'].'</h5>
                                                            <h6 class="product-price">৳'.$row['food_price'].'</h6>
                                                        </div>
                                                        <h6 class="ingredients-text">'.$row['food_category'].'</h6>
                                                        <span>Quantity: '.$row['quantity'].'</span>
                                                    </div>
                                                </div>
                                            </li>
                                        ';
                                    }
                                ?>
                            </ul>
                            <h5 class="fw-semibold dark-text pt-3 pb-3">Bill Details</h5>
                            <div class="grand-total">
                                <h6 class="fw-semibold dark-text">Total</h6>
                                <h6 class="fw-semibold amount">৳<span>
                                    <?php
                                        $sql = "SELECT SUM(food_price) AS total_price FROM `cart`";
                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['total_price'] > 0 ? $row['total_price'] : 0;
                                    ?>
                                </span></h6>
                            </div>
                            <a href="confirm-order.php" class="btn theme-btn restaurant-btn w-100 rounded-2" onclick="payNow(event)">CONFIRM ORDER</a>
                            <img class="dots-design" src="assets/images/svg/dots-design.svg" alt="dots">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- account section end -->


<?php
require_once("includes/footer.php");
?>