<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Properties</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-database-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-storage-compat.js"></script>
</head>
<body class="bg-dark text-white d-flex flex-column min-vh-100">

    <!-- Sidebar -->
    <div style="width: 220px; background-color: #343a40; padding-top: 15px; position: fixed; top: 0; bottom: 0; left: 0; overflow: hidden; z-index: 1000;">
        <div class="text-center mb-3">
            <!-- Profile Picture and name -->
            <div style="width: 88px; height: 88px; border: 3px solid #ffc107; border-radius: 50%; display: inline-block; overflow: hidden;">
                <img src="images/Default.png" width="80" height="80" alt="Agent Profile Picture" style="display: block; border-radius: 50%;">
            </div>
            <p style="font-size: 0.9rem;">John Doe</p>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="agent-dashboard.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/dashboard-icon.png" alt="Dashboard Icon" width="18" height="18" style="margin-right: 10px;"> Dashboard
                </a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" href="manage-properties.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/listings-icon.png" alt="Properties Icon" width="18" height="18" style="margin-right: 10px;"> Manage Listings
                </a>
            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="manage-clients.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/customers-icon.png" alt="Clients Icon" width="18" height="18" style="margin-right: 10px;"> Manage Clients
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="deals.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/deals-icon.png" alt="Deals Icon" width="18" height="18" style="margin-right: 10px;"> Close Deals
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="property-interests.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/interests.png" alt="Deals Icon" width="18" height="18" style="margin-right: 10px;"> View Property Interests
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-transactions.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/transactions.png" alt="Deals Icon" width="18" height="18" style="margin-right: 10px;"> Manage Transactions Process
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user-queries.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/queries.png" alt="Deals Icon" width="18" height="18" style="margin-right: 10px;"> View Latest Client Queries
                </a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" href="reports.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/reports-icon.png" alt="Reports Icon" width="18" height="18" style="margin-right: 10px;"> View Reports
                </a>
            </li>-->
            <!--<li class="nav-item">
                <a class="nav-link" href="settings.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/settings-icon.png" alt="Settings Icon" width="18" height="18" style="margin-right: 10px;"> Settings
                </a>
            </li>-->
            <li class="nav-item">
                <hr class="my-2" style="border-top: 1px solid #6c757d;">
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
            <h1 class="mt-5">Manage Properties</h1>
        </div>
        <div class="container">
            <!-- Add heading above the table -->
            <h2 class="text-white mt-4">Newly Added Property Listings From User Submissions:</h2>
            
            <!-- Add table-responsive class for responsiveness -->
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover mt-4">
                    <thead>
                        <tr>
                            <th>Property Address</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Suburb</th>
                            <th>Bedrooms</th>
                            <th>Bathrooms</th>
                            <th>Parking</th>
                            <th>Floor Size (m²)</th>
                            <th>Erf Size (m²)</th>
                            <th>Rates (R)</th>
                            <th>Levies (R)</th>
                            <th>Price (R)</th>
                            <th>Pets Allowed</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="property-list">
                        <!-- Properties will be dynamically loaded here -->
                    </tbody>
                </table>
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
        const propertiesRef = database.ref('property_submissions');
        const approvalRef = database.ref('property_approval');
        const usersRef = database.ref('users'); // To retrieve user details

      // Load and display properties
    function loadProperties() {
        propertiesRef.on('value', (snapshot) => {
            const properties = snapshot.val();
            const propertyList = document.getElementById('property-list');
            propertyList.innerHTML = ''; // Clear the table before reloading

            if (properties) {
                Object.keys(properties).forEach((key) => {
                    const property = properties[key];
                    const userId = property.userId;

                    // Retrieve user details based on userId
                    usersRef.child(userId).once('value').then((userSnapshot) => {
                        const user = userSnapshot.val();
                        const userName = user ? `${user.fname || 'Unknown'} ${user.lname || ''}` : 'Unknown User';
                        const userEmail = user ? user.email || 'N/A' : 'N/A';
                        const userPhone = user ? user.phone || 'N/A' : 'N/A';

                        // Email link
                        const emailLink = userEmail !== 'N/A' ? `<a href="mailto:${userEmail}">${userEmail}</a>` : 'N/A';

                        // Downloadable links for documents
                        const idDocumentLink = property.idDocumentUrl ? `<a href="${property.idDocumentUrl}" target="_blank" download>Download ID Document</a>` : 'No Document';
                        const ratesInvoiceLink = property.ratesInvoiceUrl ? `<a href="${property.ratesInvoiceUrl}" target="_blank" download>Download Rates Invoice</a>` : 'No Invoice';
                        const leviesInvoiceLink = property.leviesInvoiceUrl ? `<a href="${property.leviesInvoiceUrl}" target="_blank" download>Download Levies Invoice</a>` : 'No Levies';

                        // Insert row into table
                        const propertyRow = `
                            <tr>
                                <td>${property.address}</td>
                                <td>${property.province}</td>
                                <td>${property.city}</td>
                                <td>${property.suburb}</td>
                                <td>${property.bedrooms}</td>
                                <td>${property.bathrooms}</td>
                                <td>${property.parkingSpaces}</td>
                                <td>${property.floorSize}</td>
                                <td>${property.erfSize}</td>
                                <td>${property.ratesAmount}</td>
                                <td>${property.leviesAmount}</td>
                                <td>${property.price}</td>
                                <td>${property.petsAllowed ? 'Yes' : 'No'}</td>
                                <td>${userName}</td>
                                <td>${emailLink}</td>
                                <td>${userPhone}</td>
                                <td>
                                    
                                    <button class="btn btn-danger btn-sm" onclick="deleteProperty('${key}')">Delete</button><br><br>
                                    ${idDocumentLink} <br><br>
                                    ${ratesInvoiceLink} <br><br>
                                    ${leviesInvoiceLink} <br><br>
                                    <button class="btn btn-success btn-sm" onclick="approveProperty('${key}')">Approve This Property</button>
                                </td>
                            </tr>
                        `;
                        propertyList.insertAdjacentHTML('beforeend', propertyRow);
                    });
                });
            } else {
                // Display 'No properties to manage here yet' message
                propertyList.innerHTML = `
                    <tr>
                        <td colspan="17" class="text-center text-white">No properties to manage here yet.</td>
                    </tr>
                `;
            }
        });
    }

        // Function to delete property
        function deleteProperty(propertyId) {
            if (confirm('Are you sure you want to delete this property?')) {
                // Remove property from the database
                propertiesRef.child(propertyId).remove()
                .then(() => {
                    alert('Property deleted successfully.');
                    loadProperties(); // Reload the property list
                })
                .catch((error) => {
                    alert('Error deleting property: ' + error.message);
                });
            }
        }

        // Function to approve property
        function approveProperty(propertyId) {
            propertiesRef.child(propertyId).once('value', (snapshot) => {
                const property = snapshot.val();
                if (property) {
                    // Move the property to the property_approval node
                    approvalRef.child(propertyId).set(property)
                    .then(() => {
                        // Optionally, you can remove the property from the original node if needed
                        propertiesRef.child(propertyId).remove();
                        alert('Property approved and moved to the listing.');
                        loadProperties(); // Reload the property list
                    })
                    .catch((error) => {
                        alert('Error approving property: ' + error.message);
                    });
                }
            });
        }

        // Call the function to load properties
        loadProperties();
    </script>
</body>
</html>
