<?php
require_once("includes/header.php");

$sql = "SELECT * FROM `food`";

if (isset($_GET['search'])) {
    $search_text = $_GET['search'];
    $sql = "SELECT * FROM `food` WHERE food_name LIKE '%$search_text%'";
}

$result = mysqli_query($con, $sql);
?>

<!-- page head section starts -->
<section id="home" class="home-wrapper section-b-space overflow-hidden">
    <div class="container text-center position-relative">
        <h2>Welcome Zomato</h2>
        <div class="search-section">
            <form action="home.php" method="get" class="my-search search-head" id="search-form">
                <div class="form-group">
                    <div class="form-input mb-0">
                        <input type="search" name="search" class="form-control search">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
            </form>
            <a class="btn theme-btn mt-0" onclick="searchFood(event)" role="button">Search</a>
        </div>
    </div>
</section>
<!-- page head section end -->


<!-- menu section starts -->
<section class="menu-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="row g-3 ratio2_3">
                    <?php
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $food_name = $row['food_name'];
                                $food_price = $row['food_price'];
                                $food_discount_price = $row['food_discount_price'];
                                $food_category = $row['food_category'];
                                $food_quantity = $row['food_quantity'];
                                $food_image = $row['food_image'];
                                $food_desc = $row['food_desc'];

                                $price = "";

                                if ($food_discount_price != 0) {
                                    $price = "৳$food_discount_price <span class='content-color'><del>৳".$food_price."</del></span>";
                                } else {
                                    $price = "৳$food_price";
                                }

                                echo '
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="pharmacy-product-box">
                                            <div>
                                                <div class="pharmacy-product-img bg-white">
                                                    <img class="bg-img img" src="images/foods/'.$food_image.'">
                                                </div>
                                            </div>
                                            <div class="pharmacy-product-details">
                                                <h6 class="content-color">'.$food_category.'</h6>
                                                <h5 class="product-name dark-text">
                                                    '.$food_name.'
                                                </h5>
                                                <div class="d-flex align-items-center justify-content-between my-1">
                                                    <h5 class="fw-medium theme-color price">
                                                        '.$price.'
                                                    </h5>
                                                </div>
                                                <div class="bottom-panel d-flex align-items-center justify-content-between gap-1">
                                                    <div class="plus-minus">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <i class="ri-subtract-line sub"></i>
                                                            <input id="item-quantity-'.$id.'" type="number" value="1" min="1" max="10">
                                                            <i class="ri-add-line add"></i>
                                                        </div>
                                                    </div>
                                                    <a href="#" onclick="addToCart(event, '.$id.')" class="btn theme-outline cart-btn rounded-2">
                                                        Add Cart
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        } else {
                            echo '
                                <div class="col-xl-4 col-sm-6">
                                    <h4>No Data Found!</h4>
                                </div>
                            ';
                        }
                        
                    ?>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 product-details-content">
                <div class="order-summery-section sticky-top">
                    <div class="checkout-detail">
                        <h3 class="fw-semibold dark-text checkout-title">Cart Items</h3>
                        <div class="order-summery-section mt-0">
                            <div class="checkout-detail p-0">
                                <ul id="cart-item-list">
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

                                <h5 class="bill-details-title fw-semibold dark-text">
                                    Bill Details
                                </h5>
                                <div class="grand-total">
                                    <h6 class="fw-semibold dark-text">To Pay</h6>
                                    <h6 class="fw-semibold amount">৳<span id="total-cart-price">
                                        <?php
                                            $sql = "SELECT SUM(food_price) AS total_price FROM `cart`";
                                            $result = mysqli_query($con, $sql);
                                            $row = mysqli_fetch_assoc($result);
                                            echo $row['total_price'] > 0 ? $row['total_price'] : 0;
                                        ?>
                                    </span></h6>
                                </div>
                                
                            </div>
                        </div>
                        <a href="payment.php" class="btn theme-btn restaurant-btn w-100 rounded-2">Proceed to payment</a>
                        <img class="dots-design" src="assets/images/svg/dots-design.svg" alt="dots">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- menu section end -->

<script defer>
    function searchFood(e) {
        e.preventDefault();
        let form = document.getElementById("search-form");
        form.method = 'GET';
        form.submit();
    }
</script>

<?php
require_once("includes/footer.php");
?>