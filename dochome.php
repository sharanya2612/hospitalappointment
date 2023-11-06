<?php
session_start();
if (!isset($_SESSION['id'])){
    header('location:doctor.php');
}
include("connection.php");

$id = $_SESSION['id'];
$name = $_SESSION['name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: rgb(230, 255, 255);
        }

        h1 {
            color: #333;
        }

        .container {
            margin: 50px auto;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .link {
            display: block;
            margin: 20px 0;
            font-size: 18px;
            text-decoration: none;
            color: #007BFF;
        }

        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1><?php echo "Welcome, Doctor $name";?></h1>
        <p>Choose an option below:</p>
        <a href="today.php" class="link">1. Today's Appointments</a>
        <a href="future.php" class="link">2. Future Appointments</a>
        <a href="patient_records.php" class="link">3. Access Patient Records</a>
        <a href="logout.php" class="link">4. Logout</a>
    </div>
</body>
</html>
