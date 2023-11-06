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
    <title>Add Doctor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: gray;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #0056b3;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],input[type="email"],
        textarea {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            resize: vertical;
        }
        button {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #003b80;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Doctor</h1><br>
        <?php
        include("connection.php");
        if(isset($_POST["submit"])){
            $name=$_POST["name"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $gender=$_POST["gender"];
            $sep=$_POST["sep"];
            $dept=$_POST["dept"];
            
            if(empty($name) OR empty($email) OR empty($gender) OR empty($sep) OR empty($dept) OR empty($phone)){
                echo'<Script>alert("All fields are required")</Script>';
            }
            else{
                $res="INSERT INTO doctor(DName,DEmail,DGender,DeptId,Degree,Dphone) VALUES ('$name','$email','$gender','$dept','$sep','$phone')";
               mysqli_query($conn,$res);
                echo'<Script>alert(" Successfully added Doctor details ")</Script>';
            }

        }
        ?>
        <form method="post">
            <label for="name">Doctor Name:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="email">Doctor Email:</label>
            <input type="email" id="email" name="email" ><br><br>
            <label for="gender">Gender: </label>
            <select id='gender' name='gender' style='font-size:16px'>
                <option>M</option>
                <option>F</option>
                <option>others</option>
            </select><br><br><br>
            <label for="phone">Doctor Phone:</label>
            <input type="text" id="phone" name="phone" ><br><br>
            <label for="sep">Specialization:</label>
            <input type="text" id="sep" name="sep" ><br><br>
            <label for="dep">Department: </label>
            <?php 
            $sql="SELECT Deptid,Dname FROM department ";
            $res=mysqli_query($conn,$sql);
            echo "<select style='font-size:16px' id='dep' name='dept'>";
            echo "<option value= ' '>--Choose your option--</option>";
            while($row=mysqli_fetch_array($res)){
                echo '<option value='.$row["Deptid"].'>'.strtoupper($row["Dname"]).'</option>';

            }
            echo "</select><br><br><br>"

            ?>
            <button type="submit" name="submit">Add Doctor</button>
            <a href="adminhome.php">Go to home page</a>
        </form>
    </div>
</body>
</html>
