<?php
// Include necessary files and authentication check
include_once('../auth/connection.php');
include_once('../auth/auth_functions.php');

// Fetch tours from the database
$sql_tours = "SELECT * FROM groceries";
$result_tours = mysqli_query($conn, $sql_tours);

// Check if the query was successful
if ($result_tours) {
    $tours = mysqli_fetch_all($result_tours, MYSQLI_ASSOC);
} else {
    // Handle the error, you can customize this part based on your needs
    die('Error fetching groceries: ' . mysqli_error($conn));
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Groceries</title>
    <style>
        body {
            background-image: url('lost_property_bg.jpg');
            background-size: cover;
            background-position: center;
            color: #7734eb;
            font-family: Arial, sans-serif;
        }

        .dashboard-container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
        }

        .dashboard-section {
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            overflow: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .property-image {
            max-width: 100%;
            max-height: 100px;
        }

        .logout-btn {
            color: #fff;
            background-color: #e74c3c;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
    <!-- Add your styles here if needed -->
    <!-- Add your styles here if needed -->
</head>

<body>
    <div class="dashboard-container">
        <h2>Welcome to the Admin Dashboard - Groceries</h2>

        <!-- Display tours in a table -->
        <div class="dashboard-section">
            <h3>Ordered Groceries Details</h3>
            <table>
                <thead>
                    <tr>
                        <th>Grocery ID</th>
                        <th>Grocery Name</th>
                        <th>Grocery Description</th>
                        <th>Details</th>
                        <th>Where it is located</th>
                        <th>Contact info</th>
                        <th>Item Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tours as $tour) : ?>
                        <tr>
                            <td><?php echo $tour['grocery_id']; ?></td>
                            <td><?php echo $tour['grocery_name']; ?></td>
                            <td><?php echo $tour['grocery_description']; ?></td>
                            <td><?php echo $tour['details']; ?></td>
                            <td><?php echo $tour['where']; ?></td>
                            <td><?php echo $tour['contact']; ?></td>
                            <td><?php echo $tour['item_price']; ?></td>
                            <td>
                            <a href="edit_grocery.php?id=<?php echo $tour['grocery_id']; ?>">Edit</a>
                            <a href="grocery_tour.php?id=<?php echo $tour['grocery_id']; ?>" onclick="return confirm('Are you sure you want to delete this grocery item?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Add more content specific to the groceries section if needed -->

        <p><a class="logout-btn" href="logout.php">Logout</a></p>
    </div>
</body>

</html>
