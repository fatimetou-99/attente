
<? 

require_once "c-menu.php"; 
require_once "cnx.php";

$sqlV = mysqli_query($con,"SELECT max(ordre) as longV from temp_v");
if (mysqli_num_rows($sqlV)>0){
		 $rowV = mysqli_fetch_assoc($sqlV) ;

}
$longV = $rowV['longV'];
$atn=$longV;
$act=0;
$abs=0;

if(isset($_POST['suiv'])){

  $monfichier = fopen('compt.txt', 'r+'); 
  $act = fgets($monfichier); // On lit la première ligne (nombre de pages vues)
  if($act < $longV){
    $act = $act + 1; // On augmente de 1 ce nombre de pages vues
    fseek($monfichier, 0); // On remet le curseur au début du fichier
    fputs($monfichier, $act); // On écrit le nouveau nombre de pages vues
    fclose($monfichier);
  }
  $atn = $longV- $act;

  $ordre = $act +2;

  $sqlV = mysqli_query($con,"SELECT tel FROM temp_v,client WHERE id_cl = id_cln and ordre = $ordre");
  if (mysqli_num_rows($sqlV)>0){
       $rowV = mysqli_fetch_assoc($sqlV) ;
       $numt=$rowV['tel'];

 
  $url = curl_init();
  $text='nous+vous+attent';
  $url1= "http://172.20.10.3:8090/SendSMS?username=gfa&password=1234&phone=$numt&message=$text";
  // set URL and other appropriate options
  curl_setopt($url, CURLOPT_URL, $url1);
  
  // grab URL and pass it to the browser
  curl_exec($url);


  }

}



if(isset($_POST['abs'])){
  $monfichier = fopen('compt.txt', 'r+'); 
  $act = fgets($monfichier); 
  $abs = $act;

  $sql = mysqli_query($con,"SELECT * from temp_v,client WHERE id_cln = id_cl and ordre =$abs");

if (mysqli_num_rows($sql)>0){
     $row = mysqli_fetch_assoc($sql) ;
     $nom =$row['nom'];
     $tel =$row['tel'];
     $sqlA = mysqli_query($con,"INSERT into abscence(ordre,nom,tel,service) values ('$abs','$nom','$tel','Versement')");
}

  $atn = $longV - $act;

  
}



?>

<html lang="en">
<head>

	<title>Fil D'attente</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="css/font.css" />
  <link rel="stylesheet" type="text/css" href="css/cais.css" />
  <link rel="stylesheet" type="text/css" href="css/float.css" />

<style>

.foot{
	display:block;
	align-items:center;
  justify-content:center;
  margin-left:430px;
  margin-top:30px;
}


.bouton {
  background-color: seagreen;
  border: 0;
	border-radius: 10px;
	box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
	color: #fff;
	font-size: 16px;
  padding: 12px 25px;
  letter-spacing: 1px;
  margin:15px;


}

</style>
</head>
<body>
<div class="container">

<div class="courses-container">

	<div class="course">
    <div class="course-info">
	  <h2>Numero Actuelle</h2>
		</div>
		<div class="course-preview">
			<h2 id="r-act"><? echo $act;?></h2>
		</div>
  </div>

  <div class="course">
		<div class="course-preview">
			<h2 id="Rattente"><? echo $atn;?></h2>
		</div>
		<div class="course-info">
	  <h3>Personnes en attente</h3>
		</div>
  </div>
  
</div>
<div class="foot">
<form method='post' action ='caisier-v.php'>
<button class="bouton" name="suiv">Suivant</button>
<button class="bouton" name="abs">abscent</button>

</form>
</div>

</div>
</div>

<div class="action" onclick="actionToggle();" >
<span>+</span>
<ul>
 
<li><a class="lien" href="abs-v.php">Liste des Abscents</a></li>
<li><a class="lien" href="ferm-v.php">Fermer l'application</a></li>
<li><a class="lien" href="logout-v.php">Deconnection</a></li>

</ul>
</div>
<script type='text/JavaScript'>
function actionToggle(){
  var action = document.querySelector('.action');
  action.classList.toggle('active');
}

</script>
</body>
<script type='text/JavaScript'>

function go(){
  $('#longV').load('ajax-long-v.php');

  }
 setInterval(function(){ go(); }, 1000);

</script>
</html>



