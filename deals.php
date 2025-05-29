<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mawanele - Close Deals</title>
    <link rel="icon" type="image/x-icon" href="/images/mawanele-logo-2.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="bg-dark text-white d-flex flex-column min-vh-100">
   <!-- left sidebar -->
   <div style="width: 220px; background-color: #343a40; padding-top: 15px; position: fixed; top: 0; bottom: 0; left: 0; overflow: hidden; z-index: 1000;">
        <div class="text-center mb-3">
            <!-- profile picture with the orange circle border -->
            <div style="width: 88px; height: 88px; border: 3px solid #ffc107; border-radius: 50%; display: inline-block; overflow: hidden;">
                <img src="images/Default.png" width="80" height="80" alt="Agent Profile Picture" style="display: block; border-radius: 50%;">
            </div>
            <p style="font-size: 0.9rem;">John Doe</p>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="agent-dashboard.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/dashboard-icon.png" alt="Dashboard Icon" width="18" height="18" style="margin-right: 10px;"> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-properties.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/listings-icon.png" alt="Properties Icon" width="18" height="18" style="margin-right: 10px;"> Manage Property Listings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-clients.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/customers-icon.png" alt="Clients Icon" width="18" height="18" style="margin-right: 10px;"> Manage Clients
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="property-interests.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/interests.png" alt="Clients Icon" width="18" height="18" style="margin-right: 10px;"> View Property Interests
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-transactions.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/transactions.png" alt="Clients Icon" width="18" height="18" style="margin-right: 10px;"> Manage Transactions Process
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user-queries.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/queries.png" alt="Clients Icon" width="18" height="18" style="margin-right: 10px;"> View Latest Client Queries
                </a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" href="deals.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/deals-icon.png" alt="Deals Icon" width="18" height="18" style="margin-right: 10px;"> Close Deals
                </a>
            </li>-->
            <!--<li class="nav-item">
                <a class="nav-link" href="reports.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/reports-icon.png" alt="Reports Icon" width="18" height="18" style="margin-right: 10px;"> View Reports
                </a>
            </li>-->
            <li class="nav-item">
                <hr class="my-2" style="border-top: 1px solid #6c757d;">
            </li>
            <!---<li class="nav-item">
                <a class="nav-link" href="settings.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/settings-icon.png" alt="Settings Icon" width="18" height="18" style="margin-right: 10px;"> Settings
                </a>
            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="login.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/logout-icon.png" alt="Logout Icon" width="18" height="18" style="margin-right: 10px;"> Log Out
                </a>
            </li>
        </ul>
    </div>
    <!-- End of left sidebar -->


    <div style="margin-left: 250px; padding: 20px; flex-grow: 1;">
        <div class="container bg-secondary text-white p-3 rounded mb-4">
            <h1 class="mt-5">Deals</h1>
        </div>
        <div class="container">
            <h2 class="text-white mt-4">Completed Deals:</h2>
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover mt-4">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Property ID</th>
                            <th>Status</th>
                            <th>View Property</th> <!-- New column -->
                        </tr>
                    </thead>
                    <tbody id="completed-deals-list">
                        <!-- Completed deals will be dynamically loaded here -->
                    </tbody>
                </table>
            </div>

            <h2 class="text-white mt-4">Pending Deals:</h2>
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover mt-4">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Property ID</th>
                            <th>Status</th>
                            <th>View Property</th> <!-- New column -->
                        </tr>
                    </thead>
                    <tbody id="pending-deals-list">
                        <!-- Pending deals will be dynamically loaded here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
    <script>
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
        const transactionsDoneRef = database.ref('transactions_completed');
        const transactionsPendingRef = database.ref('transactions_pending');
        

        function loadDeals() {
    transactionsDoneRef.on('value', (snapshot) => {
        const deals = snapshot.val();
        const completedDealsList = document.getElementById('completed-deals-list');
        completedDealsList.innerHTML = ''; // Clear the table before reloading

        if (deals) {
            Object.keys(deals).forEach((key) => {
                const deal = deals[key];
                const propertyLink = deal.propertyId ?
                    `<a href="property-details.php?propertyId=${deal.propertyId}" class="btn btn-info btn-sm">View Property</a>` :
                    'N/A';

                const dealRow = `
                    <tr>
                        <td>${deal.userName || 'N/A'}</td>
                        <td><a href="mailto:${deal.email}">${deal.email || 'N/A'}</a></td>
                        <td>${deal.phone || 'N/A'}</td>
                        <td>${deal.propertyId || 'N/A'}</td>
                        <td>Done</td>
                        <td>${propertyLink}</td>
                        <td><button class="btn btn-danger btn-sm" onclick="removeDeal('completed', '${key}')">Remove</button></td>
                    </tr>
                `;
                completedDealsList.insertAdjacentHTML('beforeend', dealRow);
            });
        }
        
        // Show message if no completed deals
        if (completedDealsList.innerHTML.trim() === '') {
            completedDealsList.innerHTML = '<tr><td colspan="7" class="text-center">No information to display here yet</td></tr>';
        }
    }, (error) => {
        console.error("Error fetching completed deals: ", error);
    });

    transactionsPendingRef.on('value', (snapshot) => {
        const deals = snapshot.val();
        const pendingDealsList = document.getElementById('pending-deals-list');
        pendingDealsList.innerHTML = ''; // Clear the table before reloading

        if (deals) {
            Object.keys(deals).forEach((key) => {
                const deal = deals[key];
                const propertyLink = deal.propertyId ?
                    `<a href="property-details.php?propertyId=${deal.propertyId}" class="btn btn-info btn-sm">View Property</a>` :
                    'N/A';

                const dealRow = `
                    <tr>
                        <td>${deal.userName || 'N/A'}</td>
                        <td><a href="mailto:${deal.email}">${deal.email || 'N/A'}</a></td>
                        <td>${deal.phone || 'N/A'}</td>
                        <td>${deal.propertyId || 'N/A'}</td>
                        <td>Pending</td>
                        <td>${propertyLink}</td>
                        <td><button class="btn btn-danger btn-sm" onclick="removeDeal('pending', '${key}')">Remove</button></td>
                    </tr>
                `;
                pendingDealsList.insertAdjacentHTML('beforeend', dealRow);
            });
        }
        
        // Show message if no pending deals
        if (pendingDealsList.innerHTML.trim() === '') {
            pendingDealsList.innerHTML = '<tr><td colspan="7" class="text-center">No information to display here yet</td></tr>';
        }
    }, (error) => {
        console.error("Error fetching pending deals: ", error);
    });
}


function removeDeal(status, key) {
    const dealRef = status === 'completed' ? transactionsDoneRef.child(key) : transactionsPendingRef.child(key);

    // Remove the selected deal from Firebase
    dealRef.remove()
        .then(() => {
            console.log(`Successfully removed deal with key: ${key}`);
            loadDeals(); // Refresh the deals list to reflect the removal
        })
        .catch((error) => {
            console.error(`Error removing deal with key ${key}:`, error);
        });
}

        // Load deals when the page is loaded
        window.onload = loadDeals;
    </script>
</body>



</html>