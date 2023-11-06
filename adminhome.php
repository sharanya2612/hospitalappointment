<?php
session_start();
if(!isset($_SESSION["id"])){
    header('location:admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .admin-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
        .admin-container h2 {
            margin-bottom: 20px;
            color: #007bff;
        }
        .admin-container p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #555;
        }
        .admin-container a {
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            margin: 10px;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .admin-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h2>Welcome to Admin Home</h2>
        <p>Hello! You are logged in as an admin.</p>
        <p>This is your admin dashboard. You have access to various admin features.</p>
        <a href="add_dept.php">Add New Department</a>
        <a href="add_doctor.php">Add New Doctor</a>
        <a href="del_doctor.php">Delete Doctor</a>
        <a href="ratings.php">Ratings</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
