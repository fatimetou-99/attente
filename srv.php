<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
 
    <link rel="stylesheet" href="css/frm.css">
    <link rel="stylesheet" href="css/font.css">
    <script src="js/login.js"></script>
   
</head>
<body>
<div class="container">
    
<a href="index.php" id="back" class="btn pull-right"><i class="fas fa-arrow-left"></i></a>
<img class="logo" src="images/logo.png"  alt="LOGO" >

    
        <form id="validateForm" action="insertS.php"  method="post" class=" form"  >
            
            <div class="form-group">
                <label for="nom" class="form-label">Nom Complet</label>
                <input name="nom"  class="form-control"  type="text" required />

            </div>
            <div class="form-group">
                <label for="tel" class="form-label">Telephone</label>
                <input name="tel"  class="form-control" type="text" required/>
                
            </div>
            <div class="butn">
            <button type="submit" name="versement">Demander</button>           
            <button type="reset" class="bt-rs" >Annuler </a>           
            </div>  

        </form>
    </div>

    <script>

$('#validateForm').bootstrapValidator({
feedbackIcons: {
	valid: 'glyphicon glyphicon-ok',
	invalid: 'glyphicon glyphicon-remove',
	validating: 'glyphicon glyphicon-refresh'
},
fields: {
	nom: {
		validators: {
			stringLength: {
				min: 3,
				message: 'Le noms doit contenire au moins 3 letres'
			},
			notEmpty: {
				message: 'Le champs doit etre remplis'
			}
		}
	},
	tel: {
		validators: {
			numeric: {
				message: 'Le Champs doit contenire seulement des numeros'
			},
      stringLength: {
				min: 8,
				message: 'Le numero doit etre plus de 8 numeros'
			},
			notEmpty: {
				message: 'Le champs doit etre remplis'
			}
		}
	},

	
	}
});

</script>
  </body>
</html>

