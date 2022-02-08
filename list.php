<!DOCTYPE html>
<html lang="en">
<head>
  <style>
table, th, td {
  border: 1px solid black;
}
tr:nth-child(even) {background: #CCC}
tr:nth-child(odd) {background: #FFF}
</style>
</head>
<body>
  <?php 
  if($_COOKIE["fname"]){
    echo "<h2>Welcom {$_COOKIE['fname']} </h2>";
  }
  else{
header("Location:login.php");

  } 
  ?>
<table>
        <tr>    
                <th>ID</th>
                <th>Fisrt Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>gender</th>
                <th>mail</th>
                <th>password</th>
                <th>mycountry</th>
                <th>department</th>
                <th>imageName</th>



        </tr>
<?php
require("db.php");
require("student.php");
$db=new DB();
$conn=$db->get_connection();

$data=$db->select("*","student");

while($row=$data->fetch_assoc()){
    echo"<tr>";
    foreach($row as $value){
    echo "<td>$value</td>";
}
// show , edit , delete student by id
echo "<td><a href='studentController.php?id={$row['id']}&show'>Show</a></td>";
echo "<td><a href='studentController.php?id={$row['id']}&edit'>Edit</a></td>";
echo "<td><a href='studentController.php?id={$row['id']}&delete'>Delete</a></td>";


    echo"</tr>";
}


// Close connection
$conn->close();
?>
</table>
</body>
</html>

