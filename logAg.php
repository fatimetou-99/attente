<?php 

session_start();
include "cnx.php";

if (isset($_POST) && !empty($_POST['email']) && !empty($_POST['pass'])) {
 
 extract($_POST);
 //$password= sha1($_POST['password']);

$sql="SELECT * FROM agent WHERE email ='$email' AND pass ='$pass'";

$req=mysqli_query($con, $sql);

if (mysqli_num_rows($req)>0) {
  
   $lign =mysqli_fetch_row($req) ;

   if ($lign[2]== "Versement") {
      $_SESSION['vers'] = Array(
         'email' => $email,
         'pass' => $pass
     );
  
      header("Location:caisier-v.php");
   
           } 
       else if($lign[2]== "Retrait") {
         $_SESSION['ret'] = Array('email' => $email, 'pass' => $pass);
         header("Location:caisier-r.php");           }
         }

}


else {
   $_SESSION['statusv'] = 'Login ou mot de passe incorrecte !';
   header("Location:login-v.php");


}

?>
