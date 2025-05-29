<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="/images/mawanele-logo-2.png">
    <title>Mawanele - Home</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">
    <center>
        <img src="images/mawanele-logo-1.png" width="215" height="100" alt="Mawanele Logo 1">
    </center>

    <nav>
        <ul class="nav justify-content-center nav-underline">
            <li class="nav-item">
                <a class="link-warning nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="link-warning nav-link" href="our-properties.php">Our Properties</a>
            </li>
            <li class="nav-item">
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

    <br><br>

    <div class="container text-start">
        <div class="row row-cols-2 gx-5">
            <div class="col">
                <h1 class="text-light fw-bolder">WELCOME TO MAWANELE!</h1>
                <br>
                <p class="text-light"> We do not just build property, we define lifestyle through passion, precision and expertise. Our developments are not just brick and concrete, they are safe sanctuaries for families, signs for business growth and investments into the future.</p>
                <br>
                <h2 class="text-white-50">Building your tommorrow today:</h2>
                <p class="text-light">Residential, Commercial, and Luxury Developments and Construction. Transforming visions into reality with unmatched quality and expertise.</p>
                <br>
                <a href="our-properties.php" class="btn btn-warning btn-lg">View all our properties</a>
            </div>
            <div class="col">
                <h1 class="text-light fw-bolder">A BIT ABOUT US?</h1>
                <br>
                <p class="text-light"> We began our journey not only to develop property but disrupt the entire status quo by creating and giving complete value to clients.</p>
                <br>
                <h2 class="text-white-50">Our core values:</h2>
                <p class="text-light">Creating sustained value for all our stakeholders. Creating a future in which home and leisure personify the outlook of modern living. Creating spaces that are practical, yet life changing. Creating elegant designs, which bring value to both client and stakeholders.</p>
                <br>
                <a href="contact-us.php" class="btn btn-warning btn-lg">Get in contact with us</a>
            </div>
        </div>
    </div>

    <br><br>

    <div class="container text-center">
        <div class="row row-cols-1">
            <div class="col">
                <div id="propertyCarousel" class="carousel slide custom-carousel" data-bs-ride="carousel">
                    <!-- Carousel Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#propertyCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#propertyCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#propertyCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#propertyCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>

                    <!-- Carousel Items -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/house-1.png" class="d-block w-100" alt="House 1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-light">House in Bryanston</h5>
                                <p>This beautiful house features 7 bedrooms, 3 bathrooms, a spacious living room, and a modern kitchen.</p>
                                <p><span class="price">Price: R 10 700 000</span></p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/house-2.png" class="d-block w-100" alt="House 2">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-light">House in Morningside</h5>
                                <p>A luxury property with a swimming pool, large garden, and stunning views.</p>
                                <p><span class="price">Price: R 2 850 000</span></p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/house-3.png" class="d-block w-100" alt="House 3">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-light">House in Clubview</h5>
                                <p>A cozy home with easy access to public transportation and shopping centers.</p>
                                <p><span class="price">Price: R 3 500 000</span></p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/house-4.png" class="d-block w-100" alt="House 4">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="text-light">Townhouse in Rooihuiskraal</h5>
                                <p>A charming townhouse with a beautiful garden and plenty of outdoor space for entertaining.</p>
                                <p><span class="price">Price: R 2 500 000</span></p>
                            </div>
                        </div>
                    </div>


                    <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>

        </div>
    </div>

    <br><br>

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