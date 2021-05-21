<?
require_once "cnx.php";
$sqlV = mysqli_query($con,"SELECT max(ordre) as longV from temp_v");
if (mysqli_num_rows($sqlV)>0){
  $rowV =mysqli_fetch_assoc($sqlV);
       $longV= $rowV['longV'];
    
}
echo $longV;

?>