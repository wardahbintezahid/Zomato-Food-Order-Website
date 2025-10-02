function payNow(e) {
    e.preventDefault();
    getAllCartItems();
}

function getAllCartItems() {
    $.ajax({
        url: 'get-cart-items.php',
        type: 'get',
        success: function(data) {
            if (data) {
                let cartItem = JSON.parse(data);
                createNewOrder(cartItem);
            }
        },
        error: function(err) {
            console.error(err);
        }
    });
}

function createNewOrder(obj) {
    obj.forEach(e => {
        e.address = $('#delivary-address').val().trim();
    });

    $.ajax({
        url: 'create-new-order.php',
        type: 'post',
        data: {req_arr: obj},
        success: function(data) {
            console.log(data);
            if (data == 1) {
                window.location = "confirm-order.php";
            }
        },
        error: function(err) {
            console.error(err);
        }
    });
}

function addToCart(e, id) {
    e.preventDefault();
    
    let foodQuantity = $(`#item-quantity-${id}`).val();

    $.ajax({
        url: `get-food.php?id=${id}`,
        type: 'get',
        success: function(data) {
            let res = JSON.parse(data);
            
            let foodPrice = res.food_discount_price > 0 ? res.food_discount_price : res.food_price;

            let obj = {
                food_id: id,
                food_name: res.food_name,
                food_category: res.food_category,
                food_price: (foodPrice * foodQuantity),
                quantity: foodQuantity,
            }

            saveToCart(obj);
        },
        error: function(err) {
            console.error(err);
        }
    });
}

function saveToCart(obj) {
    $.ajax({
        url: 'add-to-cart.php',
        type: 'post',
        data: obj,
        success: function(data) {
            updateCartHtml(obj);
        },
        error: function(err) {
            console.error(err);
        }
    });
}

function updateCartHtml(obj) {
    let html = `
        <li>
            <div class="horizontal-product-box">
                <div class="product-content">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5>${obj.food_name}</h5>
                        <h6 class="product-price">৳${obj.food_price}</h6>
                    </div>
                    <h6 class="ingredients-text">${obj.food_category}</h6>
                    <span>Quantity: ${obj.quantity}</span>
                </div>
            </div>
        </li>
    `;

    $('#cart-item-list').append(html);
    getTotalCartPrice();
}

function getTotalCartPrice() {
    $.ajax({
        url: 'get-total-cart-price.php',
        type: 'get',
        success: function(data) {
            let res = JSON.parse(data);
            $('#total-cart-price').text(res.total_price);
        },
        error: function(err) {
            console.error(err);
        }
    });
}