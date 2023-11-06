<?php
session_start();
if(!isset($_SESSION["id"])){
    header('location:user.php');
}
include("connection.php");

    if(isset($_POST["submit"])){
            $name=strtolower($_POST['name']);
            $email=strtolower($_POST['email']);
            $phone=$_POST['phone'];
            $date=$_POST['date'];
            $time=$_POST['time'];
            $doc=$_POST["doc"];
            $conddate =date('Y-m-d', strtotime('+2 day'));;  
        
            if(empty($name) OR empty($email) OR empty($phone) OR empty($date) OR empty($time) OR empty($doc)){
                echo'<Script>alert("All fields are required")</Script>';
            }
           else{
            if($date<$conddate){
                echo'<Script>alert("Book your appointment 2 days prior as your required slot")</Script>';
            }
            else{
                $startTime = '09:00';
                $endTime = '21:00';

                if($time < $startTime OR $time > $endTime){
                echo'<Script>alert("Hospital timings is 10:00 to 20:00")</Script>';
                }
             else{
                $cond="SELECT * FROM appointment WHERE Adate='$date' AND Atime='$time'";
                $result=mysqli_query($conn,$cond);
                $number=mysqli_num_rows($result);
                if($number>0){
                    echo'<Script>alert("Slot Already taken!!")</Script>';
                }
                else{
                $sql="SELECT PId FROM patient WHERE PName= '$name' AND PEmail= '$email' AND Phone= '$phone'" ;
                $res=mysqli_query($conn,$sql);
                $num=mysqli_num_rows($res);
                if($num>0){
                $row=mysqli_fetch_array($res);
                $pid=$row["PId"];   
                $ins="INSERT INTO appointment VALUES ('$pid','$doc','$date','$time')";
                mysqli_query($conn,$ins);
                echo"<Script>alert('Appointment booked succesfully');
                window.location.href='home.php'</Script>";
                }
                else{
                    echo'<Script>alert("Patient not registered!!")</Script>';
                }
         
            
                }
            }
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
        <h2>Book My Appointment</h2>
        <p><b>Note:</b>Book your appointment 2 days prior</p>
        <marquee><p style="color:red">Phone number and email should be same as that given during booking</p> </marquee>
        <form class="booking-form" method="post">
            <label for="name">Patient Name:</label>
            <input type="text" id="name" name="name" ><br>
            <label for="email">Patient Email:</label>
            <input type="email" id="email" name="email" ><br>
            <label for="phone">Patient Phone:</label>
            <input type="text" id="phone" name="phone" ><br>
            <label for="doc">Doctor:</label>
            <?php 
            $sql="SELECT d.DId,d.DName,e.DName AS dept FROM doctor d, department e where d.DeptId=e.DeptId";
            $res=mysqli_query($conn,$sql);
            echo "<select style='font-size:16px' id='doc' name='doc'>";
            echo "<option value= ' '>--Choose your option--</option>";

            while($row=mysqli_fetch_array($res)){
                echo '<option value='.$row["DId"].'>DR.'.strtoupper($row["DName"]).'('.strtoupper($row["dept"]) .')</option>';

            }
            echo "</select><br><br><br>"

            ?>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date"><br>
            <label for="time">Time(24hr-format):</label>
            <input type="time" id="time" name="time" ><br>
            <button type="submit" name="submit">Book Appointment</button>
            </form>
    </div>
</body>
</html>
