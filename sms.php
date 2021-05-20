<?php

$url = curl_init();
$contex='';
$text='message+de+teste';
$url1= "http://172.20.10.3:8090/SendSMS?username=gfa&password=1234&phone=33536600&message=$text";
// set URL and other appropriate options
curl_setopt($url, CURLOPT_URL, $url1);

// grab URL and pass it to the browser
curl_exec($url);



?>


<?php
include "cnx.php";
 $fichier = fopen('compt.txt', 'r+'); 
 $ordre = fgets($fichier); // On lit la première ligne (nombre de pages vues)

$ordre = $ordre +2;
 $sqlV = mysqli_query($con,"SELECT tel FROM temp_v,client WHERE client.id_cl = temp_v.id_cl and ordre = $ordre");
 if (mysqli_num_rows($sqlV)>0){
      $rowV = mysqli_fetch_assoc($sqlV) ;
      $numt=$rowV['tel'];

 }
 $numt=$rowV['tel'];

 $url = curl_init();
 $numt='';
 $text='message+de+teste';
 $url1= "http://172.20.10.3:8090/SendSMS?username=gfa&password=1234&phone=33536600&message=$text";
 // set URL and other appropriate options
 curl_setopt($url, CURLOPT_URL, $url1);
 
 // grab URL and pass it to the browser
 curl_exec($url);
 

?>




