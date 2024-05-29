<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Grocery - FreshCart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #4CAF50; /* Green theme color for FreshCart */
            color: white;
            padding: 10px 20px;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #333;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            background-color: #4CAF50; /* Green theme color for FreshCart */
            transition: background-color 0.3s;
        }
        nav a:hover {
            background-color: #45a049; /* Darker green for hover effect */
        }
        form {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4CAF50; /* Green theme color for FreshCart */
        }
        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049; /* Darker green for hover effect */
        }
    </style>
</head>
<body>

<header>
    <h1>Add Grocery - FreshCart</h1>
</header>

<nav>
    <a href="#">Home</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Contact</a>
</nav>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <h2>Add Grocery</h2>
    <label for="grocery_name">Grocery Name:</label>
    <input type="text" id="grocery_name" name="grocery_name" required><br>

    <label for="grocery_description">Grocery Description:</label>
    <textarea id="grocery_description" name="grocery_description" rows="4" required></textarea><br>

    <label for="item_price">Price:</label>
    <input type="text" id="item_price" name="item_price" required><br>

    <label for="details">Details:</label>
    <input type="text" id="details" name="details"><br>

    <label for="where">Which market:</label>
    <input type="text" id="where" name="where"><br>

    <label for="contact">Contact person:</label>
    <input type="text" id="contact" name="contact"><br>

    <label for="grocery_image">Grocery Image:</label>
    <input type="file" id="grocery_image" name="grocery_image"><br>

    <input type="submit" value="Add Grocery">
</form>

<?php
// Database connection parameters
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'FreshCart';

// Check if there is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create a new mysqli connection using the provided parameters
    $conn = new mysqli($server, $username, $password, $database);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $grocery_name = $_POST['grocery_name'];
    $grocery_description = $_POST['grocery_description'];
    $item_price = $_POST['item_price'];
    $details = $_POST['details'];
    $where = $_POST['where'];
    $contact = $_POST['contact'];

    // Handle image upload
    $targetDirectory = "/opt/lampp/htdocs/FreshCart/admin/uploads/";

    // Create the uploads directory if it doesn't exist
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0775, true); // Set the appropriate permission (read/write/execute for owner and group, read/execute for others)
    }

    $targetFile = $targetDirectory . basename($_FILES["grocery_image"]["name"]);

    if (move_uploaded_file($_FILES["grocery_image"]["tmp_name"], $targetFile)) {
        // Image uploaded successfully, now insert the grocery details into the database
        $grocery_image = $targetFile;

        // Prepare SQL statement to insert data into the groceries table
        $sql = "INSERT INTO groceries (grocery_name, grocery_description, item_price, details, `where`, contact, grocery_image) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $grocery_name, $grocery_description, $item_price, $details, $where, $contact, $grocery_image);

        // Execute the SQL query
        if ($stmt->execute()) {
            echo "<p>New grocery added successfully</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<p>Sorry, there was an error uploading your file.</p>";
    }

    // Close the database connection
    $conn->close();
}
?>

</body>
</html>
