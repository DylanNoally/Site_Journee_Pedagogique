  <?php
    session_start();
    include 'view/includes/connexionSession.php';
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>interface de connexion</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="interfaceDeConnexion.css">
  </head>

  <body>

    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Interface de connexion <br> Gestion des stages</h2>
        <input type="username" name="nom_utilisateur" class="form-control" placeholder="E-mail">
        <input type="password" name="mot_de_passe" class="form-control" placeholder="Mot de passe">
        <br>
        <a href="index.php" <button class="btn" type="submit" name="validerConnexion">Connexion</button></a>
        <br><br>
      </form>

    </div> 

  </body>
</html>
