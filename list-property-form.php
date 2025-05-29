<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <title> Mawanele - List Property Form </title>
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
                                <h1 class="fw-bolder">List Property</h1>
                            </div>
                        </div>
                    </div>

                    <!-- List property form -->
                    <form id="listPropertyForm">
                        <div class="row gy-3 gy-md-4 overflow-hidden">

                            <!-- Property type field -->
                            <div class="col-12">
                                <label for="property_type" class="form-label">Property Type <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select class="form-control" name="property_type" id="property_type" onchange="displayFormFields()">
                                        <option value="Select">Select</option>
                                        <option value="House">House</option>
                                        <option value="Townhouse">Townhouse</option>
                                        <option value="Apartment">Apartment</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Address field -->
                            <div class="col-12">
                                <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter property address" required>
                                </div>
                            </div>

                            <!-- Province field -->
                            <div class="col-12">
                                <label for="province" class="form-label">Province <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="province" id="province" placeholder="Enter province" required>
                                </div>
                            </div>

                            <!-- City field -->
                            <div class="col-12">
                                <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="city" id="city" placeholder="Enter city" required>
                                </div>
                            </div>

                            <!-- Suburb field -->
                            <div class="col-12">
                                <label for="suburb" class="form-label">Suburb <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="suburb" id="suburb" placeholder="Enter suburb" required>
                                </div>
                            </div>

                            <!-- Bedrooms field -->
                            <div class="col-12">
                                <label for="bedrooms" class="form-label">Bedrooms <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="bedrooms" id="bedrooms" placeholder="Enter the number of bedrooms" required>
                                </div>
                            </div>

                            <!-- Bathrooms field -->
                            <div class="col-12">
                                <label for="bathrooms" class="form-label">Bathrooms <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="bathrooms" id="bathrooms" placeholder="Enter the number of bathrooms" required>
                                </div>
                            </div>

                            <!-- Parking spaces field -->
                            <div class="col-12">
                                <label for="parking_spaces" class="form-label">Parking Spaces <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="parking_spaces" id="parking_spaces" placeholder="Enter the number of parking spaces" required>
                                </div>
                            </div>

                            <!-- Pets allowed field -->
                            <div class="col-12">
                                <label for="pets_allowed" class="form-label">Pets Allowed <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select class="form-control" name="pets_allowed" id="pets_allowed" onchange="displayFormFields()">
                                        <option value="Select">Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Erf-size field -->
                            <div class="col-12">
                                <label for="erf_size" class="form-label">Erf Size (m²)<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="erf_size" id="erf_size" placeholder="Enter the erf size" required>
                                </div>
                            </div>

                            <!-- Floor size field -->
                            <div class="col-12">
                                <label for="floor_size" class="form-label">Floor Size (m²)<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="floor_size" id="floor_size" placeholder="Enter the floor size" required>
                                </div>
                            </div>

                            <!-- Rates amount field -->
                            <div class="col-12">
                                <label for="rates_amount" class="form-label">Rates (R)<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="rates_amount" id="rates_amount" placeholder="Enter the rates and taxes amount" required>
                                </div>
                            </div>

                            <!-- Levies amount field -->
                            <div class="col-12">
                                <label for="levies_amount" class="form-label">Levies (R)<span class="text-danger"></span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="levies_amount" id="levies_amount" placeholder="Enter the levies amount">
                                </div>
                            </div>

                            <!-- Price field -->
                            <div class="col-12">
                                <label for="price" class="form-label">Price (R)<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="price" id="price" placeholder="Enter your asking price" required>
                                </div>
                            </div>

                            <!-- Agent email field -->
                            <div class="col-12">
                                <label for="agent_email" class="form-label">Agent Email <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="agent_email" id="agent_email" placeholder="Enter agent email" required>
                                </div>
                            </div>

                            <!-- Property thumbnail field -->
                            <div class="col-12">
                                <label for="property_thumbnail" class="form-label">Property Thumbnail (JPG) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="property_thumbnail" id="property_thumbnail" accept=".jpg" required>
                                </div>
                            </div>

                            <!-- ID document field -->
                            <div class="col-12">
                                <label for="user_id_document" class="form-label">Upload a certified copy of your ID (PDF) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="user_id_document" id="user_id_document" accept=".pdf" required>
                                </div>
                            </div>

                            <!-- Rates invoice field -->
                            <div class="col-12">
                                <label for="rates_invoice" class="form-label">Upload a copy of the most recent rates and taxes invoice (PDF) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="rates_invoice" id="rates_invoice" accept=".pdf" required>
                                </div>
                            </div>

                            <!-- Levies invoice field -->
                            <div class="col-12">
                                <label for="levies_invoice" class="form-label">Upload a copy of the most recent levies invoice (PDF) <span class="text-danger"></span></label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="levies_invoice" id="levies_invoice" accept=".pdf">
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="col-12">
                                <div class="d-grid">
                                    <br>
                                    <button class="btn btn-warning btn-lg" type="submit">Submit</button>
                                </div>
                            </div>

                            <!-- Back to user dashboard button -->
                            <center>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <br>
                                        <a href="user-dashboard.php"><button class="btn btn-secondary btn-lg" type="button">Back to dashboard</button></a>
                                    </div>
                                </div>
                            </center>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

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
            const storage = firebase.storage();

            const form = document.getElementById('listPropertyForm');

            //List property form submission
            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                // Get form values
                const propertyType = document.getElementById('property_type').value;
                const address = document.getElementById('address').value;
                const province = document.getElementById('province').value;
                const city = document.getElementById('city').value;
                const suburb = document.getElementById('suburb').value;
                const bedrooms = document.getElementById('bedrooms').value;
                const bathrooms = document.getElementById('bathrooms').value;
                const parkingSpaces = document.getElementById('parking_spaces').value;
                const petsAllowed = document.getElementById('pets_allowed').value;
                const erfSize = document.getElementById('erf_size').value;
                const floorSize = document.getElementById('floor_size').value;
                const ratesAmount = document.getElementById('rates_amount').value;
                const leviesAmount = document.getElementById('levies_amount').value || 0;
                const price = document.getElementById('price').value;
                const agentEmail = document.getElementById('agent_email').value;

                // Get the files
                const propertyThumbnail = document.getElementById('property_thumbnail').files[0];
                const userIdDocument = document.getElementById('user_id_document').files[0];
                const ratesInvoice = document.getElementById('rates_invoice').files[0];
                const leviesInvoice = document.getElementById('levies_invoice').files[0];

                // Check if the drop down values are still 'select'
                if (propertyType === 'select' || petsAllowed === 'select') {
                    alert('Please select a valid option for Property Type and Pets Allowed.');
                    return;
                }

                // Check if the agent's email exists in the 'agents' node
                const agentsRef = firebase.database().ref('agents');
                const agentExists = await agentsRef
                    .orderByChild('email')
                    .equalTo(agentEmail)
                    .once('value');

                if (!agentExists.exists()) {
                    alert('The agent email you entered does not exist. Please enter a valid agent email.');
                    return;
                }

                // Get the authenticated user's ID
                const user = firebase.auth().currentUser;
                const userId = user.uid;

                // Create a unique property ID
                const propertySubmissionId = database.ref().child('property_submissions').push().key;

                // Store the form data in Firebase Realtime Database
                const propertySubmissionData = {
                    propertySubmissionId,
                    propertyType,
                    address,
                    province,
                    city,
                    suburb,
                    bedrooms,
                    bathrooms,
                    parkingSpaces,
                    petsAllowed,
                    erfSize,
                    floorSize,
                    ratesAmount,
                    leviesAmount,
                    price,
                    agentEmail,
                    userId
                };

                await database.ref('property_submissions/' + propertySubmissionId).set(propertySubmissionData);

                // Function to upload files to Firebase Storage
                async function uploadFile(file, folder, fileName) {
                    const storageRef = storage.ref().child(`${folder}/${fileName}`);
                    await storageRef.put(file);
                    return storageRef.getDownloadURL();
                }

                // Sanitize the address before using it in file names
                const sanitizedAddress = sanitizeFileName(address);

                // Upload files to Firebase Storage and get the URLs
                const thumbnailUrl = await uploadFile(propertyThumbnail, 'property-thumbnail-submissions', `${sanitizedAddress}-${propertySubmissionId}-thumbnail.jpg`);
                const idDocumentUrl = await uploadFile(userIdDocument, 'id-document-submissions', `${sanitizedAddress}-${propertySubmissionId}-id-document.pdf`);
                const ratesInvoiceUrl = await uploadFile(ratesInvoice, 'rates-invoice-submissions', `${sanitizedAddress}-${propertySubmissionId}-rates-invoice.pdf`);
                let leviesInvoiceUrl = null;

                if (leviesInvoice) {
                    leviesInvoiceUrl = await uploadFile(leviesInvoice, 'levies-invoice-submissions', `${sanitizedAddress}-${propertySubmissionId}-levies-invoice.pdf`);
                }

                // Update property data with file URLs in Realtime Database
                await database.ref('property_submissions/' + propertySubmissionId).update({
                    thumbnailUrl,
                    idDocumentUrl,
                    ratesInvoiceUrl,
                    leviesInvoiceUrl
                });

                alert("Your form has been successfully submitted! Your selected agent will get back to you soon.");
                window.location.href = 'user-dashboard.php'

            });

            // Function to sanitize the address
            function sanitizeFileName(address) {
                return address.replace(/[^a-zA-Z0-9]/g, '-').toLowerCase();
            }

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