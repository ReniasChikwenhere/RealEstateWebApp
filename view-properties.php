<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mawanele - View Properties</title>
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

    <br>

    <div class="container text-center">

        <form id="filterListingsForm">
            <div class="row row-cols-5">
                <div class="col-2">
                    <div class="form-floating">
                        <select class="form-select" id="propertyType">
                            <option selected>Select</option>
                            <option value="">All</option>
                            <option value="House">House</option>
                            <option value="Townhouse">Townhouse</option>
                            <option value="Apartment">Apartment</option>
                        </select>
                        <label for="floatingSelectPropertyType">Property Type</label>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="minPrice" placeholder="">
                        <label for="floatingInputMinPrice">Min Price</label>
                    </div>
                </div>

                <div class="col-2">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="maxPrice" placeholder="">
                        <label for="floatingInputMaxPrice">Max Price</label>
                    </div>
                </div>

                <div class="col-5">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="location" placeholder="">
                        <label for="floatingInputSearchLocation">Enter Suburb</label>
                    </div>
                </div>

                <div class="col-1">
                    <div class="form-floating">
                        <button type="submit" class="btn btn-warning btn-lg" id="applyFilter">Search</button>
                    </div>
                </div>
            </div>
        </form>

        <br><br>

        <div id="property-listings" class="row gy-4 row-cols-3"></div>

    </div>

    <br><br>

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
            function fetchPropertyListings(filters = {}) {
                const propertyListingsRef = database.ref('property_approval');
                propertyListingsRef.on('value', (snapshot) => {
                    const listings = snapshot.val();
                    const listingsContainer = document.getElementById('property-listings');
                    listingsContainer.innerHTML = '';

                    for (const propertyId in listings) {
                        const property = listings[propertyId];

                        // Apply filtering logic
                        if (applyFilters(property, filters)) {
                            const agentEmail = property.agentEmail;
                            displayListedProperties(agentEmail, property, propertyId);
                        }
                    }
                });
            }

            // Apply filters based on user input
            function applyFilters(property, filters) {
                const {
                    propertyType,
                    minPrice,
                    maxPrice,
                    location
                } = filters;

                // Filter by property type (if specified)
                if (propertyType && property.propertyType !== propertyType) {
                    return false;
                }

                // Convert the price (stored as string) to a number for comparison
                const propertyPriceString = property.price;
                const propertyPrice = parseFloat(propertyPriceString.replace(/[^0-9.]/g, ''));

                console.log(`Property Price: ${propertyPrice}`);

                // Filter by min price (if specified and valid)
                if (minPrice !== null && !isNaN(minPrice)) {
                    if (propertyPrice < minPrice) {
                        console.log(`Skipping due to minPrice: ${minPrice}`);
                        return false;
                    }
                }

                // Filter by max price (if specified and valid)
                if (maxPrice !== null && !isNaN(maxPrice)) {
                    if (propertyPrice > maxPrice) {
                        console.log(`Skipping due to maxPrice: ${maxPrice}`);
                        return false;
                    }
                }

                // Filter by location (if specified)
                if (location && !property.suburb.toLowerCase().includes(location.toLowerCase())) {
                    return false;
                }

                return true;
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
                                    <button type="button" class="btn btn-success" onclick="redirectToForm('${propertyId}')">Interested</button>
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
                                                <li class="list-group-item">Property ID: ${propertyId}</li>
                                                <li class="list-group-item">Address: ${property.address}</li>
                                                <li class="list-group-item">Erf size: ${property.erfSize} m²</li>
                                                <li class="list-group-item">Floor size: ${property.floorSize} m²</li>
                                                <li class="list-group-item">Rates: R ${property.ratesAmount}</li>
                                                <li class="list-group-item">Levies: R ${property.leviesAmount}</li>
                                                <li class="list-group-item">Pets allowed: ${property.petsAllowed}</li>
                                                <li class="list-group-item">Agent name: ${agentData.fname} ${agentData.lname}</li>
                                                <li class="list-group-item">Agent email: ${property.agentEmail}</li>
                                                <li class="list-group-item">Agent contact number: ${agentData.phone}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                        // Append the card to the listings container
                        const listingsContainer = document.getElementById('property-listings');
                        listingsContainer.innerHTML += propertyCard;
                    }
                });
            }

            const filterForm = document.getElementById('filterListingsForm');

            filterForm.addEventListener('submit', function(event) {
                event.preventDefault();

                const filters = {
                    propertyType: document.getElementById('propertyType').value,
                    minPrice: document.getElementById('minPrice').value ? parseFloat(document.getElementById('minPrice').value.replace(/[^0-9.]/g, '')) : null,
                    maxPrice: document.getElementById('maxPrice').value ? parseFloat(document.getElementById('maxPrice').value.replace(/[^0-9.]/g, '')) : null,
                    location: document.getElementById('location').value
                };

                // Now refetch the properties and apply filters as before
                fetchPropertyListings(filters);
            });

            // Call the function to fetch and display property listings initially (without filters)
            fetchPropertyListings();

            // Check if the user is logged in
            firebase.auth().onAuthStateChanged(function(user) {
                if (user) {
                    // User is logged in
                    console.log('User is logged in:', user.email);
                } else {
                    // User is not logged in, redirect them back to the login page
                    alert('Please log in to access this page!');
                    window.location.href = 'login.php';
                }
            });
        });

        //Redirect user to interest in property form
        function redirectToForm(propertyId) {
            const formUrl = `interest-property-form.php?propertyId=${propertyId}`;
            window.location.href = formUrl;
        }
        
    </script>

</body>

</html>