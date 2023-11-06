<?php
session_start();
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
<?php
include("connection.php");



if(isset($_POST['submit'])){
    $Username=$_POST["Username"];
    $EmailId=$_POST["EmailId"];
    $Password=md5($_POST["Password"]);
    $ConfirmPassword=md5($_POST["ConfirmPassword"]);
   

   if($Password !== $ConfirmPassword){
    echo'<Script>alert("Password is not matching")</Script>';
   }

   if(empty($Username) OR empty($EmailId) OR empty($Password) OR empty($ConfirmPassword)){
    echo'<Script>alert("All fields are required")</Script>';
   }
   else{
    $sql="SELECT * FROM users WHERE EmailId='$EmailId'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    
    if($num>0){
        echo'<script>alert("Email already exists")</script>';
    }
    else{
        
        if($Password===$ConfirmPassword){
         $insert="INSERT INTO users(Username,EmailId,Password) VALUES('$Username','$EmailId','$Password')";
            mysqli_query($conn,$insert);
            $_SESSION['username'] = $username;
        
            echo"<Script>alert('User account created');
            window.location.href='user.php'</Script>";
       
        }
    }
}
}
?>
    <div class="login-container">
        <h2><center>User Signup</center></h2>
        <form class="login-form" method="post">
            <label for="EmailId">Email:</label>
            <input type="email" id="EmailId" name="EmailId">
            <label for="Username">Username:</label>
            <input type="text" id="Username" name="Username">
            <label for="Password">Password:</label>
            <input type="password" id="Password" name="Password">
            <label for="ConfirmPassword">Confirm Password:</label>
            <input type="password" id="ConfirmPassword" name="ConfirmPassword">
            <button type="submit" name="submit">Create Account</button><br><br>
     
        </form>
    </div>
</body>
</html>


