<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-database-compat.js"></script>
</head>
<body class="bg-dark text-white d-flex flex-column min-vh-100">

    <!-- Sidebar -->
    <div style="width: 220px; background-color: #343a40; padding-top: 15px; position: fixed; top: 0; bottom: 0; left: 0; overflow: hidden; z-index: 1000;">
        <div class="text-center mb-3">
            <div style="width: 88px; height: 88px; border: 3px solid #ffc107; border-radius: 50%; display: inline-block; overflow: hidden;">
                <img src="images/agent.png" width="80" height="80" alt="Agent Profile Picture" style="display: block; border-radius: 50%;">
            </div>
            <p style="font-size: 0.9rem;">John Doe</p>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="agent-dashboard.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/dashboard-icon.png" alt="Dashboard Icon" width="18" height="18" style="margin-right: 10px;"> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-properties.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/listings-icon.png" alt="Properties Icon" width="18" height="18" style="margin-right: 10px;"> Manage Listings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="property-interests.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/interests.png" alt="Interests Icon" width="18" height="18" style="margin-right: 10px;"> Property Interests
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/logout-icon.png" alt="Logout Icon" width="18" height="18" style="margin-right: 10px;"> Log Out
                </a>
            </li>
        </ul>
    </div>

    <!-- Main content -->
    <div style="margin-left: 250px; padding: 20px; flex-grow: 1;">
        <div class="container bg-secondary text-white p-3 rounded mb-4">
            <h1 class="mt-5">Property Details</h1>
        </div>
        <div class="container">
            <div class="property-info bg-dark p-4 rounded text-white">
                <div id="property-details" class="mt-4">
                    <!-- Property details will be dynamically loaded here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Firebase Config
        const firebaseConfig = {
            apiKey: "AIzaSyD9uWgziZik7MUhRAi5wYrMdscVGnC17w8",
            authDomain: "realestate-web-46fc4.firebaseapp.com",
            databaseURL: "https://realestate-web-46fc4-default-rtdb.firebaseio.com",
            projectId: "realestate-web-46fc4",
            storageBucket: "realestate-web-46fc4.appspot.com",
            messagingSenderId: "497510502615",
            appId: "1:497510502615:web:1bb6faeb9e487606eea092",
            measurementId: "G-47D1N25YTQ"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        const database = firebase.database();

        // Function to load property details based on propertyId from URL
        function loadPropertyDetails() {
            const urlParams = new URLSearchParams(window.location.search);
            const propertyId = urlParams.get('propertyId'); // Ensure the parameter name matches

            if (propertyId) {
                database.ref('property_approval').child(propertyId).once('value').then((snapshot) => {
                    const property = snapshot.val();

                    if (property) {
                        const propertyDetails = `
                            <table class="table table-dark table-striped">
                                <tbody>
                                    <tr><th>Property Type</th><td>${property.propertyType || 'N/A'}</td></tr>
                                    <tr><th>Address</th><td>${property.address || 'N/A'}</td></tr>
                                    <tr><th>City</th><td>${property.city || 'N/A'}</td></tr>
                                    <tr><th>Suburb</th><td>${property.suburb || 'N/A'}</td></tr>
                                    <tr><th>Province</th><td>${property.province || 'N/A'}</td></tr>
                                    <tr><th>Bedrooms</th><td>${property.bedrooms || 'N/A'}</td></tr>
                                    <tr><th>Bathrooms</th><td>${property.bathrooms || 'N/A'}</td></tr>
                                    <tr><th>Parking Spaces</th><td>${property.parkingSpaces || 'N/A'}</td></tr>
                                    <tr><th>Pets Allowed</th><td>${property.petsAllowed ? 'Yes' : 'No'}</td></tr>
                                    <tr><th>Price</th><td>${property.price ? 'R' + property.price : 'N/A'}</td></tr>
                                    <tr><th>ERF Size</th><td>${property.erfSize || 'N/A'} sqm</td></tr>
                                    <tr><th>Floor Size</th><td>${property.floorSize || 'N/A'} sqm</td></tr>
                                    <tr><th>Rates Amount</th><td>${property.ratesAmount ? 'R' + property.ratesAmount : 'N/A'}</td></tr>
                                    <tr><th>Levies Amount</th><td>${property.leviesAmount ? 'R' + property.leviesAmount : 'N/A'}</td></tr>
                                </tbody>
                            </table>
                        `;
                        document.getElementById('property-details').innerHTML = propertyDetails;
                    } else {
                        document.getElementById('property-details').innerHTML = '<p>Property not found.</p>';
                    }
                }).catch((error) => {
                    console.error("Error loading property details:", error);
                });
            } else {
                document.getElementById('property-details').innerHTML = '<p>No property ID provided.</p>';
            }
        }

        // Load property details on page load
        loadPropertyDetails();
    </script>
</body>
</html>
