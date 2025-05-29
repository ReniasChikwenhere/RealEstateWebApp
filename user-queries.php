<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Queries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-database-compat.js"></script>
</head>
<body class="bg-dark text-white d-flex flex-column min-vh-100">

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
                <a class="nav-link" href="deals.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/deals-icon.png" alt="Clients Icon" width="18" height="18" style="margin-right: 10px;"> Close Deals
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

    <!-- Main Content -->
    <div style="margin-left: 250px; padding: 20px;">
        <div class="container bg-secondary p-3 rounded">
            <h1 class="text-white">Client Queries</h1>
        </div>
        <div class="container mt-4">
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Date Submitted</th>
                        </tr>
                    </thead>
                    <tbody id="queries-list">
                        <!-- Client queries will load here dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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

         firebase.initializeApp(firebaseConfig);
        const database = firebase.database();
        const clientQueriesRef = database.ref('client_queries');

        // Function to load client queries from Firebase
        function loadClientQueries() {
            clientQueriesRef.on('value', (snapshot) => {
                const queries = snapshot.val();
                const queriesList = document.getElementById('queries-list');
                queriesList.innerHTML = '';

                if (queries) {
                    Object.keys(queries).forEach((key) => {
                        const query = queries[key];
                        const queryRow = `
                            <tr id="query-${key}">
                                <td>${query.fullName}</td>
                                <td><a href="mailto:${query.email}">${query.email}</a></td>
                                <td>${query.phone}</td>
                                <td>${query.message}</td>
                                <td>${new Date(query.timestamp).toLocaleString()}</td>
                                <td>
                                    <button class="btn btn-sm btn-success" onclick="markAsDone('${key}')">Mark Query As Done</button>
                                </td>
                            </tr>
                        `;
                        queriesList.insertAdjacentHTML('beforeend', queryRow);
                    });
                } else {
                    queriesList.innerHTML = '<tr><td colspan="6" class="text-center">No queries available</td></tr>';
                }
            });
        }

        // Function to mark a query as done and remove it from Firebase
        function markAsDone(queryId) {
            const queryRef = clientQueriesRef.child(queryId);
            queryRef.remove()
                .then(() => {
                    // Remove the row from the table after successful deletion
                    const queryRow = document.getElementById(`query-${queryId}`);
                    queryRow.remove();
                    alert('Query marked as done and removed.');
                })
                
        }

        // Load queries on page load
        loadClientQueries();
    </script>
</body>
</html>