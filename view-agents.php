<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mawanele - View Agents</title>
    <link rel="icon" type="image/x-icon" href="/images/mawanele-logo-2.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Firebase SDKs -->
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-database-compat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.10.0/firebase-storage-compat.js"></script>
</head>

<body class="bg-dark">

    <center>
        <img src="images/mawanele-logo-1.png" width="215" height="100" alt="Mawanele Logo 1">
    </center>

    <br>

    <div class="container">

        <div id="agent-cards" class="row gy-4 row-cols-3"></div>

    </div>

    <br><br>

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

            //Reference to agents node
            const agentsRef = database.ref('agents');

            // Fetch data from the agents node
            agentsRef.once('value', (snapshot) => {
                const agents = snapshot.val();
                const agentsContainer = document.getElementById('agent-cards');
                agentsContainer.innerHTML = '';

                // Loop through each agent and create a card
                for (const agentId in agents) {
                    const agent = agents[agentId];

                    const agentCard = `
                <div class="col">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <center>
                                    <img src="images/default-profile-picture-1.png" class="img-fluid rounded-start" alt="Agent Profile Picture">
                                </center>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <h5 class="card-title">${agent.fname} ${agent.lname}</h5>
                                        </li>
                                        <li class="list-group-item"><b>Email:</b> ${agent.email}</li>
                                        <li class="list-group-item"><b>Phone:</b> ${agent.phone}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                    // Append the new card to the container
                    agentsContainer.innerHTML += agentCard;
                }
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