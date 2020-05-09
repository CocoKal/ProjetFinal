<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Sophie Tells</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles/login.css">
</head>
<body style="background-image:url(Content/images/special.jpg)">

  <header class="header">
    <div class="header_content d-flex flex-row align-items-center justify-content-start">
      <div class="logo"><a href="http://localhost/Tests/ProjetFinal/index.php">Sophie Tells</a></div>
    </div>
  </header>

<div class="signup-form">
    <form method="post">
		<h2>S'inscrire</h2>
		<p class="hint-text">Créer votre compte. Ça ne prend que quelques secondes.</p>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="firstname" placeholder="Prénom" required="required"></div>
				<div class="col-xs-6"><input type="text" class="form-control" name="lastname" placeholder="Nom" required="required"></div>
			</div>
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Mot de Passe" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirmer mot de passe" required="required">
        </div>
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> J'accepte les <a href="#">Termes d'usages</a> &amp; <a href="#">Politique de sécurité</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">S'inscrire maintenant</button>
        </div>
    </form>
	<div class="text-center">Vous avez déjà un compte ? <a href="http://localhost/Tests/ProjetFinal/index.php?view=login">Se connecter</a></div>
</div>
<?php
 include('Util/register.php');
 ?>
</body>
</html>
