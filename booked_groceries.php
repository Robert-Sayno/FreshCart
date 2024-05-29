<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Tours</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .nav-menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .nav-menu h1 {
            margin: 0;
        }

        .nav-menu a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .card h3 {
            margin-top: 0;
        }

        .card p {
            margin: 10px 0;
        }

        .cancel-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .cancel-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="nav-menu">
        <h1>ordered groceries</h1>
        <a href="groceries.php">View All groceries</a>
    </div>

    <?php
    // Start session to access session variables
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION['username'])) {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit();
    }

    // Include database connection
    include_once('auth/connection.php');

    // Retrieve user's booked tours from the database
    $userEmail = $_SESSION['username']; // Assuming the email is stored in the session
    $sql = "SELECT * FROM bookings WHERE user_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user has booked any tours
    if ($result->num_rows > 0) {
        // User has booked tours, display them
        while ($row = $result->fetch_assoc()) {
            // Retrieve tour details from the tours table using the tour_id from the bookings table
            $groceryId = $row['grocery_id'];
            $tourSql = "SELECT * FROM groceries WHERE grocery_id = ?";
            $tourStmt = $conn->prepare($tourSql);
            $tourStmt->bind_param("i", $groceryId);
            $tourStmt->execute();
            $tourResult = $tourStmt->get_result();
            $tourRow = $tourResult->fetch_assoc();
            ?>
            <div class="card">
                <h3>Grocery Name: <?php echo $tourRow['grocery_name']; ?></h3>
                <img src="admin/uploads/<?php echo $tourRow['grocery_image']; ?>" alt="Grocery Image" style="max-width: 100%;">
                <p>Description: <?php echo $tourRow['grocery_description']; ?></p>
                <p>Duration: <?php echo $tourRow['details']; ?></p>
                <p>where is it located: <?php echo $tourRow['where']; ?></p>
                <p>Guide: <?php echo $tourRow['contact']; ?></p>
                <p>Price: $<?php echo $tourRow['item_price']; ?></p>
                <p>Booking Date: <?php echo $row['booking_date']; ?></p>
                <!-- Option to cancel booking -->
                <form method="post" action="cancel_booking.php">
                    <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                    <button type="submit" class="cancel-btn">Cancel Booking</button>
                </form>
            </div>
            <?php
        }
    } else {
        // User has not booked any tours
        echo "<p>No ordered groceries yet</p>";
    }

    // Close database connections
    $tourStmt->close();
    $stmt->close();
    $conn->close();
    ?>
</div>

</body>
</html>
