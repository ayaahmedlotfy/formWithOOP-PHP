<?php

require("db.php");
require("student.php");
$db=new DB();
$conn=$db->get_connection();
$student=new Student();

//to add in db

if(isset($_POST["addStudent"])){

$student->fname=$_POST["fname"];
$student->lname=$_POST["lname"];
$student->address=$_POST["address"];
$student->gender=$_POST["gender"];
$student->email=$_POST["mail"];
$student->password=$_POST["password"];
$student->mycountry=$_POST["mycountry"];
$student->department=$_POST["department"];



// }
// // validation image
// $imgExtention=pathinfo($_FILES["img"]["tmp_name"] , PATHINFO_EXTENSION);
// $allowedExtentions=["png","jpg"];
// if(! in_array($imgExtention ,$allowedExtentions)){
//     $errors["imgExtention"]="invalid extention";

// }
//  // upload img to server
// if(! move_uploaded_file($_FILES["img"]["tmp_name"] , "images/".$_FILES["img"]["name"])){
//     $errors["img"]="fail to upload image";

// }

if(count($student->errors)>0){
     $errorArr=json_encode($student->errors);
header("Location:addStudent.php?error=$errorArr");
var_dump($student->errors);
echo" we are in if student controller";
}

else{
    

// add to db
$imgName=$_FILES["img"]["name"];
$db->insert("student"," fname='$student->fname' , lname='$student->lname', address='$student->address', gender='$student->gender' , email='$student->email' , password='$student->password' , mycountry='$student->mycountry', department='$student->department' , img='$imgName' " );

// to redirect to db
 header("Location:list.php");

// Close connection
$conn->close();
}

}

// to delete from db
else if(isset($_GET["delete"])){
    $student->id=$_GET["id"];
    $data=$db->delete("student", "id=$student->id");

// to redirect to db
header("Location:list.php");

// Close connection
$conn->close();

}

// to show from db
else if(isset($_GET["show"])){
// id of student which will show
$student->id=$_GET["id"];


$data=$db->select("*","student", "id=$student->id");

$studentInfo=$data->fetch_assoc();

session_start();
$_SESSION["fname"]=$studentInfo["fname"];
$_SESSION["lname"]=$studentInfo["lname"];
$_SESSION["address"]=$studentInfo["address"];
$_SESSION["gender"]=$studentInfo["gender"];
$_SESSION["email"]=$studentInfo["email"];
$_SESSION["password"]=$studentInfo["password"];
$_SESSION["mycountry"]=$studentInfo["mycountry"];
$_SESSION["department"]=$studentInfo["department"];

header("Location:show.php");


// Close connection
$conn->close();
}

// to edit in db
else if(isset($_GET["edit"])){
    // id of student
    $student->id=$_GET["id"];

$data=$db->select("*","student", "id=$student->id");

$studentInfo=$data->fetch_assoc();

session_start();
$_SESSION["id"]=$studentInfo["id"];
$_SESSION["fname"]=$studentInfo["fname"];
$_SESSION["lname"]=$studentInfo["lname"];
$_SESSION["address"]=$studentInfo["address"];
$_SESSION["gender"]=$studentInfo["gender"];
$_SESSION["email"]=$studentInfo["email"];
$_SESSION["password"]=$studentInfo["password"];
$_SESSION["mycountry"]=$studentInfo["mycountry"];
$_SESSION["department"]=$studentInfo["department"];

header("Location:edit.php");


// Close connection
$conn->close();

}

else if(isset($_GET["update"])){
session_start();
$_SESSION["mycountry"]=$studentInfo["mycountry"];

    // id od student 
$student->id=$_GET["id"];
$student->fname= $_GET["fname"];
$student->lname= $_GET["lname"];
$student->address= $_GET["address"];
$student->gender= $_GET["gender"];
$student->email=$_GET["mail"];
$student->password=$_GET["password"];
$student->country=$_GET["mycountry"];
$student->department=$_GET["department"];

if(count($student->errors)>0){
    $errorArr=json_encode($student->errors);
header("Location:edit.php?error=$errorArr");

}
else{
$db->update("student", "fname='$student->fname' , lname='$student->lname', address='$student->address', gender='$student->gender' , email='$student->email' , password='$student->password' , mycountry='$student->country', department='$student->department' " , "id=$student->id");

// Close connection
$conn->close();
header("Location:list.php");
}
}
// loginnnnnnnnnnnnnnnnnnnnnnnn
if(isset($_POST["login"])){
$student->email=$_POST["mymail"];
$student->password=$_POST["mypassword"];
$data=$db->select("*","student", "email='$student->email' and password='$student->password'");

// var_dump($data);

if($data){
$studentInfo=$data->fetch_assoc();
// var_dump($studentInfo);
setcookie("fname",$studentInfo["fname"]); 
header("Location:list.php");
}
else{
header("Location:login.php");

}
}
?>