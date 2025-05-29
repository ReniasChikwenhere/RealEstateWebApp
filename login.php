<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title> Mawanele - User/Agent Login </title>
    <link rel="icon" type="image/x-icon" href="/images/mawanele-logo-2.png">

    <!-- Firebase SDKs-->
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-database-compat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-storage-compat.js"></script>
</head>

<body class="bg-dark">
    <br>
    <br>
    <!-- Container -->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
                <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-5">
                                <!-- Mawanele logo -->
                                <img src="images/mawanele-logo-1.png" width="215" height="100" alt="Mawanele Logo 1"><br>
                                <br>
                                <!-- Heading -->
                                <h1 class="fw-bolder">User/Agent Login</h1>
                            </div>
                        </div>
                    </div>

                    <!-- User/Agent login form -->
                    <form id="loginForm">
                        <div class="row gy-3 gy-md-4 overflow-hidden">

                            <!-- Email field -->
                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                                </div>
                            </div>

                            <!-- Password field -->
                            <div class="col-12">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                                </div>
                            </div>

                            <!-- Login button -->
                            <div class="col-12">
                                <div class="d-grid">
                                    <br>
                                    <button class="btn btn-warning btn-lg" type="submit">Login</button>
                                </div>
                            </div>
                        </div>

                        <!-- Back to home button -->
                        <center>
                            <div class="col-12">
                                <div class="d-grid">
                                    <br>
                                    <a href="home.php"><button class="btn btn-secondary btn-lg" type="button" onclick="history.back()">Back to home</button></a>
                                </div>
                            </div>
                        </center>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Initialize Firebase and handle login form submission -->
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
            const database = firebase.database();

            // Handle login
            document.getElementById('loginForm').addEventListener('submit', function(event) {
                event.preventDefault();

                //Get values from the login form
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                console.log('Email:', email);
                console.log('Password:', password);

                // Authenticate with Firebase Authentication
                auth.signInWithEmailAndPassword(email, password)
                    .then((userCredential) => {
                        const user = userCredential.user;
                        const uid = user.uid;

                        // Check 'agents' node
                        database.ref('agents/' + uid).once('value')
                            .then((snapshot) => {
                                if (snapshot.exists()) {
                                    // End-user is an agent
                                    window.location.href = 'agent-dashboard.php';
                                } else {
                                    // Check 'users' node if agent is not found
                                    database.ref('users/' + uid).once('value')
                                        .then((userSnapshot) => {
                                            if (userSnapshot.exists()) {
                                                //End-user is a user
                                                window.location.href = 'user-dashboard.php';
                                            } else {
                                                //End-user does not exist
                                                alert('Profile not found or removed by administrator please contact us for more info!');
                                                auth.signOut();
                                            }
                                        })
                                        .catch((error) => {
                                            //Error fetching user data
                                            console.error('Error fetching user data:', error);
                                            alert('Error fetching user data: ' + error.message);
                                        });
                                }
                            })
                            .catch((error) => {
                                //Error fetching agent data
                                console.error('Error fetching agent data:', error);
                                alert('Error fetching agent data: ' + error.message);
                            });
                    })
                    .catch((error) => {
                        //Login failed
                        console.error('Error during sign-in:', error);
                        alert('Login failed: ' + error.message);
                    });
            });

        });
    </script>
</body>

</html>