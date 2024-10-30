<?php
$server = "localhost";
$db = "learn";
$user = "root";
$pass = "";
 
$connection=mysqli_connect($server,$user,$pass,$db);

if(!$connection)
{
      die("could not connect to server...\n" .mysqli_connect_error()); 
}

  

    
?>