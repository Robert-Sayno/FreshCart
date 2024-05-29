<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
        }

        #photo-container {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.7; /* Adjust the opacity as needed */
        }

        #photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #landing-container {
            text-align: center;
            color: #333;
            padding: 100px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            animation: fadeInUp 1.5s ease-out;
            color: #4CAF50; /* Green color for FreshCart theme */
        }

        #links {
            font-size: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            animation: fadeInUp 2s ease-out;
        }

        a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            background-color: #4CAF50; /* Green color for FreshCart theme */
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #45a049; /* Darker green for hover effect */
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <title>FreshCart</title>
</head>
<body>
    <div id="photo-container">
        <img src="grocery.jpeg" alt="Fresh groceries">
    </div>

    <div id="landing-container">
        <h1>Welcome to FreshCart</h1>
        <div id="links">
            <a href="about_us.php">About Us</a>
            <a href="contact_us.php">Contact Us</a>
            <a href="auth/signup.php">Sign Up</a>
            <a href="auth/login.php">Login</a>
            <!-- Add more links as needed -->
        </div>
    </div>
</body>
</html>
