 <html lang="en">
 <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <title>Document</title>
 </head>
 

<?php 
session_start();
include "cnx.php";
 
if (isset($_POST['ajout'])){
    
$nomag=$_POST["nomag"];
$service=$_POST["service"];
$mail=$_POST["mail"];
$pass=$_POST["pass"];

     $insertA = mysqli_query($con,"INSERT into agent (nom_a,srv,email,pass) values ('$nomag', '$service' ,'$mail', '$pass')");

     if ($insertA){
          include "agent-list.php";
          echo '
          <script>
          swal({
              title:"Super!",
              text: "Agent ajouté",
              icon: "success"
          }).then(function() {
              window.location = "agent-list.php";
          });
    
          </script>'
          ;
        }
          
    else{
     include "agent-list.php";

     echo '<script>
     swal("Ereur!", "Ereur de ajout!", "error");
           </script>';
           }
}

    ?>