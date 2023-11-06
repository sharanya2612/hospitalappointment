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
    <title>Add Department</title>
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
            padding: 20px;
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
        input[type="text"],
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
        <h1>Add Department</h1>
        <?php
        include("connection.php");
        if(isset($_POST["submit"])){
            $dname=$_POST["name"];
            $desc=$_POST["description"];
            $deptname=strtolower($dname);

            if(empty($deptname)  OR empty($desc)){
                echo'<Script>alert("All fields are required")</Script>';
            }
            else {
                $sql="SELECT * FROM department where DName='$deptname'";
                $res=mysqli_query($conn,$sql);
                $num=mysqli_num_rows($res);
                if($num>0){
                    echo'<Script>alert("Department Name already exists")</Script>';
                }
            else{
                $insert="INSERT INTO department(DName,Descp) VALUES('$deptname','$desc')";
                $result=mysqli_query($conn,$insert);
                echo'<Script>alert("Successfully added department")</Script>';
               }
        }

        }
        ?>
        <form  method="post">
            <label for="name">Department Name:</label>
            <input type="text" id="name" name="name"><br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5"></textarea><br>
            <button type="submit" name="submit">Add Department</button>
            <a href="adminhome.php">Go to home page</a>
        </form>
    </div>
</body>
</html>
