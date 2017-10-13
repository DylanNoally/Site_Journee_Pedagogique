<?php
	// Start session BEFORE writing HTML code
	session_start();

	// Connexion to DataBase
	$user = 'root';
	$pass = '';
	$bdd = new PDO('mysql:host=localhost;dbname=journee_peda;charset=utf8', 'root', '');

    // Toutes les informations sur les vidéos
    $vid_block = $bdd->prepare('SELECT * FROM video');
    $vid_block->execute();
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Retour</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/modern-business.css" rel="stylesheet">

         <!-- My CSS -->
        <link href="css/pp.css" rel="stylesheet">

    </head>

    <body>

        <?php include "menu/menu.php"; ?>

        <!-- Page Content -->
        <div class="container">

        	<!-- Page Heading/Breadcrumbs -->
        	<h1 id="retour_title"><small></small>
		    	<span style="display: inline-block;" class="mt-4 mb-3">Vidéos</span>
		    </h1>

		    <ol class="breadcrumb">
		        <li class="breadcrumb-item">
		          <a href="index.html">Accueil</a>
		        </li>
		        <li class="breadcrumb-item active"><a href="retour.php">Revenir en arrière</a></li>
		    </ol>

            <?php
                while ($theVideo = $vid_block->fetch()) {
                    echo '<div class="youtubeVideo"><iframe src="'.$theVideo['VID_Lien'].'" frameborder="0" allowfullscreen></iframe></div>';
                }
            ?>
        </div>
        <?php include "view/footer.php"; ?>
    </body>
</html>