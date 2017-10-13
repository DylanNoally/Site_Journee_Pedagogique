<?php
  // Start session BEFORE writing HTML code
  session_start();

  // Connexion to DataBase
  $user = 'root';
  $pass = '';
  $bdd = new PDO('mysql:host=localhost;dbname=journee_peda;charset=utf8', 'root', '');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Contact page's CSS -->
    <link href="css/pp.css" rel="stylesheet">

  </head>

  <body>

    <?php include "menu/menu.php"; ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 id="contact_title"><small>Nous</small>
        <span style="display: inline-block;" class="mt-4 mb-3">Contacter</span>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Acceuil</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row contact_form">
        <div class="col-lg-8 mb-4">
          <h3 id="contact_form_title">Envoyez nous vos questions</h3>
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>Nom et prénom :</label>
                <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Tél :</label>
                <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Adresse mail :</label>
                <input type="email" class="form-control" id="email" required data-validation-required-message="Veuillez entrer votre adresse mail.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Message :</label>
                <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Veuillez taper votre message" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary">Envoyer</button>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include "view/footer.php"; ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

  </body>

</html>
