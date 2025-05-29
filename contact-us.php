<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mawanele - Contact Us</title>
    <link rel="icon" type="image/x-icon" href="/images/mawanele-logo-2.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Firebase SDKs -->
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-database-compat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-storage-compat.js"></script>
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

    <br>
    <br>

    <div class="container">
        <div class="row row-cols-2 gx-5">
            <div class="col">
                <h1 class="text-light fw-bolder">GET IN TOUCH WITH US!</h1>
                <form id="contactUsForm">
                    <div class="mb-1">
                        <label for="contactUsInputFullName" class="form-label">Name and Surname</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Name and surname" maxlength="60" required>
                    </div>

                    <div class="mb-1">
                        <label for="contactUsInputEmail" class="form-label">E-Mail</label>
                        <input type="email" class="form-control" id="emailAddress" placeholder="Email address" maxlength="100" required>
                    </div>

                    <div class="mb-1">
                        <label for="contactUsInputPhoneNumber" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phoneNumber" placeholder="Phone number" pattern="[0]{1}[0-9]{9}" title="Please enter valid phone number" required>
                    </div>

                    <div class="mb-1">
                        <label for="contactUsTextareaMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Message" maxlength="500" required></textarea>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-warning">Send Message</button>
                </form>
            </div>

            <div class="col">
                <div class="card">
                    <iframe class="card-img-top" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14342.185280346595!2d28.099978!3d-26.015675!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e957337a048e85b%3A0x914e56c4dce28363!2sWaterfall%20Country%20Estate!5e0!3m2!1sen!2sza!4v1721570095628!5m2!1sen!2sza" height="306" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="card-body">
                        <div class="container">
                            <div class="row row-cols-1 text-center">
                                <div class="col">
                                    <p class="fw-bolder">Address</p>
                                    <p>4113 Francolin Drive, Waterfall Country Estate, Midrand 1685</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row row-cols-2 text-center">
                    <div class="col">
                        <p class="text-light fw-bolder">Contact numbers:</p>
                        <p class="text-light">+27 74 297 7879 | +27 65 929 5982</p>
                    </div>

                    <div class="col">
                        <p class="text-light fw-bolder">Email:</p>
                        <p class="text-light">info@mawanele.co.za</p>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Firebase configuration
            const firebaseConfig = {
                apiKey: "AIzaSyD9uWgziZik7MUhRAi5wYrMdscVGnC17w8",
                authDomain: "realestate-web-46fc4.firebaseapp.com",
                databaseURL: "https://realestate-web-46fc4-default-rtdb.firebaseio.com",
                projectId: "realestate-web-46fc4",
                storageBucket: "realestate-web-46fc4.appspot.com",
                messagingSenderId: "667897392227",
                appId: "1:667897392227:web:ee4d60cfb81f00ff43b142",
                measurementId: "G-41CYSKYVZQ"
            };

            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            const database = firebase.database();

            // Handle contact us functionality
            const form = document.getElementById('contactUsForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                //Get values from the contact us form
                const fullName = document.getElementById('fullName').value;
                const email = document.getElementById('emailAddress').value;
                const phone = document.getElementById('phoneNumber').value;
                const message = document.getElementById('message').value;

                // Create a new query entry and insert data into the real-time database (client_queries)
                const queryRef = database.ref('client_queries').push();
                const queryId = queryRef.key;
                queryRef.set({
                        queryId : queryId,
                        fullName: fullName,
                        email: email,
                        phone: phone,
                        message: message,
                        timestamp: new Date().toISOString()
                    })
                    .then(() => {
                        // Successful
                        alert("Your message has been sent! We will get back to you soon.");
                        form.reset();
                    })
                    .catch((error) => {
                        //Unsuccessful
                        alert("Error sending message.");
                        console.error("Error sending message:", error);
                    });
            });

        });
    </script>

</body>

</html>