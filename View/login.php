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
    <form action="/examples/actions/confirmation.php" method="post">
		<h2>Se connecter</h2>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required="required">
      </div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Se connecter</button>
        </div>
    </form>
	<div class="text-center">Vous n'avez pas de compte ? <a href="http://localhost/Tests/ProjetFinal/index.php?view=register">S'inscrire</a></div>
</div>
</body>
</html>
