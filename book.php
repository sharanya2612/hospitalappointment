<?php
session_start();
if(!isset($_SESSION["id"])){
    header('location:user.php');
}
include("connection.php");

    if(isset($_POST["submit"])){
            $name=$_POST["name"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $gender=$_POST["gender"];
            $dob=$_POST['dob'];
            $todaydate =date('Y-m-d');        
            if(empty($name) OR empty($email) OR empty($gender) OR empty($dob) OR empty($phone)){
                echo'<Script>alert("All fields are required")</Script>';
            }
            else{
                if($dob>$todaydate){
                    echo'<Script>alert("Enter valid Date of Birth")</Script>';
                }
                else{
                    $insert="INSERT INTO patient(PName,PEmail,PGender,Phone,Pdob) VALUES ('$name','$email','$gender','$phone','$dob')";
                    mysqli_query($conn,$insert);
                    echo'<Script>alert("Patient successfully registered");
                    window.location.href="home.php"</Script>';
                    }
            }
            
            }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book My Appointment</title>
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
            background-image:linear-gradient(rgba(160, 170, 183, 0.4),rgba(108, 109, 104, 0.5)), url("appoint.jpg");
            background-size: cover;
        }
        .booking-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;

        }
        .booking-container h2 {
            margin-bottom: 10px;
            color: #007bff;
        }
        .booking-container p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .booking-form {
            text-align: left;
        }
        .booking-form label {
            display: block;
            margin-bottom: 5px;
        }
        .booking-form select, .booking-form input {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .booking-form button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="booking-container">
        <h2>Patient Register</h2>
        <p>Enter your details:</p> 
        <form class="booking-form" method="post">
            <label for="name">Patient Name:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="gender">Gender: </label>
            <select id='gender' name='gender' style='font-size:16px'>
                <option>M</option>
                <option>F</option>
                <option>others</option>
            </select><br><br><br>
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob"><br><br>
            <label for="email">Patient Email:</label>
            <input type="email" id="email" name="email" ><br><br>
            <label for="phone">Patient Phone:</label>
            <input type="text" id="phone" name="phone" ><br><br>
            <button type="submit" name="submit">Book Appointment</button>
            <a href="home.php">Go to home page</a>
            </form>
    </div>
</body>
</html>
