<?php
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Backend Stock System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<!-- pulls products from database and exposes them to JS -->
<?php grabProducts(); ?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid pl-0">
        <!-- logo -->
        <img src="https://media.istockphoto.com/id/1231977703/vector/bended-line-letter-logotype-l.jpg?s=612x612&w=0&k=20&c=fz8JsZq9ejQEfvuYMAtM1evGzpFUcIbfuI5S3_OfsF4="
             class="d-inline-block align-top mr-2" id="nav-logo">

        <!-- title -->
        <a class="navbar-brand" href="#">Live Backend Stock System</a>
    </div>
</nav>

<!-- HERO SECTION -->
<section id="hero" class="text-center py-5">
    <div class="container">
        <h1 class="display-3"><b>Live.Source</b></h1>
        <p class="lead">
            <i>An automatically live demo website connected to a database that updates live!</i>
        </p>
        <a href="#products" class="btn btn-primary-custom btn-lg mt-3">View Products</a>
    </div>
</section>

<!-- PRODUCTS SECTION -->
<section class="product-section">
    <div class="container text-center">
        <h2 class="mb-4">Current Products</h2>
        <div id="products" class="row"></div>
    </div>
</section>

<!-- BUY MODAL -->
<div class="modal fade" id="buyModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- modal header -->
            <div class="modal-header">
                <h5 class="modal-title">
                    Buy <span id="modalProductName"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- modal body -->
            <div class="modal-body">
                <form action="order_handling.php" method="POST">

                <input type="hidden" id="productName" name="productName">

                <input type="hidden" id="productPrice" name="productPrice">


                    <!-- product price -->
                    <p><b>Price: £<span id="modalProductPrice"></span></b></p>

                    <!-- full name -->
                    <label>Full Name</label>
                    <input type="text" class="form-control mb-2" id="fullname" name="fullname" placeholder="Enter full name">

                    <!-- email -->
                    <label>Your Email</label>
                    <input type="email" class="form-control mb-2" id="email" name="email" placeholder="Enter email">


                    <!-- delivery address -->
                    <label>Delivery Address</label>
                    <textarea class="form-control mb-3" rows="2" id="deliveryAddress" name="address" placeholder="Address"></textarea>

                    <!-- submit -->
                    <button type="submit" class="btn btn-primary-custom btn-block confirm-purchase">
                        Confirm Purchase
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer id="footer" class="text-white text-center py-4" style="background:#ad080f;">
    <div class="container">
        <h5>Stock Backend Demo Site</h5>
        <p class="mb-0">© 2025 Live-Stock-Backend — All Rights Reserved</p>
    </div>
</footer>

<!-- PRODUCT RENDER SCRIPT -->
<script>
const products = Array.isArray(window.products)
    ? window.products
    : Object.values(window.products);

const productsContainer = document.getElementById("products");

products.forEach(product => {
    const col = document.createElement("div");
    col.className = "col-12 col-md-4 col-lg-3 mb-4";

    col.innerHTML = `
        <div class="card h-100 shadow-sm">
            <img src="${product.image_url}" class="card-img-top">
            <div class="card-body">
                <h5>${product.name}</h5>
                <p>${product.description}</p>
                <p class="text-primary font-weight-bold">£${product.price}</p>
                <button class="btn btn-primary-custom btn-sm buy-btn"
                        data-id="${product.id}">
                    Buy Now
                </button>
            </div>
        </div>
    `;
    productsContainer.appendChild(col);
});
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- BUY BUTTON HANDLER -->
<script>
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("buy-btn")) {
        const card = e.target.closest(".card");
        const name = card.querySelector("h5").textContent;
        const price = card.querySelector(".text-primary").textContent.replace("£", "");

        /* visuals */
        document.getElementById("modalProductName").textContent = name;
        document.getElementById("modalProductPrice").textContent = price;
        /* submitting */
        document.getElementById("productName").value = name;
        document.getElementById("productPrice").value = price;

        /* open modal */
        $("#buyModal").modal("show");
    }
});
</script>

</body>
</html>
