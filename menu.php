    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="programme.php">Programme</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="videos.php">Vidéos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="resume.php">Résumé</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>

        <?php
          if (key_exists('login', $_SESSION) && key_exists('id', $_SESSION)) 
          {
            ?>
            <div class="collapse navbar-collapse" id="navbarResponsive" align="navbar-toggler-right">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <p style="color:white; margin: auto;padding: auto">
                  <?php
                    echo "Bienvenue, " . $_SESSION['login']." ";
                  ?>
                  <a class="navbar-brand" href="deconnexion.php" style="font-size: 100%; color:red">deconnexion ?</a>
                </li>
              </ul>
            </div>
          <?php
          }
          else
          {
            ?><p style="color:white;margin: auto;padding: auto">Vous n'êtes pas connecté, dommage !</p><?php
          }
          ?> 
      </div>
    </nav>