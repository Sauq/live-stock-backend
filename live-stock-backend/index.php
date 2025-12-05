<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Backend Stock System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <img src="https://media.istockphoto.com/id/1231977703/vector/bended-line-letter-logotype-l.jpg?s=612x612&w=0&k=20&c=fz8JsZq9ejQEfvuYMAtM1evGzpFUcIbfuI5S3_OfsF4="
                 class="d-inline-block align-top mr-2" id="nav-logo">
        
            <a class="navbar-brand" href="#">Live Backend Stock System</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"> <span class="navbar-toggler-icon"></span> </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#hero">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#footer">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- HERO SECTION -->
    <section id="hero" class="text-center py-5">
        <div class="container">
            <h1 class="display-3"><b>Live.Source</b></h1>
            <p class="lead"><i>An automatically live demo website connected to a database that updates live!</i></p>
            <a href="#products" class="btn btn-primary-custom btn-lg mt-3">View Products</a>
        </div>
    </section>


    <!-- PRODUCT SECTION -->
    <section class="product-section">
        <div class="container text-center">
            <h2 class="mb-4">Current Products</h2>
            <div id="products" class="row"></div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer id="footer" class="text-white text-center py-4" style="background:#ad080f;">
        <div class="container">
            <h5>Stock Backend Demo Site</h5>
            <p class="mb-0">© 2025 Live-Stock-Backend — All Rights Reserved</p>
        </div>
    </footer>


    <!-- BUY NOW MODAL -->
    <div class="modal fade" id="buyModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">
                        Buy <span id="modalProductName"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form action="hash.php" method="POST">
                        <p><b>Price: £<span id="modalProductPrice"></span></b></p>

                        <label>Your Email</label>
                        <input type="email" class="form-control mb-2" id="email" name="email" placeholder="Enter email">

                        <label>Your Password</label>
                        <input type="password" class="form-control mb-2" id="pass" name="pass" placeholder="Enter password">

                        <label>Delivery Address</label>
                        <textarea class="form-control mb-3" rows="2" id="deliveryAddress" name="address" placeholder="Address"></textarea>
                   
                        <button type="submit" class="btn btn-primary-custom btn-block confirm-purchase">Confirm Purchase</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- PRODUCT RENDER SCRIPT -->
    <script>
        const products = [
            { id: 1, name: "Jordan 4", description: "Size 7.5 Mens", price: "£250", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsWlEVavZPg4zWYxjx1H28RNuYl1o7joMN8Q&s" },
            { id: 2, name: "Moncler Maya", description: "Mens Size S", price: "£200", image: "https://i.ebayimg.com/images/g/OiIAAOSwpGdkBdkY/s-l1200.jpg" },
            { id: 3, name: "Amiri Cap", description: "Trucker Hat", price: "£300", image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFy4Q1DibMJs_UO7AAxKZuYMotbirUiLZpPA&s"},
            { id: 4, name: "YSL Jumper", description: "Saint Laurent Jumper", price: "£100", image: "https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQCS_BSzpG-ULVK2lTfnAB5EvcXWDCQ7AjLJE1qz9LopJ6zGpK1z5G87zhelwFgNd4z3WKBhewdZChbMc8GQx27M_FsoReNwJ-CgoMNXnW3iB4LHeCA_As2bYYo&usqp=CAc" },
        ];

        const productsContainer = document.getElementById("products");

        products.forEach(product => {
            const col = document.createElement("div");
            col.classList.add("col-12", "col-md-4", "col-lg-3", "mb-4");

            col.innerHTML = `
                <div class="card h-100 shadow-sm">
                    <img src="${product.image}"
                         class="card-img-top"
                         alt="${product.name}">
                    
                    <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text">${product.description}</p>
                        <p class="text-primary font-weight-bold">${product.price}</p>

                        <button 
                            class="btn btn-primary-custom btn-sm mt-2 buy-btn"
                            data-name="${product.name}"
                            data-price="${product.price}">
                            Buy Now
                        </button>
                    </div>
                </div>
            `;
            productsContainer.appendChild(col);
        });
    </script>

    <!-- BUY SCREEN MODAL OPENING SCRIPT -->
    <script>
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("buy-btn")) {
            const name = e.target.getAttribute("data-name");
            const price = e.target.getAttribute("data-price").replace("£", "");

            document.getElementById("modalProductName").textContent = name;
            document.getElementById("modalProductPrice").textContent = price;

            $("#buyModal").modal("show");
        }

        else if (e.target.classList.contains("confirm-purchase")) {
            const email = document.getElementById("email").value;
            const pass = document.getElementById("pass").value;
            const delivery = document.getElementById("deliveryAddress").value;

            alert(email + pass + delivery)
        }

        
    });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Database Connection -->
    <?php include "db.php"; ?>

    
</body>
</html>