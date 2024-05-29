<?php
// Set error reporting to display all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session
session_start();

// Include the database connection file
include_once('auth/connection.php');

// Check if the tour ID is provided in the GET request
if (isset($_GET['id'])) {
    $groceryId = $_GET['id'];

    // Check if the user email is set in the session
    if (isset($_SESSION['username'])) {
        $userEmail = $_SESSION['username']; // Get user email from the session

        // Check if the user has already booked this tour
        $checkBookingSql = "SELECT * FROM bookings WHERE grocery_id = ? AND user_email = ?";
        $checkStmt = $conn->prepare($checkBookingSql);
        $checkStmt->bind_param("is", $groceryId, $userEmail);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // User has already booked this tour
            echo '<script>alert("You have already ordered for this grocery.");';
            echo 'setTimeout(function() { window.location.href = "groceries.php"; }, 1000);</script>';            
            exit();
        } else {
            // User has not booked this tour, proceed with booking
            $getUserSql = "SELECT id, username FROM tbl_user WHERE username = ?";
            $stmt = $conn->prepare($getUserSql);
            $stmt->bind_param("s", $userEmail);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // User found, retrieve user details
                $user = $result->fetch_assoc();
                $userId = $user['id'];
                $userName = $user['username'];

                // Generate a random reference tracing number
                $referenceNumber = uniqid('REF') . mt_rand(1000, 9999);

                // Insert booking details into the database
                $insertBookingSql = "INSERT INTO bookings (grocery_id, user_id, user_name, user_email, reference_number) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($insertBookingSql);
                $stmt->bind_param("iisss", $groceryId, $userId, $userName, $userEmail, $referenceNumber);

                if ($stmt->execute()) {
                    // Booking successful
                    echo '<script>';
                    echo 'alert("Booking successful, we shall contact you soon! Your Reference Number is: ' . $referenceNumber . '");';
                    echo 'window.location.href = "groceries.php";'; // Redirect to tours page
                    echo '</script>';
                    exit();
                } else {
                    // Booking failed
                    echo '<script>alert("Error: ' . $stmt->error . '");</script>';
                }
            } else {
                // User not found with the provided email
                echo "User not found!";
            }
        }
    } else {
        // User email is not set in the session
        echo '<script>alert("You must be logged in to book a tour.");</script>';
    }
} else {
    // Tour ID not provided in the GET request
    // No need for pop-up script
}
?>
