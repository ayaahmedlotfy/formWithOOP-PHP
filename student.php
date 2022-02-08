<?php
class Student{
private $img;
private $id;
private $fname;
private $lname;
private $address;
private $gender;
private $email;
private $password;
private $mycountry;
private $department;
private $errors;


function __construct(){
}
function __destruct(){
}
function __set($key,$value){

if($key=="fname"){
if(strlen($value)< 3){

$this->errors["fname"]="first name must be greater than 3";
var_dump($this->errors['fname']);
}
else{

    $value= htmlspecialchars(stripcslashes(trim($value)));
    $this->fname=$value;
}
}
else if($key=="lname"){
    if(strlen($value)< 3){

        $this->errors["lname"]="last name must be greater than 3";
        var_dump($this->errors['lname']);
        }
        else{
        
            $value= htmlspecialchars(stripcslashes(trim($value)));
            $this->lname=$value;
        }
}
else if($key=="password"){
   if( strlen($value)< 8){
    $this->errors["password"]="password must be greater than 8";

   }
    else{
    $this->password=$value;}
}
else if($key=="address"){
    if(strlen($value)< 4){

        $this->errors["address"]="address must be greater than 4";
        var_dump($this->errors['address']);
        }
        else{
        
            $value= htmlspecialchars(stripcslashes(trim($value)));
            $this->address=$value;
        }
}
else if($key=="email"){
    if(!filter_var($value,FILTER_VALIDATE_EMAIL)){
        $this->errors["mail"]="not valide email";
        var_dump($this->errors['mail']);
        }
        else{
            $this->email=$value;
        }
        
}
else if($key=="gender"){
            $this->gender=$value;
}


else if($key=="mycountry"){
    $this->mycountry=$value;
}

else if($key=="department"){
    $this->department=$value;
}
else if($key=="img"){
    $this->img=$value;
}
else if($key=="id"){
    $this->id=$value;
}

}

function __get($key){
return $this->$key;
}



}



?>