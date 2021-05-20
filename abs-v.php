<? 
session_start();
require("session.php");
if (vers::isloggedV()){
}
else
{
    header('location:login-agent.php');
}
require_once "cnx.php";
?>

<html lang="en">
<head>

	<title>Fil D'attente</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="css/abs-list.css">
  <link rel="stylesheet" type="text/css" href="css/cais.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  <link rel="stylesheet" href="css/try.css">
	<link rel="stylesheet" type="text/css" href="css/c-head.css" />
  <style>
  
.header{
  margin-top: 40px;
    width: 100%;
    height: 15vh;
    background-color:#f0f0f0;
    position: relative;
}
.bottn {
	background-color: seagreen;
	border: 0;
	border-radius: 10px;
	box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
	color: #fff;
	font-size: 16px;
	padding: 12px 25px;
	top: 400px;
	left: 850px;
	position: absolute;
  letter-spacing: 1px;
}

.abs{
  background-color: firebrick;
  width :200px;
  margin:20px;
  padding :10px;
  border-radius:2px;
  color:white;
  text-align:center;
}
.titre{
    text-align:center;
    padding:10px;
}
i{
	color:seagreen;
}

</style>
</head>
<body>
<div class="container">
<div class="header" >
		<div class="navbar">
			<div class="logo"> 
				<a ><img class="logo-img img img-responsive" src="images/logo.png"  alt="LOGO"></a>
				  </div>
				  <div class="wrpper">
    <div class="nvbar">
  
        <div class="rightt">
           
                <a href="caisier-v.php">
                  <i class="fas fa-arrow-left"></i>
                </a>
                 
              
        </div>
    </div>
</div>
</div>
<?php
  include "cnx.php";
   $query ="SELECT * from abscence where service='Versement'";
   $query_run =mysqli_query($con,$query);
	 ?>
 
<div class="container">
<div class="card">
    <h2 class="titre">Liste des abscents</h2>
	<div class="wrap-table100">
		<div class="table100">
			<table>
				<thead>
					<tr class="table100-head">
						<th class="column1">Ordre</th>
						<th class="column2">Nom</th>
						<th class="column3">Telephone</th>
						<th class="column2">Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php
		     if (mysqli_num_rows($query_run)>0) {
		        while ($row = mysqli_fetch_row($query_run)) {
					echo "<tr>
					<td 'column1'>$row[1]</td>
					<td 'column2'>$row[2]</td>
					<td 'column3'>$row[3]</td>
				
           <td 'column2'> 
           <a onclick=\"return sonclick=\"return confirm('Are you sure?')\" href='supp-abs.php?idab=$row[0]'>Supprimer</i></a>
					</tr>";
						  }
						 
						}
				
					 else {
						 echo "aucun enregistrement";
					}

						 ?>
				</tbody>
			</table>
		</div>
	</div>

</div>

</body>
<script type='text/JavaScript'>

function go(){
  $('#longV').load('ajax-long-v.php');
  $('#longR').load('ajax-long-r.php');
  $('#act_R').load('compt_r.txt');  
  $('#act_V').load('compt_v.txt');
  }
 setInterval(function(){ go(); }, 1000);

</script>
</html>



