<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mawanele - Our Properties</title>
    <link rel="icon" type="image/x-icon" href="/images/mawanele-logo-2.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Firebase SDKs-->
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

    <br><br>

    <div class="container text-center">
        <div id="our-properties" class="row gy-4 row-cols-3"></div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
            const storage = firebase.storage();

            // Fetch property listings from Firebase Realtime Database
            function fetchPropertyListings() {
                const propertyListingsRef = database.ref('property_approval');
                propertyListingsRef.on('value', (snapshot) => {
                    const listings = snapshot.val();
                    const listingsContainer = document.getElementById('our-properties');
                    listingsContainer.innerHTML = '';

                    for (const propertyId in listings) {
                        const property = listings[propertyId];

                        const agentEmail = property.agentEmail;
                        displayListedProperties(agentEmail, property, propertyId);
                    }
                });
            }

            // Fetch agent details by agent email from Firebase Realtime Database
            function displayListedProperties(agentEmail, property, propertyId) {
                const agentsRef = database.ref('agents');
                agentsRef.orderByChild('email').equalTo(agentEmail).once('value', (snapshot) => {
                    const agents = snapshot.val();
                    if (agents) {
                        const agentData = Object.values(agents)[0];

                        // Generate property card HTML with agent information
                        const propertyCard = `
                        <div class="col">
                            <div class="card">
                                <img src="${property.thumbnailUrl}" class="card-img-top" height="250" alt="Property Thumbnail">
                                <div class="card-body">
                                    <h5 class="card-title">R ${property.price}</h5>
                                    <p class="card-text">${property.propertyType} in ${property.suburb}</p>
                                    <p class="card-text">Bedrooms: ${property.bedrooms} | Bathrooms: ${property.bathrooms} | Parking spaces: ${property.parkingSpaces}</p>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-${propertyId}">View Property</button>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modal-${propertyId}" tabindex="-1" aria-labelledby="modalLabel-${propertyId}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalLabel-${propertyId}">Property Details</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="${property.thumbnailUrl}" class="d-block w-100" height="250" alt="Property Thumbnail">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">R ${property.price}</h5>
                                                <p class="card-text">${property.propertyType} in ${property.suburb}</p>
                                                <p class="card-text">Bedrooms: ${property.bedrooms} | Bathrooms: ${property.bathrooms} | Parking spaces: ${property.parkingSpaces}</p>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Address: ${property.address}</li>
                                                <li class="list-group-item">Erf size: ${property.erfSize} m²</li>
                                                <li class="list-group-item">Floor size: ${property.floorSize} m²</li>
                                                <li class="list-group-item">Rates: R ${property.ratesAmount}</li>
                                                <li class="list-group-item">Levies: R ${property.leviesAmount}</li>
                                                <li class="list-group-item">Pets allowed: ${property.petsAllowed}</li>
                                                <b><li class="list-group-item">Interested in this property? Please log in to get in contact with the agent.</li></b>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="login.php" class="btn btn-warning">Go to login</a>
                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                        // Append the card to the listings container
                        const listingsContainer = document.getElementById('our-properties');
                        listingsContainer.innerHTML += propertyCard;
                    }
                });
            }

            // Call the function to fetch and display property listings (our properties)
            fetchPropertyListings();

        });
    </script>

</body>

</html>