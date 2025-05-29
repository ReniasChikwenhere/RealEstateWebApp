<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title> Mawanele - User Dashboard </title>
    <link rel="icon" type="image/x-icon" href="/images/mawanele-logo-2.png">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Firebase SDKs -->
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-database-compat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-storage-compat.js"></script>
</head>

<body class="bg-dark text-white d-flex flex-column min-vh-100">
    <!---Change the color while hovering over text--->
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
</body>

<body style="background-color: #343a40; color: white; display: flex; min-height: 100vh;">

    <!-- Dashboard sidebar -->
    <div style="width: 250px; background-color: #343a40; padding-top: 15px; position: fixed; top: 0; bottom: 0; left: 0; overflow: hidden; z-index: 1000;">
        <div class="text-center mb-3">
            <!-- profile picture -->
            <div style="width: 88px; height: 88px; border: 3px solid #ffc107; border-radius: 50%; display: inline-block; overflow: hidden;">
                <img src="images/profile-icon.png" width="80" height="80" alt="Profile Picture" style="display: block; border-radius: 50%;">
            </div>
            <p id="userFullName" style="font-size: 0.9rem;"></p>
        </div>
        <ul class="nav flex-column">

            <!-- Sidebar option (Dashboard)-->
            <li class="nav-item">
                <a class="nav-link" href="user-dashboard.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/dashboard-icon.png" alt="Dashboard Icon" width="18" height="18" style="margin-right: 10px;"> Dashboard
                </a>
            </li>

            <!-- Sidebar option (List property)-->
            <li class="nav-item">
                <a class="nav-link" href="list-property-form.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/sell-property-icon.png" alt="List Property Icon" width="18" height="18" style="margin-right: 10px;"> List Property
                </a>
            </li>

            <!-- Sidebar option (View properties)-->
            <li class="nav-item">
                <a class="nav-link" href="view-properties.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/search-property-icon.png" alt="View Properties Icon" width="18" height="18" style="margin-right: 10px;"> View Properties
                </a>
            </li>

            <!-- Sidebar option (View agents)-->
            <li class="nav-item">
                <a class="nav-link" href="view-agents.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/support-icon.png" alt="View Agents Icon" width="18" height="18" style="margin-right: 10px;"> View Agents
                </a>
            </li>

            <!-- Sidebar line -->
            <li class="nav-item">
                <hr class="my-2" style="border-top: 1px solid #6c757d;">
            </li>

            <!-- (Settings functionality for the users will be added at phase 2)

            <li class="nav-item">
                <a class="nav-link" href="#" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/settings-icon.png" alt="Settings Icon" width="18" height="18" style="margin-right: 10px;"> Settings
                </a>
            </li>
            
            -->

            <!-- Sidebar option (Log out)-->
            <li class="nav-item">
                <a class="nav-link" id="userLogoutButton1" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;"
                    onmouseover="handleMouseOver(this)"
                    onmouseout="handleMouseOut(this)">
                    <img src="images/logout-icon.png" alt="Logout Icon" width="18" height="18" style="margin-right: 10px;"> Log Out
                </a>
            </li>

        </ul>
    </div>

    <div style="margin-left: 250px; padding: 20px; flex-grow: 1;">

        <!-- Welcome section -->
        <div class="bg-secondary text-white p-3 rounded mb-4">
            <h3 id="greeting"></h3>
            <p>What would you like to do?</p>
        </div>

        <!-- Dashboard cards -->
        <div class="container">
            <div class="row">
                <!-- Dashboard card (List property) -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">List Property</h5>
                            </br>
                            <img src="images/sell-property-icon.png" alt="List Property Icon" width="60" height="60">
                            </br></br>
                            <p class="card-text">Interested in selling your property? Start by filling out our form today! After submission, it will be reviewed by your selected agent.</p>
                            <a href="list-property-form.php" class="btn btn-warning">Go to form</a>
                        </div>
                    </div>
                </div>

                <!-- Dashboard card (View properties) -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">View Properties</h5>
                            </br>
                            <img src="images/search-property-icon.png" alt="View Properties Icon" width="60" height="60">
                            </br></br>
                            <p class="card-text">Interested in buying property? View all of our listed properties and get in contact with one of our agents today!</p>
                            <a href="view-properties.php" class="btn btn-warning">Go to properties</a>
                        </div>
                    </div>
                </div>

                <!-- Dashboard card (View agents) -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">View Agents</h5>
                            </br>
                            <img src="images/support-icon.png" alt="View Agents Icon" width="60" height="60">
                            </br></br>
                            <p class="card-text">View the details of all our agents registered under Mawanele.</p>
                            <a href="view-agents.php" class="btn btn-warning">Go to agents</a>
                        </div>
                    </div>
                </div>

                <!-- Dashboard card (Log out) -->
                <div class="col-md-6 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title">Log Out</h5>
                            </br>
                            <img src="images/logout-icon.png" alt="Log Out Icon" width="60" height="60">
                            </br></br>
                            <p class="card-text">Log out of your account.</p>
                            <button class="btn btn-warning" id="userLogoutButton2">Log out</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Firebase configuration
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
            const auth = firebase.auth();

            // Get user's name and surname
            auth.onAuthStateChanged(function(user) {
                if (user) {
                    // User is signed in
                    const userId = user.uid;
                    const userRef = firebase.database().ref('users/' + userId);

                    userRef.once('value').then((snapshot) => {
                        const userData = snapshot.val();
                        if (userData) {
                            // Display user's full name
                            const greeting = `Welcome ${userData.fname} ${userData.lname}!`;
                            document.getElementById('greeting').textContent = greeting;

                            const userFullName = `${userData.fname} ${userData.lname}`;
                            document.getElementById('userFullName').textContent = userFullName;
                        }
                    }).catch((error) => {
                        console.error('Error fetching user data:', error);
                    });
                }
            });

            // Logout function (Button 1 - sidebar)
            document.getElementById('userLogoutButton1').addEventListener('click', function() {
                auth.signOut().then(() => {
                    // Logout successful
                    window.location.href = 'login.php';
                    alert('Logout successful.');
                }).catch((error) => {
                    // Logout failed
                    console.error('Error during logout:', error);
                    alert('Error logging out. Please try again.');
                });
            });

            // Logout function (Button 2 - dashboard card)
            document.getElementById('userLogoutButton2').addEventListener('click', function() {
                auth.signOut().then(() => {
                    // Logout successful
                    window.location.href = 'login.php';
                    alert('Logout successful.');
                }).catch((error) => {
                    // Logout failed
                    console.error('Error during logout:', error);
                    alert('Error logging out. Please try again.');
                });
            });

        });
    </script>

</body>

</html>