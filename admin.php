<?php
session_start();
require("session.php");
if (admin::isloggedA()){
}
else{
    header('location:loginAd.php');
}
include "statistique.php";

//option values
			$resultat=mysqli_query($con,"SELECT DISTINCT date from statistique ");
			$option="";
				while ($row=mysqli_fetch_assoc($resultat)) {
        $dt = $row['date'];
				$option=$option."<option>".$dt."</option>";

				}

    $date = $_POST['date'];	
    $total = mysqli_query($con,"SELECT * FROM statistique where date='$date'");

$dtt = dateToFrench($date,'j F Y');
   
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
  
    <link rel="stylesheet" href="css/admn.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['totale', 'servic'],
          <?php 
          while ($row = mysqli_fetch_assoc($total)) {
            echo "['".$row['servic']."',".$row['totale']."],"; 
          }?>
        ]);

        var options = {
          title: 'Pourcentage De <?php echo $dtt ;?>',
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
   
    </head>

   <body>

  <?php require_once('navbar.php')?>

<div class="content">
<div class="card">


<div class="cnt">

<div class="courses-container">
<div class="course">
		<div class="course-preview">
			<h2 id="longV">0</h2>
		</div>
		<div class="course-info">
	  <h3>Versement</h3>
		</div>
  </div>

  <div class="course">
		<div class="course-preview">
			<h2 id="longR">0</h2>
		</div>
		<div class="course-info">
    <h3>Retrait</h3>
		</div>
  </div>
  <p id="abs"></p>
</div>
  </div>
</div>

  <div class="cnt">
    <div class="form">
      <p>Pourcentage Quotidienne</p>
    <form action="admin.php" method="post">
  <select name="date" class="form__input" ><option name="date" value="">Selectionner La date</option>
  <?php echo $option; ?></select>
  <button type="submit">Afficher</button>
  </form>
    </div>
  <div id="piechart" class="pie" >
   </div>
  </div>


</div>
</body>
<script type='text/JavaScript'>

function go(){
  $('#longV').load('ajax-long-v.php');
  }
 setInterval(function(){ go(); }, 1000);

</script>
</html>














