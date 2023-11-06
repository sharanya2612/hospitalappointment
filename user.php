<?php
session_start();
include("connection.php");


if(isset($_POST['submit'])){
    $Username=$_POST["Username"];
    $Password=md5($_POST["Password"]);


    $sql="SELECT * FROM users WHERE Username='$Username' and Password='$Password'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
    if($num>0){
        $id=$row['uid'];
        $_SESSION['id']=$id;
        header("location:home.php");
    }
    else{
        echo'<script>alert("Username and Password is not matching")</script>';
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Login</title>
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
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .login-container h2 {
            margin-bottom: 10px;
            color: #007bff;
        }
        .login-container p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .login-form label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }
        .login-form input {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .login-form button {
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
    <div class="login-container">
        <h2><center>User Login</center></h2>
        <form class="login-form" method="post">
            <label for="Username">Username:</label>
            <input type="text" id="Username" name="Username">
            <label for="Password">Password:</label>
            <input type="password" id="Password" name="Password">
            <button type="submit" name="submit">Login</button><br><br>
     
            Don't have an account?<a href="sign.php">Click Here</a>
        </form>
    </div>
</body>
</html>


