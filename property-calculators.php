<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mawanele - Property Calculators</title>
    <link rel="icon" type="image/x-icon" href="/images/mawanele-logo-2.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="bg-dark text-white">

    <center>
        <img src="images/mawanele-logo-1.png" width="215" height="100" alt="Mawanele Logo 1">
    </center>

    <nav> <!-- Top navigation bar -->
        <ul class="nav justify-content-center nav-underline">
            <li class="nav-item">
                <a class="link-warning nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="link-warning nav-link" href="our-properties.php">Our Properties</a>
            </li>
            <li class="nav-item dropdown">
                <a class="link-warning nav-link" href="property-calculators.php">Property Calculators</a>

            </li>
            <li class="nav-item">
                <a class="link-warning nav-link" href="contact-us.php">Contact Us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="link-warning nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Register or Login</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="register.php">Register</a></li>
                    <li><a class="dropdown-item" href="login.php">Login</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- End of top navigation bar section -->

    <!-- Main content -->
    <div class="container mt-5">
        <div class="row">
            <!-- Bond Repayment Calculator -->
            <div class="col-md-6 mb-4">
                <div class="card bg-dark text-white h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Bond Repayment Calculator</h5>
                        </br>
                        <img src="images/bond-repayment-icon.png" alt="Bond Repayment Logo" width="90" height="90">
                        </br></br>
                        <p class="card-text">Calculate the monthly and total home loan repayment for your property.</p>
                        <a href="pc-bond-repayment.php" class="btn btn-warning">Go to calculator</a>
                    </div>
                </div>
            </div>

            <!-- Affordability Calculator -->
            <div class="col-md-6 mb-4">
                <div class="card bg-dark text-white h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Affordability Calculator</h5>
                        </br>
                        <img src="images/affordability-icon.png" alt="Affordability Logo" width="90" height="90">
                        </br></br>
                        <p class="card-text">Calculate the home loan you qualify for and how much you can expect to pay.</p>
                        <a href="pc-affordability.php" class="btn btn-warning">Go to calculator</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <br>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-4 border-top">

            <div class="col-md-4 d-flex flex-column align-items-center mb-3 mb-md-0">
                <a href="#" class="d-flex align-items-center mb-2 link-body-emphasis text-decoration-none">
                    <img src="images/mawanele-logo-2.png" width="40" height="60" alt="Mawanele Logo 2">
                </a>
                <p class="text-light text-center">Copyright © 2024 Mawanele. Designed by SynTech Software</p>
            </div>

            <div class="col-md-4 d-flex flex-column align-items-center mb-3 mb-md-0">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="home.php" class="nav-link text-light quick-link">
                            <img src="images/footer-icon-home.png" width="30" height="30" alt="Home">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="our-properties.php" class="nav-link text-light quick-link">
                            <img src="images/footer-icon-properties.png" width="30" height="30" alt="Our Properties">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="property-calculators.php" class="nav-link text-light quick-link">
                            <img src="images/footer-icon-calculator.png" width="30" height="30" alt="Property Calculators">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="contact-us.php" class="nav-link text-light quick-link">
                            <img src="images/footer-icon-contact.png" width="30" height="30" alt="Contact Us">
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 justify-content-end">
                <br>
                <form>
                    <h5 class="text-light">Subscribe to our newsletter</h5>
                    <p class="text-light">Get updated on new developments and listings</p>
                    <br>
                    <div class="d-flex flex-column flex-sm-row w-80 gap-2">
                        <label for="newsletter" class="visually-hidden">Email address</label>
                        <input id="newsletter" type="email" class="form-control" placeholder="Email address" required>
                        <button class="btn btn-warning" type="submit">Subscribe</button>
                    </div>
                </form>
            </div>

        </footer>
    </div>

</body>

</html>