<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - FreshCart</title>
    <style>
        body {
            background-image: url('../tugume.jpeg');
            background-size: cover;
            background-position: center;
            color: #333;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 20%;
            background-color: #4CAF50;
            padding: 20px;
            box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.2);
        }

        .dashboard-container {
            width: 80%;
            padding: 20px;
        }

        h2 {
            color: #4CAF50;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin-top: 50px;
        }

        nav li {
            margin-bottom: 20px;
            font-size: 18px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #45a049;
        }

        .content-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .main-content {
            width: 70%;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 40px;
        }

        p {
            font-size: 18px;
            color: #333;
        }

        .logout-btn {
            display: inline-block;
            margin-top: 20px;
            color: white;
            background-color: #e74c3c;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <nav>
            <ul>
                <li><a href="display_users.php">Manage Users</a></li>
                <li><a href="display_messages.php">View Messages</a></li>
                <li><a href="display_grocery.php">Manage Orders</a></li>
            </ul>
        </nav>
    </div>

    <div class="dashboard-container">
        <h2>Welcome to the Admin Dashboard</h2>

        <div class="content-section">
            <div class="main-content">
                <p>Manage and monitor your platform with ease. Use the sidebar to navigate through different sections and take control of user data, messages, and grocery information.</p>
            </div>
        </div>

        <a class="logout-btn" href="logout.php">Logout</a>
    </div>
</body>

</html>
