<?php
session_start();
if(!isset($_SESSION["id"])){
    header('location:user.php');
}
include("connection.php");
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $doc=$_POST["doc"];
    $docrate=$_POST["docrate"];
    $hosrate=$_POST["hosrate"];
    $message=$_POST["message"];
    
    if(empty($name) OR empty($email) OR empty($doc) OR empty($docrate) OR empty($hosrate) OR empty($message)){
        echo'<Script>alert("All fields are required")</Script>';
    }
    else{
        $sql="SELECT * FROM patient where PEmail='$email'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);

        if($num>0){

        if($docrate<0 AND $docrate>10 AND $hosrate<0 AND $hosrate>10){
            echo'<Script>alert(" Give valid ratings ")</Script>';
        }


    else{
        $res="INSERT INTO feedback VALUES ('$name','$email','$doc','$docrate','$hosrate','$message')";
       mysqli_query($conn,$res);
        echo'<Script>alert(" Feedback submitted successfully ");
        window.location.href="home.php"</Script>';
    }
}
else{
    echo'<Script>alert(" Register Your email Id ");</script>';
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
        .contact-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 25%;
        }
        .contact-container h2 {
            margin-bottom: 10px;
            color: #007bff;
        }
        .contact-container p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .contact-form {
            text-align: left;
        }
        .contact-form label {
            display: block;
            margin-bottom: 5px;
        }
        .contact-form input, .contact-form textarea {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .contact-form button {
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
    <div class="contact-container">
        <h2>Feedback</h2>
        <p>We value your feedback, inquiries, and concerns. Get in touch with us using the form below:</p>
        <form class="contact-form" action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" >
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="doc">Doctor's Name:</label><br>
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
            <label for="docrate">Rate doctor's service(0-10):</label>
            <input type="text" id="docrate" name="docrate">
            <label for="hosrate">Rate our service(0-10):</label>
            <input type="text" id="hosrate" name="hosrate">
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" ></textarea>
            <button type="submit" name="submit">Submit</button><br>

        </form>
        <a href="home.php">Go to home page</a>
    </div>
</body>
</html>
