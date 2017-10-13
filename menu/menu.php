<link href="menu/css/bn.css" rel="stylesheet">


<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.html">Accueil</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Programme</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Vidéos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../site/retour.php">Résumé</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../site/contact.php">Contact</a>
            </li>
            <?php
            if (key_exists('login', $_SESSION) && key_exists('id', $_SESSION)) 
            {
            ?>
              <li class="sign-out nav-item">
                <a class="sign-out-name nav-link" href="#"><?php echo $_SESSION['login']; ?></a>

                <ul>
                  <li class="sign-out-link"><a href="view/deconnexion.php" style="margin-left: -38px; font-size: 14px; color: #FF0606;">Déconnexion</a></li>
                </ul>

              </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    
    <script src="menu/js/jquery.min.js"></script>
    <script src="menu/js/popper.min.js"></script>
    <script src="menu/js/bootstrap.min.js"></script>
    <script src="menu/js/clean-blog.min.js"></script>