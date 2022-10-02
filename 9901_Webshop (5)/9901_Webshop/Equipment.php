<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>MM: Accessoirs</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
    <script src=https://code.jquery.com/jquery-3.3.1.js></script>
    <script src="js/searchbar.js"></script>
    <script src="js/productModal.js"></script>
    <script src="js/redirectModal.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/headers.css" rel="stylesheet">
    <link href="css/productSites.css" rel="stylesheet">
    <link href="css/cards.css" rel="stylesheet">

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gymdatabase";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>

</head>

<body onclick="activeE()">



    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="productModalTitle" class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="productModalImg" class="card-img" src="">
                    <p id="productModalDes"></p>
                </div>
                <div class="modal-footer">
                    <p style="padding-right: 215px" id="productModalPrice"></p>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <header class="p-3 text-bg-dark navBackground mb-4">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.html">
                    <img src="Images/MM.png" width="120px" />
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 navText">Home</a></li>
                    <li><a href="Equipment.php" class="nav-link px-2 navText activeSite">Equipment</a></li>
                    <li><a href="Accessoires.php" class="nav-link px-2 navText">Accessoires</a></li>
                    <li><a href="Nutrition.php" class="nav-link px-2 navText">Nutrition</a></li>
                    <li><a href="checkout.html" class="nav-link px-2 navText">Shopping cart</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search" onkeyup="search()" id="searchBar" autocomplete="off">

                    <ul id="searchItems">
                        <?php include 'php/search.php' ?>
                    </ul>
                </form>


                <div class="text-end">
                    <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Sign-in">Sign-in</button>
                    <button type="button" class="btn btnColor" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="Sign-up">Sign-up</button>
                </div>
            </div>
        </div>
    </header>

    <main>

        <section class="py-2 text-center container">
            <div class="row">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Equipment</h1>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">

                    <?php

                    //Display products
                    $sql = "SELECT productId, category, price, productName, productDes, productStock, picture FROM product where category = 'Equipment '";
                    $result = mysqli_query($conn, $sql);


                    if (mysqli_num_rows($result) > 0) {


                        // output data of each row


                        while ($row = mysqli_fetch_assoc($result)) {

                            $id = str_replace(' ', '_',  $row['productName']);

                            $desc = $row['productDes'];
                            $shortDesc = "";
                            $chars = str_split($desc);
                            $maxChars = 65;

                            foreach ($chars as $char) {
                                if (strlen($shortDesc) < $maxChars) {
                                    $shortDesc .= $char;
                                    $shortDesc;
                                } else {
                                    $shortDesc .= "...";
                                    break;
                                }
                            }


                            echo '
                            <div class="col" id="' . $id . '">
                            <div style="text-align:left" class="card card2 shadow-sm">
                                <img src="data:image/png;base64,' . base64_encode($row['picture']) . '" class="bd-placeholder-img card-img">
                                <div class="card-body">
                                    <p class="card-text fw-bold productName">' . $row['productName'] . '</p>
                                    <hr>
                                    <p class="card-text text-muted productDes" style="display: none;">' . $desc . '</p>
                                    <p class="card-text text-muted fakeProductDes">' . $shortDesc . '</p>
                                    <div style="text-align:center">
                                        <button type="button" class="btn" onclick=changeModal("' . $id . '")>Read more</button>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center lowerCardBody">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-group increase btnShoppingcart">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-cart2 shoppingCart"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                            </svg>
                                            </button>
                                        </div>
                                        <p class="price">$' . $row['price'] . '</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ';
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                    <a id="notificationMenuButton" class="notification-link">
                        <span class="notification">
                            <div id="shoppingCount">
                            </div>
                            <div>
                                <a href="checkout.html"><img src="images/shoppingCart.png" alt="Shopping card-text" id="fixedImage"></a>
                            </div>

                        </span>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#" style="text-decoration: none;">Back to top</a>
            </p>
            <p class="mb-1">&copy; 2022 Monkey Mall, Inc. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/notification.js"></script>

</body>

</html>