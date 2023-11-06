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
    <title>Delete Doctor</title>
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
        <h1>Delete Doctor</h1><br>
        <?php
        include("connection.php");
        if(isset($_POST["submit"])){
            $doc=$_POST["doc"];
            $dept=$_POST["dept"];
            
            if(empty($doc) OR empty($dept)){
                echo'<Script>alert("All fields are required")</Script>';
            }
            else{
                $res="DELETE FROM doctor WHERE DeptId='$dept' AND DId='$doc' ";
               $result=mysqli_query($conn,$res);
               if(!$result){
                echo'<Script>alert(" Successfully deleted Doctor details ")</Script>';
            }
            else{
                echo'<Script>alert(" Please verify the doctor selected against departments ")</Script>';
            }
        }

        }
        ?>
        <form method="post">
            <label for="name">Doctor:</label>
            <?php 
            $sql="SELECT * FROM doctor ";
            $res=mysqli_query($conn,$sql);
            echo "<select style='font-size:16px' id='do' name='doc'>";
            echo "<option value= ' '>--Choose your option--</option>";
            while($row=mysqli_fetch_array($res)){
                echo '<option value='.$row["DId"].'>'.strtoupper($row["DName"]).'</option>';

            }
            echo "</select><br><br><br>"

            ?>
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
            <button type="submit" name="submit">Delete Doctor</button>
            <a href="adminhome.php">Go to home page</a>
        </form>
    </div>
</body>
</html>
