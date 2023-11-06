<?php
session_start();
if (!isset($_SESSION['id'])){
  header('location:admin.php');
}
include("connection.php");
?>
<html>

<head>

<style>
table

{

border-style:solid;

border-width:2px;

border-color:black;

}

</style>

</head>

<body>

<?php 


$query = "SELECT doctor.DName AS d,department.DName AS e, feedback.*  FROM feedback,doctor,department WHERE DocId=DId AND doctor.DeptId=department.DeptId";
$result=mysqli_query($conn,$query);




    echo '<p style= "font:200%" >   </p>';
  echo '<center><h1>Ratings</h1></center><br><br>';

echo'<table border="1" style="width:100%">
<tr>
  <th bgcolor="white" style="font-size:30px">Patient Name</th>
  <th bgcolor="white" style="font-size:30px">Patient Email</th>
  <th bgcolor="white" style="font-size:30px">Doctor Name</th>
  <th bgcolor="white" style="font-size:30px">Department Name</th>
  <th bgcolor="white" style="font-size:30px">Doctor Ratings</th>
   <th bgcolor="white" style="font-size:30px">Hospital Ratings</th>
   <th bgcolor="white" style="font-size:30px">Feedback</th>
</tr>';
while($row=mysqli_fetch_assoc($result)){
echo '<tr> 


                  <td bgcolor="white" style="font-size:30px">'.$row["PName"].'</td> 
                  <td bgcolor="white" style="font-size:30px">'.$row["PEmail"].'</td> 
                  <td bgcolor="white" style="font-size:30px">'.$row["d"].'</td>   
                  <td bgcolor="white" style="font-size:30px">'.$row["e"].'</td>
                  <td bgcolor="white" style="font-size:30px">'.$row["DocRate"].'</td>
				  <td bgcolor="white" style="font-size:30px">'.$row["HosRate"].'</td>
                  <td bgcolor="white" style="font-size:30px">'.$row["Feedback"].'</td>   
            
         </tr>';
}




?>
</body>
</html>