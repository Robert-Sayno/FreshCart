<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - FreshCart</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('tugume.jpeg'); /* Replace with your background image */
            background-size: cover;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        nav a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            background-color: #4CAF50; /* Green color for FreshCart theme */
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #45a049; /* Darker green for hover effect */
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        section {
            max-width: 800px;
            margin: 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: justify;
        }

        h1 {
            color: #4CAF50; /* Green color for FreshCart theme */
        }

        p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <header>
        <h1>About Us</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="tours.php">Tours</a>
            <a href="about_us.php">About Us</a>
            <!-- Add more links as needed -->
        </nav>
    </header>

    <main>
        <section>
            <!-- <img src="tugume.jpeg" alt="FreshCart Team"> -->
            <h1>Our Story</h1>
            <p>Welcome to FreshCart, where freshness meets convenience. We are passionate about providing the freshest groceries and delivering them right to your doorstep.</p>
            
            <h1>Our Mission</h1>
            <p>At FreshCart, our mission is to create a seamless grocery shopping experience by connecting people with fresh produce and supporting local farmers. We believe in responsible sourcing that leaves a positive impact on both customers and the environment.</p>
            
            <h1>Meet Our Team</h1>
            <p>Our dedicated team is comprised of experienced professionals who are committed to ensuring your grocery shopping is not only convenient but also sustainable and enjoyable.</p>
        </section>
    </main>
</body>
</html>
