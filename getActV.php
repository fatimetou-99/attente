<?php
include "cnx.php";
 $fichier = fopen('compt.txt', 'r+'); 
 $ordre = fgets($fichier); // On lit la première ligne (nombre de pages vues)

 $sqlV = mysqli_query($con,"SELECT ordre FROM temp_v WHERE ordre = $ordre");
 
$array = array();

while ($lignV =mysqli_fetch_assoc($sqlV)){
 
	array_push($array,$lignV);
}

echo json_encode($array);


?>
