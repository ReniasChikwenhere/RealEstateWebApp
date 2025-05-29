<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Manage Listings - Mawanele</title>
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
                <img src="images/agent.png" width="80" height="80" alt="Agent Profile Picture" style="display: block; border-radius: 50%;">
            </div>
            <p style="font-size: 0.9rem;">John Doe</p>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="agent-dashboard" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/dashboard-icon.png" alt="Dashboard Icon" width="18" height="18" style="margin-right: 10px;"> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listing.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/listings-icon.png" alt="Properties Icon" width="18" height="18" style="margin-right: 10px;"> Manage Listings
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
                <a class="nav-link" href="reports.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/reports-icon.png" alt="Reports Icon" width="18" height="18" style="margin-right: 10px;"> View Reports
                </a>
            </li>
            <li class="nav-item">
                <hr class="my-2" style="border-top: 1px solid #6c757d;">
            </li>
            <li class="nav-item">
                <a class="nav-link" href="settings.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/settings-icon.png" alt="Settings Icon" width="18" height="18" style="margin-right: 10px;"> Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/logout-icon.png" alt="Logout Icon" width="18" height="18" style="margin-right: 10px;"> Log Out
                </a>
            </li>
        </ul>
    </div>
    <!-- End of left sidebar -->

    <!-- Main Content Area -->
    <div style="margin-left: 250px; padding: 20px; flex-grow: 1;">
        <div class="bg-secondary text-white p-3 rounded mb-4">
            <h3>Manage Listings</h3>
            <p>Add, edit, or remove property listings from your portfolio.</p>
        </div>

        <!-- Listings Management Section -->
        <div class="container">
            <div class="row">
                <!-- Example Listing -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Luxury Apartment</h5>
                            <p class="card-text">Location: Sandton, GP</p>
                            <p class="card-text">Price: R1,200,000</p>
                            <a href="#" class="btn btn-warning">Edit Listing</a>
                            <a href="#" class="btn btn-danger">Delete Listing</a>
                        </div>
                    </div>
                </div>

                <!-- Add More Listings or Fetch from Database -->

                <div class="col-md-4 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Beachfront Villa</h5>
                            <p class="card-text">Location: Johannesburg, GP</p>
                            <p class="card-text">Price: R2,500,000</p>
                            <a href="#" class="btn btn-warning">Edit Listing</a>
                            <a href="#" class="btn btn-danger">Delete Listing</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body">
                            <h5 class="card-title">Downtown Condo</h5>
                            <p class="card-text">Location: Pretoria, GP</p>
                            <p class="card-text">Price: R850,000</p>
                            <a href="#" class="btn btn-warning">Edit Listing</a>
                            <a href="#" class="btn btn-danger">Delete Listing</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>