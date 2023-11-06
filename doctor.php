<?php
session_start();
include("connection.php");
if(isset($_POST["submit"])){
$email=$_POST['email'];
$pass=md5($_POST['pass']);


if(empty($email) OR empty($pass)){
    echo "<script>alert('All fields are required');</script>";
}
else{
    $sql="SELECT * FROM doctor WHERE DEmail='$email' AND Dpassword='$pass'";
    $res=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($res);
    if($num>0){
        
        $row=mysqli_fetch_assoc($res);
        $id=$row['DId'];
        $name=$row['DName'];    
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
         header("location:dochome.php");
        }
    else{
        echo "<script>alert('Enter valid password and email');</script>";
    }

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
            width:25%;
            min-width: 300px;
            border-radius: 5px;
            box-shadow: 10px 10px 5px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .btn-login {
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
        <h2><center>Doctor Login</center></h2>
        <form action=" " method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="pass" name="pass" >
            </div>
            <button type="submit" name="submit" class="btn-login">Login</button>
            <br><br>
     
            Not set password yet?<a href="doctorsign.php">Click Here</a>
        </form>
    </div>
</body>
</html>
