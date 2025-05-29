<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title> Mawanele - Interest in Property Form </title>
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
                                <h1 class="fw-bolder">Interest in Property</h1>
                            </div>
                        </div>
                    </div>

                    <!-- Interest in property form -->
                    <form id="interestPropertyForm">
                        <div class="row gy-3 gy-md-4 overflow-hidden">

                            <!-- Property ID field (Already defined) -->
                            <div class="col-12">
                                <label for="propertyId" class="form-label">Property ID: <span class="text-danger"></span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="propertyId" id="propertyId" value="" readonly>
                                </div>
                            </div>

                            <!-- Comment field -->
                            <div class="col-12">
                                <label for="comment" class="form-label">Comment <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <textarea class="form-control" name="comment" id="comment" rows="4" cols="50" maxlength="500" required></textarea>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="col-12">
                                <div class="d-grid">
                                    <br>
                                    <button class="btn btn-warning btn-lg" type="submit">Submit</button>
                                </div>
                            </div>
                        </div>

                        <!-- Back to view properties page -->
                        <center>
                            <div class="col-12">
                                <div class="d-grid">
                                    <br>
                                    <a href="view-properties.php"><button class="btn btn-secondary btn-lg" type="button">Back to view properties</button></a>
                                </div>
                            </div>
                        </center>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            // Retrieve the propertyId from the URL
            const urlParams = new URLSearchParams(window.location.search);
            const propertyId = urlParams.get('propertyId');
            console.log('Retrieved propertyId:', propertyId);

            // Pre-fill the hidden propertyId field in the form
            document.getElementById('propertyId').value = propertyId;

            // Handle form submission
            const form = document.getElementById('interestPropertyForm');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                const comment = document.getElementById('comment').value;

                // Get the authenticated user's ID
                const user = firebase.auth().currentUser;
                const userId = user.uid;

                // Create a reference to the property_interest node in Firebase
                const interestRef = database.ref('property_interest').push();

                // Submit the form data to Firebase
                interestRef.set({
                    propertyId: propertyId,
                    userId: userId,
                    comment: comment
                }).then(() => {
                    alert('Thank you, your interest in this property has been submitted successfully! The agent will get back to you soon.');
                    window.location.href = 'user-dashboard.php';
                }).catch((error) => {
                    console.error('Error submitting interest:', error);
                });

            });

            // Check if the user is logged in
            firebase.auth().onAuthStateChanged(function(user) {
                if (user) {
                    // User is logged in
                    console.log('User is logged in:', user.email);
                } else {
                    // User is not logged in, redirect them back to the login page
                    alert('Please log in to access this page!');
                    window.location.href = 'login.php';
                }
            });

        });
    </script>

</body>

</html>