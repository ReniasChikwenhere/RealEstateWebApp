<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Interests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-database-compat.js"></script>
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
            <li class="nav-item">
                <a class="nav-link" href="manage-properties.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/listings-icon.png" alt="Properties Icon" width="18" height="18" style="margin-right: 10px;"> Manage Property Listings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-clients.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/customers-icon.png" alt="Properties Icon" width="18" height="18" style="margin-right: 10px;"> Manage Clients
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="deals.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/deals-icon.png" alt="Interests Icon" width="18" height="18" style="margin-right: 10px;"> Close Deals
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage-transactions.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/transactions.png" alt="Interests Icon" width="18" height="18" style="margin-right: 10px;"> Manage Transactions Process
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user-queries.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/queries.png" alt="Interests Icon" width="18" height="18" style="margin-right: 10px;"> View Latest Client Queries
                </a>
            </li>
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
    <!--End of sidebar-->
    
    <!-- Main content -->
    <div style="margin-left: 250px; padding: 20px; flex-grow: 1;">
        <div class="container bg-secondary text-white p-3 rounded mb-4">
            <h1 class="mt-5">Property Interests</h1>
        </div>
        <div class="container">
            <h2 class="text-white mt-4">Users Interested in Properties:</h2>
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover mt-4">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Property ID</th>
                            <th>Message</th>
                            <th>Property Address</th>
                            <th>View Property Info</th>
                        </tr>
                    </thead>
                    <tbody id="interests-list">
                        <!-- Interested users will be dynamically loaded here -->
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
        const interestsRef = database.ref('property_interest');
        const usersRef = database.ref('users');

        function loadInterests() {
        interestsRef.on('value', (snapshot) => {
            const interests = snapshot.val();
            const interestsList = document.getElementById('interests-list');
            interestsList.innerHTML = ''; // Clear the table before reloading

            if (interests) {
                Object.keys(interests).forEach((key) => {
                    const interest = interests[key];
                    const userId = interest.userId;
                    const propertyId = interest.propertyId;

                    // Retrieve user details based on userId
                    usersRef.child(userId).once('value').then((userSnapshot) => {
                        const user = userSnapshot.val();
                        const userName = user ? `${user.fname || 'Unknown'} ${user.lname || ''}` : 'Unknown User';
                        const userEmail = user ? user.email || 'N/A' : 'N/A';
                        const userPhone = user ? user.phone || 'N/A' : 'N/A';

                        // Email link
                        const emailLink = userEmail !== 'N/A' ? `<a href="mailto:${userEmail}">${userEmail}</a>` : 'N/A';

                        // Retrieve property details from property_approval node
                        database.ref('property_approval').child(propertyId).once('value').then((propertySnapshot) => {
                            const property = propertySnapshot.val();
                            const propertyAddress = property ? property.address || 'N/A' : 'N/A';

                            // View Property link
                            const viewPropertyLink = property 
                                ? `<a href="property-details.php?propertyId=${propertyId}">View Property</a>` 
                                : 'N/A';

                            // Action buttons for Add to Transactions and Remove
                            const actionButton = `
                                <button class="btn btn-success btn-sm" onclick="addToTransactions('${key}', '${userId}', '${propertyId}', '${userName}', '${userEmail}', '${userPhone}', '${interest.comment || 'N/A'}')">Add to Transactions Process</button><br><br>
                                <button class="btn btn-danger btn-sm" onclick="removeInterest('${key}')">Remove</button>
                            `;

                            // Insert row into table
                            const interestRow = `
                                <tr>
                                    <td>${userName}</td>
                                    <td>${emailLink}</td>
                                    <td>${userPhone}</td>
                                    <td>${interest.propertyId}</td>
                                    <td>${interest.comment || 'N/A'}</td>
                                    <td>${propertyAddress}</td>
                                    <td>${viewPropertyLink}</td>
                                    <td>${actionButton}</td>
                                </tr>
                            `;
                            interestsList.insertAdjacentHTML('beforeend', interestRow);
                        });
                    });
                });
            } else {
                // No interests found, display the message
                interestsList.innerHTML = `
                    <tr>
                        <td colspan="8" class="text-center">No client interests yet</td>
                    </tr>
                `;
            }
        });
    }

// Function to add interest to transactions and remove from property_interest
function addToTransactions(key, userId, propertyId, userName, userEmail, userPhone, comment) {
    if (confirm("Are you sure you want to move this interest to transactions?")) {
        database.ref('transactions').push({
            userId: userId,
            propertyId: propertyId,
            userName: userName,
            email: userEmail,
            phone: userPhone,
            comment: comment
        }).then(() => {
            interestsRef.child(key).remove()
                .then(() => {
                    alert("User moved to transactions and removed from interests.");
                    location.reload();
                })
                .catch((error) => {
                    console.error("Error removing user:", error);
                    alert("An error occurred while removing the user. Please try again.");
                });
        }).catch((error) => {
            console.error("Error adding to transactions:", error);
            alert("An error occurred while saving to transactions. Please try again.");
        });
    }
}

// Function to remove interest directly with confirmation prompt
function removeInterest(key) {
    if (confirm("Are you sure you want to remove this user from the property interests?")) {
        interestsRef.child(key).remove()
            .then(() => {
                alert("User interest has been successfully removed.");
                location.reload();
            })
            .catch((error) => {
                console.error("Error removing user interest:", error);
                alert("An error occurred while removing the user interest. Please try again.");
            });
    }
}
        // Load interests on page load
        loadInterests();
    </script>
</body>
</html>
