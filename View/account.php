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
<link rel="stylesheet" type="text/css" href="Styles/account.css">
</head>
<body style="background-image:url(Content/images/special.jpg)">

<header class="header">
    <div class="header_content d-flex flex-row align-items-center justify-content-start">
        <div class="logo"><a href="index.php">Sophie Tells</a></div>
    </div>
</header>

<div class="container">
    <h2> Votre Compte <small>Membre depuis </small></h2>
    <ul class="responsive-table">
        <li class="table-header">
            <div class="col col-1">Nom</div>
            <div class="col col-2">Prénom</div>
            <div class="col col-3">Email</div>
            <div class="col col-4">Mot de passe</div>
        </li>
        <li class="table-row">
            <div class="col col-1" data-label="Nom"> --- </div>
            <div class="col col-2" data-label="Prénom"> --- </div>
            <div class="col col-3" data-label="Email"> --- </div>
            <div class="col col-4" data-label="Mot de passe"> --- </div>
        </li>
    </ul>

    <ul class="responsive-table">
        <li class="table-header">
            <div class="col col-1">Anciennes réservations</div>
            <div class="col col-2">Réservations à venir</div>

        </li>
        <li class="table-row">
            <div class="col col-1" data-label="Anciennes réservations"> --- </div>
            <div class="col col-2" data-label="Réservations à venir"> --- </div>

        </li>
    </ul>
</div>


</body>
</html>
