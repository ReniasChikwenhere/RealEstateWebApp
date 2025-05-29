<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Transactions</title>
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
                    <img src="images/deals-icon.png" alt="Properties Icon" width="18" height="18" style="margin-right: 10px;"> Close Deals
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="property-interests.php" style="color: white; font-weight: bold; font-size: 0.85rem; display: flex; align-items: center; text-decoration: none;">
                    <img src="images/interests.png" alt="Interests Icon" width="18" height="18" style="margin-right: 10px;"> View Property Interests
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
    
    <!-- Main content -->
    <div style="margin-left: 250px; padding: 20px; flex-grow: 1;">
        <div class="container bg-secondary text-white p-3 rounded mb-4">
            <h1 class="mt-5">Manage Transactions</h1>
        </div>
        <div class="container">
            <h2 class="text-white mt-4">User Transactions:</h2>
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover mt-4">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Property ID</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="transactions-list">
                        <!-- Transactions will be dynamically loaded here -->
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
        const transactionsRef = database.ref('transactions');
        const transactionsDoneRef = database.ref('transactions_completed');
        const transactionsPendingRef = database.ref('transactions_pending');


        function loadTransactions() {
    transactionsRef.on('value', (snapshot) => {
        const transactions = snapshot.val();
        const transactionsList = document.getElementById('transactions-list');
        transactionsList.innerHTML = '';

        if (transactions) {
            Object.keys(transactions).forEach((key) => {
                const transaction = transactions[key];
                const transactionRow = `
                    <tr>
                        <td>${transaction?.userName || 'N/A'}</td>
                        <td><a href="mailto:${transaction?.email || 'N/A'}">${transaction?.email || 'N/A'}</a></td>
                        <td>${transaction?.phone || 'N/A'}</td>
                        <td>${transaction?.propertyId || 'N/A'}</td>
                        <td>${transaction?.comment || 'N/A'}</td>
                        <td>
                            <button class="btn btn-success btn-sm" onclick="markAsDone('${key}', ${JSON.stringify(transaction).replace(/"/g, '&quot;')})">Mark as Done</button><br><br>
                            <button class="btn btn-warning btn-sm" onclick="markAsIncomplete('${key}', ${JSON.stringify(transaction).replace(/"/g, '&quot;')})">Mark as Incomplete</button><br><br>
                            <textarea id="note-${key}" class="form-control note-input mb-2" placeholder="Enter your important notes here...">${transaction?.note?.text || ''}</textarea>
                            <button class="btn btn-primary btn-sm" onclick="saveNote('${key}')">Save Note</button><br>
                            ${transaction?.note ? `<button class="btn btn-danger btn-sm mt-2" onclick="deleteNote('${key}')">Remove Your Note</button>` : ""}
                            ${transaction?.note ? `<p class="mt-2"><strong>Note:</strong> ${transaction.note.text}</p><p><em>${transaction.note.timestamp}</em></p>` : ""}
                            <br><br><button class="btn btn-danger btn-sm" onclick="removeTransaction('${key}')">Remove Client From Transactions Process</button><br><br>
                        </td>
                    </tr>
                `;
                transactionsList.insertAdjacentHTML('beforeend', transactionRow);
            });
        } else {
            // Display message when no transactions are available
            transactionsList.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center">No transactions are in process yet.</td>
                </tr>
            `;
        }
    });
}


function markAsDone(key, transaction) {
    console.log("Marking as done:", key, transaction);
    transactionsDoneRef.child(key).set(transaction)
        .then(() => transactionsRef.child(key).remove()) // Move and then delete
        .then(() => {
            alert("Transaction marked as done.");
            loadTransactions(); // Reload the list to reflect changes
        })
        .catch((error) => {
            console.error("Error moving transaction to completed:", error);
            alert("An error occurred while marking the transaction as done. Please try again.");
        });
}


function markAsIncomplete(key, transaction) {
    console.log("Marking as incomplete:", key, transaction);
    transaction.status = "In Progress"; // Add 'In Progress' status
    transactionsPendingRef.child(key).set(transaction)
        .then(() => transactionsRef.child(key).remove()) // Move and then delete
        .then(() => {
            alert("Transaction marked as incomplete.");
            loadTransactions(); // Reload the list to reflect changes
        })
        .catch((error) => {
            console.error("Error moving transaction to pending:", error);
            alert("An error occurred while marking the transaction as incomplete. Please try again.");
        });
}


// Function to save note with timestamp
function saveNote(key) {
    const noteContent = document.getElementById(`note-${key}`).value;
    if (!noteContent.trim()) {
        alert("Please enter a note before saving.");
        return;
    }

    const noteData = {
        text: noteContent,
        timestamp: new Date().toLocaleString()
    };

    transactionsRef.child(key).update({ note: noteData })
        .then(() => {
            alert("Note saved successfully.");
            loadTransactions(); // Reload to show the updated note with timestamp
        })
        .catch((error) => {
            console.error("Error saving note:", error);
            alert("An error occurred while saving the note. Please try again.");
        });
}

 // Delete note function
 function deleteNote(key) {
            if (confirm("Are you sure you want to delete this note?")) {
                transactionsRef.child(key).child('note').remove()
                    .then(() => {
                        alert("Note deleted successfully.");
                        loadTransactions();
                    })
                    .catch((error) => {
                        console.error("Error deleting note:", error);
                        alert("An error occurred while deleting the note. Please try again.");
                    });
            }
        }


// Function to remove transaction
function removeTransaction(key) {
            if (confirm("Are you sure you want to remove this transaction process?")) {
                transactionsRef.child(key).remove()
                    .then(() => {
                        alert("Transaction has been successfully removed.");
                        loadTransactions();
                    })
                    .catch((error) => {
                        console.error("Error removing transaction:", error);
                        alert("An error occurred while removing the transaction. Please try again.");
                    });
            }
        }

        // Load transactions on page load
        loadTransactions();
    </script>
</body>
</html>

       