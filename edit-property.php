<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-database-compat.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Property</h1>
        <form id="edit-property-form" class="mt-4">
            <!-- Form Fields for Property Information -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" class="form-control" required>
            </div>
            <!-- Add similar input fields for other properties -->
            <div class="mb-3">
                <label for="bedrooms" class="form-label">Bedrooms</label>
                <input type="number" id="bedrooms" class="form-control" required>
            </div>
            <!-- Add more form fields as needed -->
            <button type="submit" class="btn btn-primary">Update Property</button>
        </form>
    </div>

    <script>
        // Firebase Config
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
        firebase.initializeApp(firebaseConfig);
        const database = firebase.database();
        const propertyId = new URLSearchParams(window.location.search).get('id');
        const propertiesRef = database.ref('properties/' + propertyId);

        // Fetch property data
        propertiesRef.once('value').then((snapshot) => {
            const property = snapshot.val();
            if (property) {
                document.getElementById('address').value = property.address;
                document.getElementById('bedrooms').value = property.bedrooms;
                // Populate other fields as well
            } else {
                alert('Property not found');
            }
        });

        // Update property
        document.getElementById('edit-property-form').addEventListener('submit', (e) => {
            e.preventDefault();
            const updatedProperty = {
                address: document.getElementById('address').value,
                bedrooms: document.getElementById('bedrooms').value,
                // Add other fields to be updated
            };

            propertiesRef.update(updatedProperty)
                .then(() => {
                    alert('Property updated successfully');
                    window.location.href = 'manage-properties.php';
                })
                .catch((error) => {
                    console.error('Error updating property:', error);
                });
        });
    </script>
</body>
</html>
