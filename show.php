<?php

session_start();
if($_SESSION){
  if($_COOKIE){

    echo "<h2>Welcom {$_COOKIE['fname']} </h2>";

  }
echo"<ul>";
echo"<li>{$_SESSION['fname']}</li>";
echo"<li>{$_SESSION['lname']}</li>";
echo"<li>{$_SESSION['address']}</li>";
echo"<li>{$_SESSION['gender']}</li>";
echo"<li>{$_SESSION['email']}</li>";
echo"<li>{$_SESSION['password']}</li>";
echo"<li>{$_SESSION['mycountry']}</li>";
echo"<li>{$_SESSION['department']}</li>";


echo"</ul>";
}
else{
 header("Location:login.php");
}

?>


