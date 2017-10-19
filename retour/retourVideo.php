<?php
	// Start session BEFORE writing HTML code
	session_start();

	// Connexion to DataBase
	$user = 'root';
	$pass = '';
	$bdd = new PDO('mysql:host=localhost;dbname=journee_peda;charset=utf8', 'root', '');

    // Toutes les informations sur les vidéos
    $vid_block = $bdd->prepare('SELECT * FROM video WHERE VID_Type = "Illustration de la journée"');
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
        <link href="css/kk.css" rel="stylesheet">

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
            ?>
                    <div class="youtubeVideo">
                        <?php
                        if (isset($_SESSION['login']) && $_SESSION['id']) 
                        {
                        ?>
                            <form method="POST" action="retourVideo.php">
                                <div style="margin-left: 35%;">
                                    <input type="url" name="modifLink" id="modifLink" placeholder="Ex : https://www.youtube.com/watch?v=GAdob1t4Nyk&t=84s&ab_channel=FeastOfFiction" size="15" maxlength="999" />
                                </div>
                                <input class="retourVideoModifVid" type="image" name="modifVid" value="Changer la vidéo" src="img/retour/modif_logo.png" />
                                <input type="hidden" name="idVideo" value="<?php echo $theVideo['VID_Id']; ?>">
                            </form>
                        <?php
                        }
                        ?>
                        <iframe src="<?php echo $theVideo['VID_Lien']; ?>" frameborder="0" allowfullscreen></iframe>
                        <?php
                        if (isset($_SESSION['login']) && $_SESSION['id']) 
                        {
                        ?>
                            <form action="retourVideo.php" method="POST">
                                <input class="retourVideoSuppVid" type="image" name="suppressVid" value="supprimer" src="img/retour/suppVideo_logo.png">
                                <input type="hidden" name="idVideo" value="<?php echo $theVideo['VID_Id']; ?>">
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
            ?>
        </div>
        <?php
            include "view/suppressModifRetour.php";
            include "view/footer.php"; 
         ?>
    </body>
    <?php
        // Si l'utilisateur est connecté au site
        if (isset($_SESSION['login']) && $_SESSION['id']) 
        {
    ?>
            <style type="text/css">
                .youtubeVideo { 
                  margin-left: 87px;
                }

                @media (max-width: 1199px)
                {
                    .youtubeVideo {
                        margin-left: 136px;
                    }
                }

                @media (max-width: 992px)
                {
                    .youtubeVideo {
                        margin-left: 204px;
                    }
                }

                @media (max-width: 768px)
                {
                        .youtubeVideo {
                        margin-left: 130px;
                    }
                }

                @media all and (max-width: 400px) 
                {
                    .youtubeVideo {
                        margin-left: 63px;
                    }
                }
            </style>
    <?php
        }
    ?>
</html>