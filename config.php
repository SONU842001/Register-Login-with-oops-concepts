<?php
 ob_start();//  display output buffering
 session_start();// sesions start

 try{
  $con = new PDO("mysql:host=localhost;dbname=clone", "root", "");// Connection of database using PDO(PHP database oriented ),we can also use mysqli_connect 
  $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);// set the PDO error mode to exception   
}
catch(PDOException $e){
  exit("Connection failed: ". $e->getMessage());
}
  

?>