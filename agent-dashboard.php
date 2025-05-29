<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mawanele - Agent Dashboard</title>
    <link rel="icon" type="image/x-icon" href="images/mawanele-logo-2.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="bg-dark text-white d-flex flex-column min-vh-100">
    <!---script for changing color while hovering over text--->
    <script>
        function handleMouseOver(element) {
            element.style.backgroundColor = '#495057';
            element.style.color = '#ffc107';
        }

        function handleMouseOut(element) {
            element.style.backgroundColor = 'transparent';
            element.style.color = 'white';
        }
    </script>

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
                    <img src="images/deals-icon.png" alt="Deals Icon" width="18" height="18" style="margin-right: 10px;"> Close Deals
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="property-interests.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/interests.png" alt="Interests Icon" width="18" height="18" style="margin-right: 10px;"> View Property Interests
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-transactions.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/transactions.png" alt="Transactions Icon" width="18" height="18" style="margin-right: 10px;"> Manage Transactions Process
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user-queries.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/queries.png" alt="Transactions Icon" width="18" height="18" style="margin-right: 10px;"> View Latest Client Queries
                </a>
            </li>
            <li class="nav-item">
                <hr class="my-2" style="border-top: 1px solid #6c757d;">
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img  src="images/logout-icon.png" alt="Logout Icon" width="18" height="18" style="margin-right: 10px;"> Log Out
                </a>
            </li>
        </ul>
    </div>
    <!-- End of left sidebar -->

    <!-- Main Content Area -->
    <div style="margin-left: 250px; padding: 20px; flex-grow: 1;">
        <div class="bg-secondary text-white p-3 rounded mb-4">
            <h3>Welcome, John Doe!</h3>
            <p>Here you can manage your listings, clients, and transactions.</p>
        </div>

        <!-- Agent Dashboard Cards -->
        <div class="container">
            <div class="row">
                <!-- Manage Listings -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">Manage Property Listings</h5>
                            <img src="images/listings-icon.png" alt="Listings Icon" width="100" height="100">
                            <p class="card-text">Add, edit, and manage your property listings.</p>
                            <a href="manage-properties.php" class="btn btn-warning">Go to Listings</a>
                        </div>
                    </div>
                </div>
                <!-- Manage Clients -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">Manage Client Registration Process</h5>
                            <img src="images/customers-icon.png" alt="Clients Icon" width="100" height="100">
                            <p class="card-text">View and manage client information, schedules, and inquiries.</p>
                            <a href="manage-clients.php" class="btn btn-warning">Go to Clients</a>
                        </div>
                    </div>
                </div>
                <!-- View Property Interests -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">View Client Property Interests</h5>
                            <img src="images/interests.png" alt="Interests Icon" width="100" height="100">
                            <p class="card-text">View and mark latest property interests as done.</p>
                            <a href="property-interests.php" class="btn btn-warning">Go to Property Interests</a>
                        </div>
                    </div>
                </div>
                <!-- Managing Client Transactions Process -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">Manage Client Transactions Process</h5>
                            <img src="images/transactions.png" alt="Transactions Icon" width="100" height="100">
                            <p class="card-text">View, schedule and send documentation to complete the transactions process on clients that are interested in properties.</p>
                            <a href="manage-transactions.php" class="btn btn-warning">Go to Manage Transactions</a>
                        </div>
                    </div>
                </div>
                 <!-- Close Deals -->
                 <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">Closed Transaction Deals</h5>
                            <img src="images/deals-icon.png" alt="Deals Icon" width="100" height="100">
                            <p class="card-text">Keep record of property transactions that are closed.</p>
                            <a href="deals.php" class="btn btn-warning">Go to Close Transactions Deals</a>
                        </div>
                    </div>
                </div>
                 <!-- View User Queries From Contact-Us Page -->
                 <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">View Users Latest Queries</h5>
                            <img src="images/queries.png" alt="Maintenance Icon" width="100" height="100">
                            <p class="card-text">View clients latest queries.</p>
                            <a href="user-queries.php" class="btn btn-warning">Go to View Queries</a>
                        </div>
                    </div>
                </div>
                  <!-- View Client Updated Info 
                 <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">View Users Updated Information</h5>
                            <img src="images/maintenance.png" alt="Maintenance Icon" width="100" height="100">
                            <p class="card-text">View and update clients information on the platform.</p>
                            <a href="manage-users-information.php" class="btn btn-warning">Go to View Updates</a>
                        </div>
                    </div>
                </div>-->
                 <!-- Manage Tenants -
                 <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">Manage Tenants</h5>
                            <img src="images/tenants.png" alt="Deals Icon" width="100" height="100">
                            <p class="card-text">View and manage tenants.</p>
                            <a href="manage-tenants.php" class="btn btn-warning">Go to Manage Tenants</a>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <!-- End of Main Content Area -->
</body>

</html>