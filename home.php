<?php
session_start();
if(!isset($_SESSION["id"])){
    header('location:user.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Appointment System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
            background-image:linear-gradient(rgba(162, 170, 183, 0.3),rgba(108, 109, 104, 0.4)), url("img2.jpg");
            background-size: cover;
            background-attachment: fixed;

        }
        .sidebar {
            background: url("side.jpg") no-repeat;
            background-size: cover;
            color: white;
            width: 250px;
            padding-top: 20px;
            display: block;
        }
        .content {
            flex: 1;
            padding: 20px;
            font-size: x-large;
           
        }
        .sidebar a, .sidebar a:visited {
            display: block;
            padding: 30px;
            color: black;
            text-decoration: none;
            font-size: x-large;
            font-weight: bold;
           
        }
        .sidebar a:hover {
            background-color: #e9c5e5;
        }
        .main-title {
            color: rgb(204, 221, 18);
            margin-bottom: 20px;
           
        }
        .description {
            margin-bottom: 20px;
        }
        p{
            color: white;
            font-weight: 700;
        }
        ul{
            color: white;
            font-weight: 700;
            
        }
        h2{
            color: black;
            font-weight: 800;
        }
        #mail{
            margin: 0;
            padding:0;
            background-color: black;
        }
        ::marker{
            color: #070707;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a href="book.php">Register Patient</a>
        <a href="appointment.php">Book your Appointment</a>
        <a href="dept.php">Department</a>
        <a href="search.php">Doctors</a>
        <a href="about.php">About Us</a>
        <a href="feedback.php">Feedback</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content">
        <h1 class="main-title"><marquee>Welcome to the MedAppoint</marquee></h1>
        <p class="description">Streamline your healthcare experience by using our advanced appointment system. 
        Choose the appropriate option from the sidebar to get started.</p>
        <h2>Features:</h2>
        <ul>
            <li>Effortlessly schedule appointments online</li>
            <li>Access doctor schedules and available time slots</li>
            <li>View and manage your medical appointments</li>
            <li>Administer and configure system settings</li>
        </ul>
        
    </div>
   
</body>
</html>
