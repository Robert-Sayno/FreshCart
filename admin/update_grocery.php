<?php
include('../auth/connection.php');

// Establish database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get tour ID and other form data
$grocery_id = $_POST['grocery_id'];
$grocery_name = $_POST['grocery_name'];
$grocery_description = $_POST['grocery_description'];
$item_price = $_POST['item_price'];
$detailas = $_POST['detai'];
$where = $_POST['where'];
$contact = $_POST['contact'];

// Prepare the SQL query
$sql = "UPDATE groceries SET grocery_name='$grocery_name', grocery_description='$grocery_description', item_price='$item_price', details='$details', where='$where', contact='$contact' WHERE grocery_id=$grocery_id";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('grocery updated successfully!'); window.location='display_tours.php';</script>";
   
    // Redirect to admin dashboard after updating echo "Tour updated successfully!";
} else {
    echo "Error updating Grocery information: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
