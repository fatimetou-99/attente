<?php
session_start();
require("session.php");
if (admin::isloggedA()){
}
else{
  header('location:loginAd.php');
}
include "cnx.php";

			$resultat=mysqli_query($con,"SELECT DISTINCT mois from statistique ");
			$option="";
				while ($row=mysqli_fetch_assoc($resultat)) {
        $dt = $row['mois'];
				$option=$option."<option>".$dt."</option>";

        }
//option annee
        
			$resultat1=mysqli_query($con,"SELECT DISTINCT annee from statistique ");
			$option1="";
				while ($row1=mysqli_fetch_assoc($resultat1)) {
        $dt1 = $row1['annee'];
				$option1=$option1."<option>".$dt1."</option>";

        }

        $mois =$_POST['moisR'];

        
       // Retrait	
          $q1 = mysqli_query($con,"SELECT totale,jour from statistique WHERE servic='Retrait' and mois='$mois' GROUP BY(jour)");
      // Versement
         $q3 = mysqli_query($con,"SELECT totale,jour from statistique WHERE servic='Versement' and mois='$mois' GROUP BY(jour)");
      

function dateToFrench($datee, $format) 
{
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months , date($format, strtotime($datee) )  );
}

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
      google.charts.load('current', {'packages':['bar']});

      google.charts.setOnLoadCallback(drawChart1);
      google.charts.setOnLoadCallback(drawChart3);


      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Jour', 'Retrait'],
          <?php 
          while ($row = mysqli_fetch_assoc($q1)) {
            echo "['".$row['jour']."',".$row['totale']."],"; 
          }?>
        ]);

        var options = {
          chart: {
            title: 'Retrait',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

      function drawChart3() {
        var data = google.visualization.arrayToDataTable([
          ['Jour', 'Versement'],
          <?php 
          while ($row3 = mysqli_fetch_assoc($q3)) {
            echo "['".$row3['jour']."',".$row3['totale']."],"; 
          }?>
        ]);

        var options = {
          chart: {
            title: 'Versement',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material3'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

    </script>
    
    </head>

   <body>

  <?php require_once('navbar.php')?>

<div class="content">
<div class="card">


<div class="cnt">
  <div class="forms">
  <form action="statis-mois.php" method="post">
  <select name="moisR" class= "form__input" type="submit"><option id="moisR" name="moisR" value="">Selectionner Le Mois</option>
  <?php echo $option; ?></select>
  <button type="submit" onclick="submit()">Afficher</button>
  </form>

  
  </form>
  </div>

  <div class="charts">
    <div id="columnchart_material" style="width: 600px; height: 500px;"></div>
    <div id="columnchart_material3" style="width: 600px; height: 500px;"></div>
    </div>
</div>


</div>
</body>
</html>




