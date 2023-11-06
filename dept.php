<?php
session_start();
if(!isset($_SESSION["id"])){
    header('location:user.php');
}
include("connection.php");
$sql="SELECT * FROM department";
$res=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Departments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url("dept.JPG");
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .department {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }

        .department h2 {
            font-size: 20px;
            margin: 0;
        }

        .department p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<div class="container">
    <?php while($row=mysqli_fetch_assoc($res)){
        $name=strtoupper($row['DName']);
        $desc=$row['Descp'];
        
        ?>
    
        <div class="department">
            <h2><?php echo "$name DEPARTMENT" ?></h2>
            <p><?php echo "$desc" ?></p>
            </div>
        <?php } ?>
        
    
    </div>
</body>
</html>
