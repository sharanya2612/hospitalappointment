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
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: black;
        }
        .about-container {
            background-image:url("divbg.JPG");
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 800px;
            width: 100%;
            background-size: cover;
        }
        .about-container h2 {
            margin-bottom: 10px;
            color: #007bff;
        }
        .about-container p {
            font-size: 18px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="about-container">
        <h2 style="color: #8f8d04d1; text-decoration:underline">About Us</h2>
        <p>Welcome to our Hospital Appointment System! We are dedicated to providing an innovative and user-friendly platform for patients to easily schedule and manage their medical appointments.</p>
        <p>Our system streamlines the appointment process, allowing patients to select their preferred doctors, specialists, and time slots, all from the comfort of their own devices. With a focus on patient convenience and healthcare efficiency, we aim to enhance the overall healthcare experience.</p>
        <p>
            A hospital appointment system is a digital solution that facilitates the seamless scheduling and management of medical appointments within a healthcare facility. This system streamlines the patient experience by enabling individuals to book appointments with doctors, specialists, and healthcare providers through an online platform. It offers a user-friendly interface that allows patients to select preferred dates, times, and even specific medical professionals based on their needs and availability.</p>
            <p>For healthcare providers, the system optimizes their workflow by efficiently organizing patient appointments, preventing overbooking, and ensuring that medical professionals are optimally utilized. It may also integrate with electronic health records (EHR) systems to centralize patient information, facilitating smoother and more informed interactions between patients and medical staff.</p>
            <p>Ultimately, a hospital appointment system improves patient satisfaction, reduces administrative burdens, enhances communication, and contributes to the overall efficiency and effectiveness of healthcare services within a medical facility.</p>
        <p>Our team consists of dedicated professionals in both the healthcare and technology sectors, working collaboratively to ensure a seamless and secure appointment system. We are committed to continually improving and adapting our system to meet the evolving needs of patients and healthcare providers.</p>
        <p>Thank you for choosing our Hospital Appointment System for your healthcare needs.</p>

    </div>
</body>
</html>
