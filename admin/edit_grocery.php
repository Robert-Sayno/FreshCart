<?php
include('../auth/connection.php');

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get tour ID from the URL
$tour_id = $_GET['id']; // Assuming the tour ID is passed as 'id' in the URL

// Fetch tour details from the database
$sql = "SELECT * FROM tours WHERE tour_id = $tour_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $tour_name = $row['tour_name'];
    $tour_description = $row['tour_description'];
    $tour_price = $row['tour_price'];
    $tour_duration = $row['tour_duration'];
    $tour_location = $row['tour_location'];
    $tour_guide = $row['tour_guide'];
} else {
    echo "groceries not found!";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit grocery - Freshcart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="dashboard.php">Admin Dashboard</a>
</div>

<div class="container">
    <h1>Edit Tour</h1>
    <form action="update_tour.php" method="post">
        <input type="hidden" name="grocery_id" value="<?php echo $grocery_id; ?>">

        <label for="grocery_name">Grocery Name:</label>
        <input type="text" id="grocery_name" name="grocery_name" value="<?php echo $grocery_name; ?>" required>

        <label for="grocery_description">Grocery Description:</label>
        <textarea id="grocery_description" name="grocery_description" required><?php echo $grocery_description; ?></textarea>

        <label for="item_price">Item Price:</label>
        <input type="text" id="item_price" name="item_price" value="<?php echo $tour_price; ?>" required>

        <label for="details">Details:</label>
        <input type="number" id="details" name="details" value="<?php echo $details; ?>" required>

        <label for="where">where is the item:</label>
        <input type="text" id="where" name="where" value="<?php echo $where; ?>" required>

        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" value="<?php echo $contact; ?>" required>

        <button type="submit">Update Groceries</button>
    </form>
</div>

</body>
</html>
