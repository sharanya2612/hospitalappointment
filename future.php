<?php
session_start();
if (!isset($_SESSION['id'])){
  header('location:doctor.php');
}
include("connection.php");
$id = $_SESSION['id'];
?>
<html>

<head>

<style>
      html { 
		  background: url(side.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
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


$query = "SELECT * FROM patient p,appointment a WHERE p.PId=a.PId AND a.Did=$id";
$result=mysqli_query($conn,$query);

$todaydate =date('Y-m-d');



    echo '<p style= "font:200%" >   </p>';
  echo '<h1>Future Appointments</h1><br><br>';

echo'<table border="1" style="width:100%">
<tr>
  <th bgcolor="white" style="font-size:30px">Name</th>
  <th bgcolor="white" style="font-size:30px">Gender</th>
  <th bgcolor="white" style="font-size:30px">Birth Date</th>
  <th bgcolor="white" style="font-size:30px">Email</th>
  <th bgcolor="white" style="font-size:30px">Phone</th>
   <th bgcolor="white" style="font-size:30px">Adate</th>
   <th bgcolor="white" style="font-size:30px">Atime</th>
</tr>';
while($row=mysqli_fetch_assoc($result)){
    $date=$row['Adate'];
    if($todaydate<$date){
echo '<tr> 


                  <td bgcolor="white" style="font-size:30px">'.$row["PName"].'</td> 
                  <td bgcolor="white" style="font-size:30px">'.$row["PGender"].'</td> 
                  <td bgcolor="white" style="font-size:30px">'.$row["Pdob"].'</td>   
                  <td bgcolor="white" style="font-size:30px">'.$row["PEmail"].'</td>
                  <td bgcolor="white" style="font-size:30px">'.$row["Phone"].'</td>
				  <td bgcolor="white" style="font-size:30px">'.$row["Adate"].'</td>
                  <td bgcolor="white" style="font-size:30px">'.$row["Atime"].'</td>   
            
         </tr>';
}
}



?>
</body>
</html>