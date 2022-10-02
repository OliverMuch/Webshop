<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Monkey Mall</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">
    <script src=https://code.jquery.com/jquery-3.3.1.js></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/searchbar.js"></script>


    <!-- Custom styles for this template -->
    <link href="css/headers.css" rel="stylesheet">
    <link href="css/features.css" rel="stylesheet">
    <link href="css/cards.css" rel="stylesheet">
    <link href="css/productSites.css" rel="stylesheet">

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
    <!--Login-Modal -->
    <div class="modal fade" id="LoginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="index.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email" required>Email<b>*</b></label>
                            <input type="email" name="emailL" class="form-control" id="emailL" placeholder="Enter email" required>
                        </div>

                        <div class="mb-3">
                            <label for="pw" required>Password<b>*</b></label>
                            <input type="password" name="passwordL" class="form-control" id="pwL " placeholder="Enter Password" required>
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="rememberL">
                            <label class="form-check-label" for="remember">Remember Me</label>
                            <a href="#" class="float-end">Forgot Password</a>
                        </div>
                    </div>
                    <div class="modal-footer pt-4">
                        <button type="submit" class="btn btn-primary mx-auto w-100">Login</button>
                    </div>
                    <p class="text-center">No account? <a href="#">Register</a></p>
                    <p class="text-muted text-center">* required</p>
                </form>
            </div>
        </div>
    </div>

    <!--Register-Modal -->
    <div class="modal fade" id="RegisterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="index.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name">Name<b>*</b></label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="prename">Prename<b>*</b></label>
                            <input type="text" name="prename" class="form-control" id="prename" placeholder="Prename" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email<b>*</b></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                        <div class="mb-3">
                            <label for="pw">Password<b>*</b></label>
                            <input type="password" name="pw" class="form-control" id="pw" placeholder="Enter Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="pwR">Repeat Password<b>*</b></label>
                            <input type="password" name="pwR" class="form-control" id="pwRepeat" placeholder="Enter Password" required>
                        </div>
                        <div class="mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                    </div>
                    <div class="modal-footer pt-4">
                        <button type="submit" id="registerBtn" class="btn btn-primary mx-auto w-100">Register</button>
                    </div>
                    <p class="text-center">You have an Account? <a href="#">Login</a></p>
                    <p class="text-muted text-center">* required</p>
                </form>
            </div>
        </div>
    </div>

    <main>
        <header class="p-3 text-bg-dark navBackground mb-4">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="index.html">
                        <img src="Images/MM.png" width="120px" />
                    </a>
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="index.php" class="nav-link px-2 activeSite">Home</a></li>
                        <li><a href="Equipment.php" class="nav-link px-2 navText">Equipment</a></li>
                        <li><a href="Accesoires.html" class="nav-link px-2 navText">Accessoirs</a></li>
                        <li><a href="Nutrition.html" class="nav-link px-2 navText">Nutrition</a></li>
                        <li><a href="checkout.html" class="nav-link px-2 navText">Shopping cart</a></li>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search" onkeyup="search()" id="searchBar" autocomplete="off">

                        <ul id="searchItems">
                            <?php include 'php/search.php' ?>
                        </ul>
                    </form>

                    <div class="text-end">
                        <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#LoginModal" data-bs-whatever="Login">Login</button>
                        <button type="button" class="btn btnColor" data-bs-toggle="modal" data-bs-target="#RegisterModal" data-bs-whatever="Register">Register</button>
                    </div>
                </div>
            </div>
        </header>

        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom">Assortment</h2>
            <a href="Equipment.html" style="text-decoration: none;">
                <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                    <div class="col">
                        <div class="card card2 card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('Images/Weights.jpg');">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Equipment</h2>
                                <ul class="d-flex list-unstyled mt-auto">
                                    <li class="d-flex align-items-center me-3">
                                        <small>Weigths...</small>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <small>+9</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </a>
            <a href="Accesoires.html" style="text-decoration: none;">
                <div class="col">
                    <div class="card card2 card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('Images/Accesssoires.jpg');">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Accessoirs</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="d-flex align-items-center me-3">
                                    <small>Belts, gloves...</small>
                                </li>
                                <li class="d-flex align-items-center">
                                    <small>+9</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="Nutrition.html" style="text-decoration: none;">
                    <div class="col">
                        <div class="card card2 card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('Images/Nutrition.jpg');">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Nutrition</h2>
                                <ul class="d-flex list-unstyled mt-auto">
                                    <li class="d-flex align-items-center me-3">
                                        <small>Creatine...</small>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <small>+9</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
        </div>
        </div>


        <div class="container mt-5">
            <footer class="py-5">
                <div class="row">
                    <div class="col-6 col-md-2 mb-3">
                        <h5>CPO: K. Monstein</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="mailto:k.monstein.inf20@stud.bbbaden.com?subject=Customer from Monkey Mall" class="nav-link p-0 text-muted">Email</a></li>
                            <li class="nav-item mb-2"><a href="https://www.linkedin.com/in/kerim-monstein-79bb28239/" class="nav-link p-0 text-muted">LinkedIn</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <h5>Kerim: O. Much</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="mailto:o.much.inf20@stud.bbbaden.com?subject=Customer from Monkey Mall" class="nav-link p-0 text-muted">Email</a></li>
                            <li class="nav-item mb-2"><a href="https://www.linkedin.com/in/oliver-much-6ba264239/" class="nav-link p-0 text-muted">LinkedIn</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <h5>Chief Keef: M. Saugy</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="mailto:m.saugy.inf20@stud.bbbaden.com?subject=Customer from Monkey Mall" class="nav-link p-0 text-muted">Email</a></li>
                            <li class="nav-item mb-2"><a href="https://www.linkedin.com/in/michael-saugy-818a6123a/" class="nav-link p-0 text-muted">LinkedIn</a></li>
                        </ul>
                    </div>

                    <div class="col-md-5 offset-md-1 mb-3">
                        <form>
                            <h5>Subscribe to our newsletter</h5>
                            <p>Benefit from monthly offers and promo codes.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email address</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                                <button class="btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                    <p>&copy; 2022 Monkey Mall, Inc. All rights reserved.</p>
                </div>
            </footer>
        </div>

    </main>


    <?php
    
    //Login
    $emailL = $_REQUEST['emailL'];
    $pwL = $_REQUEST['pwL'];

    $sql = "SELECT pw FROM customer WHERE email like '$emailL'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $dbPassword = $row['pw'];
    }

    echo "<script>console.log(' $dbPassword ');</script>";

    if ($pwL == $dbPassword) {
        echo "<script>console.log('Logged-in');</script>";
        echo "<script>console.log('$pwL');</script>";
        //Log in stuff here

    } else {
        echo "<script>console.log('wrong data!');</script>";
        echo "<script>console.log(' $_REQUEST[emailL] ');</script>";
        echo "<script>console.log(' $_REQUEST[pwL] ');</script>";
    }

    
    //Registration

    $name = $_REQUEST['name'];
    $prename = $_REQUEST['prename'];
    $email = $_REQUEST['email'];
    $pw = $_REQUEST['pw'];

    $create = true;

    $sql = "SELECT email FROM customer";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($email == $row['email']) {
            $create = false;
        }
        echo "<script>console.log('" . $row['email'] . "');</script>";
    }
    echo "<script>console.log('$create');</script>";


    if ($create) {

        $sql = "INSERT INTO customer (customerName, customerPrename, email, pw) VALUES ('$name', '$prename', '$email','$pw')";
        mysqli_query($conn, $sql);
        echo "<script>console.log('Einigefüggt: $_REQUEST[name]', '$_REQUEST[prename]', '$_REQUEST[email]', '$_REQUEST[pw]');</script>";
    }


    ?>




    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/modal.js"></script>


</body>

</html>