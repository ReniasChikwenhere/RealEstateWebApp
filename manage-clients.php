<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mawanele - Manage Clients</title>
    <link rel="icon" type="image/x-icon" href="/images/mawanele-logo-2.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
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
            <!--<li class="nav-item">
                <a class="nav-link" href="manage-clients.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/customers-icon.png" alt="Clients Icon" width="18" height="18" style="margin-right: 10px;"> Manage Clients
                </a>
            </li>-->
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
                    <img src="images/interests.png" alt="Properties Icon" width="18" height="18" style="margin-right: 10px;"> View Property Interests
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-transactions.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/transactions.png" alt="Properties Icon" width="18" height="18" style="margin-right: 10px;"> Manage Transactions Process
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user-queries.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/queries.png" alt="Properties Icon" width="18" height="18" style="margin-right: 10px;"> View Latest Client Queries
                </a>
            </li>
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
            <!--<li class="nav-item">
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

    <!-- Main Content Area -->
    <div style="margin-left: 250px; padding: 20px; flex-grow: 1;">
        <div class="bg-secondary text-white p-3 rounded mb-4">
            <h3>Manage Clients</h3>
            <p>View, edit, and manage your clients' details here.</p>
        </div>

       <!-- Clients Table -->
       <div class="card bg-dark text-white">
            <div class="card-body">
                <h5 class="card-title">Client List</h5>
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name and Surname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="client-table-body">
                        <!-- User data will be dynamically added here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Name and Surname</label>
                            <input type="text" class="form-control" id="editName">
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editEmail">
                        </div>
                        <div class="mb-3">
                            <label for="editPhone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="editPhone">
                        </div>
                        <input type="hidden" id="editUserId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="saveChanges()">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
         // Firebase configuration
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
    const app = firebase.initializeApp(firebaseConfig);
        const database = firebase.database();

        // Reference to the 'users' node
        const usersRef = database.ref('users');

        // Fetch users from Firebase and populate the table
        usersRef.on('value', (snapshot) => {
            const clientsTableBody = document.getElementById('client-table-body');
            clientsTableBody.innerHTML = ""; // Clear previous data
            let index = 1;

            snapshot.forEach((childSnapshot) => {
                const userData = childSnapshot.val();
                const userId = childSnapshot.key;

                const row = document.createElement('tr');
                row.innerHTML = `
                    <th scope="row">${index++}</th>
                    <td>${userData.fname || "N/A"} ${userData.lname || "N/A"}</td>
                    <td>${userData.email || "N/A"}</td>
                    <td>${userData.phone || "N/A"}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="editUser('${userId}', '${userData.fname}', '${userData.lname}', '${userData.email}', '${userData.phone}')">Edit Info</button>
                        <button class="btn btn-danger btn-sm" onclick="removeUser('${userId}')">Remove User</button>
                    </td>
                `;
                clientsTableBody.appendChild(row);
            });
        });

        // Edit user function
        function editUser(userId, fname, lname, email, phone) {
            document.getElementById('editUserId').value = userId;
            document.getElementById('editName').value = `${fname} ${lname}`;
            document.getElementById('editEmail').value = email;
            document.getElementById('editPhone').value = phone;
            new bootstrap.Modal(document.getElementById('editModal')).show();
        }

        // Save changes function
        function saveChanges() {
            const userId = document.getElementById('editUserId').value;
            const nameParts = document.getElementById('editName').value.split(" ");
            const fname = nameParts[0] || "";
            const lname = nameParts[1] || "";
            const email = document.getElementById('editEmail').value;
            const phone = document.getElementById('editPhone').value;

            usersRef.child(userId).update({
                fname: fname,
                lname: lname,
                email: email,
                phone: phone
            }).then(() => {
                new bootstrap.Modal(document.getElementById('editModal')).hide();
            }).catch(error => {
                console.error("Error updating user:", error);
            });
        }

        // Remove user function
        function removeUser(userId) {
            if (confirm("Are you sure you want to remove this user?")) {
                usersRef.child(userId).remove().then(() => {
                    alert("User removed successfully.");
                }).catch(error => {
                    console.error("Error removing user:", error);
                });
            }
        }
    </script>
    
</body>

</html>

