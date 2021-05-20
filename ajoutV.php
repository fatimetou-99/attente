<?php 
include "cnx.php";

$nom=$_POST["nom"];
$tel=$_POST["tel"];


$chercheV = mysqli_query($con,"SELECT * from client where nom ='$nom' and tel ='$tel' ");

if (mysqli_num_rows($chercheV)>0){

  // Client deja dans la base
       $rwV = mysqli_fetch_assoc($chercheV) ;
       $id_cl =$rwV['id_cl'];
       $date =date('Y-m-d');
       $ins_V = mysqli_query($con, "INSERT into temp_v (date_v,id_cln) values ('". $date . "', '" .$id_cl ."')");
       if(!$ins_V){
        exit();
    }
    else{
        echo"";
    }
  }

     
// Client n'est pas dans la base
else{
   $insert_cl = mysqli_query($con, "INSERT into client (nom,tel) values ('". $nom . "', '" .$tel ."')");
if($insert_cl){
   
   $searchV = mysqli_query($con,"SELECT * from client where nom ='$nom' and tel ='$tel' ");
   if (mysqli_num_rows($searchV)>0) {

        $rowV = mysqli_fetch_assoc($searchV);
            $id_cl =$rowV['id_cl'];
            $date =date('Y-m-d');
       $insert_V = mysqli_query($con, "INSERT into temp_v (date_v,id_cln) values ('". $date . "', '" .$id_cl ."')");  
       if(!$insert_V){
        exit();
    }
    else{
        echo"";
    }
      }
                                          
      } 
}
?>