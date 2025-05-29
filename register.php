<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title> Mawanele - User Registration </title>
    <link rel="icon" type="image/x-icon" href="/images/mawanele-logo-2.png">

    <!-- Firebase SDKs -->
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
                                <h1 class="fw-bolder">User Registration</h1>
                            </div>
                        </div>
                    </div>

                    <!-- User registration form -->
                    <form id="registerUserForm">
                        <div class="row gy-3 gy-md-4 overflow-hidden">

                            <!-- First name field -->
                            <div class="col-12">
                                <label for="first_name" class="form-label">First Name<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter your first name" maxlength="30" required>
                                </div>
                            </div>

                            <!-- Last name field -->
                            <div class="col-12">
                                <label for="last_name" class="form-label">Last Name<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter your last name" maxlength="30" required>
                                </div>
                            </div>

                            <!-- Email field -->
                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" maxlength="100" required>
                                </div>
                            </div>

                            <!-- Phone number field -->
                            <div class="col-12">
                                <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number" pattern="[0]{1}[0-9]{9}" title="Please enter valid phone number" required>
                                </div>
                            </div>

                            <!-- Password field -->
                            <div class="col-12">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Create your password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{4,}$" title="Password must contain the following: At least one uppercase letter. At least one lowercase letter. At least one digit. Minimum length of four characters." required>
                                </div>
                            </div>

                            <!-- Confirm password field -->
                            <div class="col-12">
                                <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm your password" required>
                                </div>
                            </div>

                            <!-- Register button -->
                            <div class="col-12">
                                <div class="d-grid">
                                    <br>
                                    <button class="btn btn-warning btn-lg" type="submit">Register</button>
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

    <!-- Initialize Firebase and handle registration form submission -->
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
            const database = firebase.database();
            const auth = firebase.auth();

            // Handle registration
            const form = document.getElementById('registerUserForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                //Get values from the registration form
                const fname = document.getElementById('fname').value;
                const lname = document.getElementById('lname').value;
                const email = document.getElementById('email').value;
                const phone = document.getElementById('phone').value;
                const password = document.getElementById('password').value;
                const confirm_password = document.getElementById('confirm_password').value;

                // Check if password and confirm password match
                if (password !== confirm_password) {
                    alert('Passwords do not match!');
                    return;
                }

                // Create user with email and password
                auth.createUserWithEmailAndPassword(email, password)
                    .then((userCredential) => {
                        // Signed in 
                        const user = userCredential.user;

                        // Create user data object
                        const userId = user.uid;
                        const userData = {
                            fname: fname,
                            lname: lname,
                            email: email,
                            phone: phone,
                        };

                        // Save user data to Firebase Database
                        database.ref('users/' + userId).set(userData)
                            .then(function() {
                                // Registration successful
                                alert('Registration successful!');
                                window.location.href = 'login.php';
                            })
                            .catch(function(error) {
                                // Registration failed
                                console.error('Error saving user data:', error);
                                alert('Error registering user. Please try again.');
                            });
                    })
                    .catch((error) => {
                        // Registration failed
                        console.error('Error creating user:', error);
                        alert('Error creating user: ' + error.message);
                    });
            });
        });
    </script>
</body>

</html>