<?php
    session_start();
    include 'connexionSession.php';
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Interface de connexion | Journée Pédagogique | Lycée Saint Vincent</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon" />

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/interface_de_connexion.css">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="admin.php" method="POST">
        <img class="img-fluid rounded mb-4" src="logo.png" alt="">
        <h2 class="form-signin-heading">Interface de connexion<br>Journee Pedagogique</h2>
        <input type="text" name="login" class="form-control" placeholder="Nom utilisateur | Ex: Idasiak">
        <input type="password" name="motdepasse" class="form-control" placeholder="Mot de passe">
        <br>
        <button class="btn" type="submit" name="formulaireConnexion">Connexion</button>
        <br><br>
      </form>

    </div> 

  </body>
</html>