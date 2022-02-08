<?php
class DB{
private $host="localhost";
private $dbname="form";
private $user="root";
private $password="usbw";
private $connection; 
public function __construct(){
    $this->connection= new mysqli($this->host, $this->user, $this->password,$this->dbname);
}
function get_connection()
{
    return $this->connection;
}
 function select($cols, $table, $condition=1 ){
 return $this->connection->query("select $cols from $table where $condition");

}
function delete($table, $condition=1 ){
    return $this->connection->query("delete from $table where $condition");

   }

   function update($table, $cols, $condition=1 ){
   return $this->connection->query("update $table set $cols where $condition");

   }

function insert( $table ,$cols ){
    return $this->connection->query("insert into  $table set $cols " );
   }

}
?>