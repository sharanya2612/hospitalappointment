<?php
session_start();
if(!isset($_SESSION["id"])){
    header('location:user.php');
}
include("connection.php");
$departments = array();
$query = "SELECT DeptId, DName FROM department";

$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $departments[] = array(
            'id' => $row['DeptId'],
            'name' => $row['DName']
        );
    }
}


$doctorDetails = '';
$docrate='';

if (isset($_POST['searchButton'])) {
    $selectedDepartmentId = $_POST['department'];

    
    $query = "SELECT DId,DName,Degree,Dphone FROM doctor  WHERE DeptId =  $selectedDepartmentId "; 

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
     
        while ($row = mysqli_fetch_assoc($result)) {
            $id=$row['DId'];
            $doctorName = $row['DName'];
            $doctorSpecialization = $row['Degree'];
            $doctorphone=$row['Dphone'];
            $doctorDetails .= "<strong>Name:</strong> $doctorName<br><strong>Specialization:</strong> $doctorSpecialization<br><strong>Phone:</strong> $doctorphone<br>";
            $sql="SELECT AVG(DocRate) AS rate FROM feedback WHERE  DocId = $id";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0){
            $row1 = mysqli_fetch_assoc($res);
            $docr=$row1['rate'];
            $docrate.="<strong>Ratings:</strong>$docr<br>-----------------------------------------------------------------------------------<BR>";
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
    <title>Doctor Search</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
        input[type="text"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="text"]:focus {
            border-color: #0056b3;
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
        <h1>Doctor Search</h1>
        <form method="post">
            <label for="department">Select Department:</label>
            <input type="text" id="department" name="department" list="departmentList" placeholder="Type or select a department">
            <datalist id="departmentList">
                <?php
                foreach ($departments as $department) {
                    echo "<option value='{$department['id']}'>{$department['name']}</option>";
                }
                ?>
            </datalist>
            <button type="submit" name="searchButton">Search</button>
            <a href="home.php">Go to Home Page</a>
        </form>
        <div id="searchResults">
            <?php
            if (isset($_POST['searchButton'])) {
                if (!empty($doctorDetails)) {
                   
                    echo '<h2>Doctors in the '. $department['name']. ' department:</h2>';
                    echo '<ul>' . $doctorDetails . $docrate .'</ul>';
                } else {
                    echo '<p>No doctors found in the selected department.</p>';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>

