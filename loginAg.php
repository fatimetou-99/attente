<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="webform.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/frm.css">
    <script src="js/login.js"></script>
</head>

<body>
    <div class="container">
   
        <form action="log-agent.php" method="POST" class="form">
        <img class="logo" src="images/logo.png"  alt="LOGO" >
       <br> 
        <?php
if(isset($_SESSION['statusv']) && $_SESSION['statusv'] !='') 
{
    echo '<div class="error"> '.$_SESSION['statusv'].' </div>';
    unset($_SESSION['statusv']);
}
?>
            <div class="form-group">
                <label for="name" class="form-label">Login </label>
                <input type="text" class="form-control" id="name" name="email" placeholder="Email" tabindex="1" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="email" name="pass" placeholder="Mot de pass" tabindex="2" required>
            </div>
            <div class="butn">
                <button type="submit" >Login </button>
            </div>
        </form>
    </div>
  
</body>

</html>