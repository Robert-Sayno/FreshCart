<?php
session_start();
include_once('connection.php');
include_once('auth_functions.php');

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['name'])) {
    // Redirect the user to the login page
    header("Location: auth/login.php");
    exit(); // Stop further execution of the script
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            padding: 10px;
            color: #fff;
            text-align: center;
            font-size: 24px;
        }

        .nav-links {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #343a40;
            color: #fff;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
        }

        .nav-links .user-info {
            margin-left: auto;
        }

        .tour-card {
            width: 300px;
            margin: 20px;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            transition: transform 0.3s ease-in-out;
        }

        .tour-card:hover {
            transform: scale(1.05);
        }

        .tour-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .tour-details {
            text-align: left;
        }

        h3, p {
            margin: 0;
        }

        .tour-price {
            font-weight: bold;
            color: #28a745;
        }

        .book-link {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }
        .book-link:hover {
            background-color: #0056b3;
        }

        /* Add styles for the modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        .close-btn {
            color: #333;
            float: right;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }
        /* Logout button styles */
.logout-btn {
    background-color: #dc3545;
    color: #fff;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    text-decoration: none;
    cursor: pointer;
}

.logout-btn:hover {
    background-color: #c82333;
}

    </style>
</head>
<body>
<header>
    <div class="nav-links">
        <div>
            <a href="#">Home</a>
            <a href="booked_groceries.php">Your groceries</a>
            <a href="#">Contact</a>
        </div>
        <div class="user-info">
            <?php
            if (isset($_SESSION['name'])) {
                echo '<span>Welcome, ' . $_SESSION['username'] . '</span>';
                echo '<a href="logout.php" class="logout-btn">Logout</a>'; // Add logout button
            } else {
                echo '<a href="auth/login.php">Login</a>';
            }
            ?>
        </div>
    </div>
</header>

<!-- Tour cards section -->
<?php
// Database connection parameters
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'FreshCart';

// Create a new mysqli connection using the provided parameters
$conn = new mysqli($server, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    // If the connection fails, terminate the script and display the MySQL error.
    die("Connection failed: " . $conn->connect_error);
}

// Fetch tour details from the database
$sql = "SELECT * FROM groceries";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display each tour as a card with a book button that opens a modal
        $imagePath = 'admin/uploads/' . basename($row['grocery_image']);
        echo '<div class="tour-card">';
        echo '<img src="' . $imagePath . '" alt="grocery Image" class="tour-image">';
        echo '<div class="tour-details">';
        echo '<h3>' . $row['tour_name'] . '</h3>';
        echo '<p>' . $row['grocery_description'] . '</p>';
        echo '<p>Duration: ' . $row['grocery_duration'] . '</p>';
        echo '<p>Located at: ' . $row['where'] . '</p>';
        echo '<p>Contact: ' . $row['contact'] . '</p>';
        echo '<p class="tour-price">$' . $row['item_price'] . '</p>';
        echo '<a href="grocery_details.php?id=' . $row['grocery_id'] . '" class="book-link">Book Now</a>';

        echo '</div>';
        echo '</div>';
        }
        } else {
            echo '<p>No groceries found.</p>';
        }
        
        // Close the database connection
        $conn->close();
        ?>
        </body>
        </html>
        
