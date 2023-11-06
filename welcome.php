<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MedAppoint</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(rgba(162, 170, 183, 0.6),rgba(108, 109, 104, 0.6)),url("img1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .navbar{
            position: absolute;
            left:0;
            top: 0;
            background-color:  #0056b3; /* Updated color */
            width:100%;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-weight: bolder;
        }
        .navbar a:hover {
            background-color: #ff0022; /* Updated color */
        }
        .welcome-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .welcome-container h1 {
            margin-bottom: 10px;
            color: #c6121b;
        }
        .welcome-container p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #0056b3;
        }
        .btn-start {
            background-color: #ff0022; /* Updated color */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }
</style>
</head>
<body>
    <div class="navbar">
        <a href="admin.php">Admin Login</a>
        <a href="doctor.php">Doctor Login</a>
    </div>
    <div class="welcome-container">
        <h1>Welcome to MedAppoint</h1>
        <p>Your Convenient Hospital Appointment Solution</p>
        <p>Book appointments with ease and manage your health schedule effortlessly.</p>
        <a href="user.php" class="btn-start">Get Started</a>
       
    </div>
</body>
</html>
