<?php 

$con=mysqli_connect("localhost","root","","attente");
if(!$con){
   die("erreur de type" .mysqli_connect_error());
 }
else "OK";

?>