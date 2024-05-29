<?php
session_start();
include_once('connection.php');
include_once('auth_functions.php');

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
    <title>Grocery Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            padding: 10px;
            color: #fff;
            text-align: center;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            color: #343a40;
        }

        img {
            max-width: 20%;
            border-radius: 8px;
            margin-bottom: 50px;
        }

        p {
            margin: 0;
        }

        strong {
            font-weight: bold;
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
            margin-top: 20px;
        }

        .book-link:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: inline-block;
            background-color: #6c757d;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            margin-top: 20px;
        }

        .back-link:hover {
            background-color: #495057;
        }

        .tour-details {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .tour-details p {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <header>
        Grocery Details
        <a href="javascript:history.back()" class="back-link">Back</a>
    </header>

    <div class="content">
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

        // Fetch grocery details based on the grocery ID from the URL
        if (isset($_GET['id'])) {
            $groceryId = $_GET['id'];

            $stmt = $conn->prepare("SELECT * FROM groceries WHERE grocery_id = ?");
            $stmt->bind_param("i", $groceryId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Grocery found, display details
                $row = $result->fetch_assoc();
                echo '<div class="grocery-details">';
                echo '<h2>Grocery Details</h2>';
                echo '<img src="admin/uploads/' . basename($row['grocery_image']) . '" alt="Grocery Image">';
                echo '<p><strong>Name:</strong> ' . $row['grocery_name'] . '</p>';
                echo '<p><strong>Description:</strong> ' . $row['grocery_description'] . '</p>';
                echo '<p><strong>Details:</strong> ' . $row['details'] . '</p>';
                echo '<p><strong>Located at:</strong> ' . $row['where'] . '</p>';
                echo '<p><strong>Contact:</strong> ' . $row['contact'] . '</p>';
                echo '<p><strong>Grocery Price:</strong> $' . $row['item_price'] . '</p>';
                echo '<a href="#" class="book-link" onclick="confirmBooking(' . $groceryId . ')">Order Now</a>';
                echo '</div>';
            } else {
                echo '<p>No groceries found with the specified ID.</p>';
            }

            // Close the statement
            $stmt->close();
        } else {
            echo '<p>Grocery ID not provided!</p>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <script>
        function confirmBooking(groceryId) {
            if (confirm("Are you sure you want to order this grocery?")) {
                // Redirect to confirm_order.php with the grocery ID
                window.location.href = "confirm_order.php?id=" + groceryId;
            }
        }
    </script>
</body>

</html>
