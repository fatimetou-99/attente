<?php
include "cnx.php";

//Récupération de données 
$nom=$_POST['nomag'];
$srv=$_POST['service'];
$email=$_POST['mail'];
$pass=$_POST['pass'];

$id=$_POST['id'];

$resultat = mysqli_query($con,"UPDATE agent set nom_a='$nom',srv='$srv',email='$email',pass='$pass' where id= '$id'");
if($resultat){
	include "agent-list.php";
	echo '
	<script>
	swal({
		title:"Super!",
		text: "Agent modifié",
		icon: "success"
	}).then(function() {
		window.location = "agent-list.php";
	});

	</script>'
	;
}
 else 
{
	include "agent-list.php";

	echo '<script>
	swal("Oops..!", "Ereur de Modification", "error");
		  </script>';
}
