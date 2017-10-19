<?php
	// Start session BEFORE writing HTML code
	session_start();

	// Connexion to DataBase
	$user = 'root';
	$pass = '';
	$bdd = new PDO('mysql:host=localhost;dbname=journee_peda;charset=utf8', 'root', '');

	// Si l'utilisateur est connecté au site
	if (isset($_SESSION['login']) && $_SESSION['id'])
	{
		// Récupération de l'ID de l'utilisateur
		$idSession = $_SESSION['id'];
		// Convertion du résultat de type string en type int
		$idUser = intval($idSession);
	}

	// Cette requête est pour les images de gauche
	// Toutes les informations sur les images
	$img_block_left = $bdd->prepare('SELECT * FROM images WHERE IMA_Type = "Illustration de la journée"');
	$img_block_left->execute();

	// Cette requête est pour les images de droite
	// Toutes les informations sur les images
	$img_block_right = $bdd->prepare('SELECT * FROM images WHERE IMA_Type = "Illustration de la journée"');
	$img_block_right->execute();

	// Toutes les informations sur la carte mentale
	$img_map = $bdd->prepare('SELECT * FROM images WHERE IMA_Type = "Carte mentale de la journée"');
	$img_map->execute();

	// Toutes les informations sur les neufs premières vidéos
	$vid_block = $bdd->prepare('SELECT * FROM video  WHERE VID_Type = "Illustration de la journée" LIMIT 9');
	$vid_block->execute();

	

	include "view/retourTraitement.php";
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
        	<h1 id="retour_title"><small>Nos</small>
		    	<span style="display: inline-block;" class="mt-4 mb-3">Témoignages</span>
		    </h1>

		    <ol class="breadcrumb">
		        <li class="breadcrumb-item">
		          <a href="index.html">Accueil</a>
		        </li>
		        <li class="breadcrumb-item active">Témoignages</li>
		    </ol>

		    <?php // Si l'utilisateur est connecté au site
			if (isset($_SESSION['login']) && $_SESSION['id']) 
			{
			?>
				<button class="buttonImage" onclick="btnClickImage()">Ajouter image</button>

				<p id="buttonImage"></p>

				<script>
					function btnClickImage() {
					    document.getElementById("buttonImage").innerHTML = '<div style="width: 100%"><form action="retour.php" method="post" enctype="multipart/form-data"><div class="buttonImageLabel"><input type="hidden" name="MAX_FILE_SIZE" value="300000">Selectioner une image (si carte mentale alors, de préférence veiller à la renommer en : carte_mentale) :</div><div><input class="buttonImageSelectFile" type="file" name="fileToUpload" id="fileToUpload"></div><div><input class="buttonImageSubmit" type="submit" value="Valider" name="submit"></div></form></div>';
					}
				</script>
			<?php
			}
			?>
      		<!-- Bloque de la page -->
            <div class="main_block">
            	
				<div class="img_block_right">
    				<?php
    				// Le compteur
					$counter = 1;
            		while($theImageRight = $img_block_right->fetch()) {
            			// Si le compteur est pair
            			if ($counter%2 == 0)
            			{
            				// Si l'utilisateur est connecté au site
							if (isset($_SESSION['login']) && $_SESSION['id']) 
							{
	    			?>
		    					<form action="retour.php" method="post" enctype="multipart/form-data">
									<div>
										<input type="hidden" name="modifMAX_FILE_SIZE" value="300000">
									</div>
									<div>
										<input class="updateImgRightPath" type="file" name="modif_fileToUpload" id="modif_fileToUpload">
										<input type="hidden" name="idImage" value="<?php echo $theImageRight['IMA_Id']; ?>">
									</div>
									<input class="updateImgRight" type="image" value="Changer l'image" name="submit" src="img/retour/modif_logo">
								</form>
	    			<?php
	    					}
	            			// Affiche toutes les images à droite de l'écran
	    					echo '<div class="img_right"><img src="'.$theImageRight['IMA_Chemin'].'"></img></div>';

	    					// Si l'utilisateur est connecté au site
							if (isset($_SESSION['login']) && $_SESSION['id']) 
							{
	    			?>
		    					<form action="retour.php" method="POST">
		    						<input class="suppImgRight" type="image" name="suppressImg" value="supprimer" src="img/retour/supp_logo">
		    						<input type="hidden" name="idImage" value="<?php echo $theImageRight['IMA_Id']; ?>">
		    					</form>
	    			<?php
	    					}
	    				}
	    				$counter++;
    				}
    				?>
    			</div>

    			<!-- Le résumé de la journée -->
    			<div class="mental_map">
    				<?php
    					// Execution de la requête SQL pour afficher la carte mentale
	    				$mentalMap = $img_map->fetch();
	    				if (!empty($mentalMap))
	    				{
	    					// Si l'utilisateur est connecté au site
							if (isset($_SESSION['login']) && $_SESSION['id']) 
							{
	    			?>
		    					<form action="retour.php" method="post" enctype="multipart/form-data">
									<div>
										<input type="hidden" name="modifMAX_FILE_SIZE" value="300000">
									</div>
									<div>
										<input class="updateImgMapPath" type="file" name="modif_fileToUpload" id="modif_fileToUpload">
										<input type="hidden" name="idImage" value="<?php echo $mentalMap['IMA_Id']; ?>">
									</div>
									<input class="updateImgMap" type="image" value="Changer de carte mentale" name="submit" src="img/retour/modif_logo">
								</form>
	    			<?php
	    					}
							echo '<img src="'.$mentalMap['IMA_Chemin'].'"></img>';

							// Si l'utilisateur est connecté au site
							if (isset($_SESSION['login']) && $_SESSION['id']) 
							{
	    			?>
		    					<form action="retour.php" method="POST">
		    						<input class="suppImgMap" type="image" name="suppressImg" value="supprimer" src="img/retour/supp_logo">
		    						<input type="hidden" name="idImage" value="<?php echo $mentalMap['IMA_Id']; ?>">
		    					</form>
	    			<?php
	    					}
						}
					?>
				</div>

            	<div class="img_block_left">
            		<?php
            		// Réinitialisation du compteur
					$counter = 1;
            		while($theImageLeft = $img_block_left->fetch()) {
            			// Si le compteur est impar
            			if ($counter%2 == 1)
            			{
            				// Si l'utilisateur est connecté au site
							if (isset($_SESSION['login']) && $_SESSION['id']) 
							{
	    			?>
		    					<form action="retour.php" method="post" enctype="multipart/form-data">
									<div>
										<input type="hidden" name="modifMAX_FILE_SIZE" value="300000">
									</div>
									<div>
										<input class="updateImgLeftPath" type="file" name="modif_fileToUpload" id="modif_fileToUpload">
										<input type="hidden" name="idImage" value="<?php echo $theImageLeft['IMA_Id']; ?>">
									</div>
									<input class="updateImgLeft" type="image" value="Changer l'image" name="submit" src="img/retour/modif_logo">
								</form>
	    			<?php
	    					}
	            			// Affiche toutes les images à gauche de l'écran
	    					echo '<div class="img_left"><img src="'.$theImageLeft['IMA_Chemin'].'"></img></div>';

	    					// Si l'utilisateur est connecté au site
							if (isset($_SESSION['login']) && $_SESSION['id']) 
							{
	    			?>
		    					<form action="retour.php" method="POST">
		    						<input class="suppImgLeft" type="image" name="suppressImg" value="supprimer" src="img/retour/supp_logo">
		    						<input type="hidden" name="idImage" value="<?php echo $theImageLeft['IMA_Id']; ?>">
		    					</form>
	    			<?php
	    					}
	    				}
	    				$counter++;
    				}
    				?>
    			</div>

    			
    			<?php // Si l'utilisateur est connecté au site
				if (isset($_SESSION['login']) && $_SESSION['id']) 
				{
				?>
					<button class="buttonVideo" onclick="btnClickVideo()">Ajouter vidéo</button>

					<p id="buttonVideo"></p>

					<script>
						function btnClickVideo() {
						    document.getElementById("buttonVideo").innerHTML = '<div style="width: 100%"><form method="POST" action="retour.php"><div class="buttonVideoLabel"><label for="link">Veuillez coller le lien YouTube de la vidéo : </label></div><div class="buttonVideoLink"><input type="url" name="link" id="link" placeholder="Ex : https://www.youtube.com/watch?v=GAdob1t4Nyk&t=84s&ab_channel=FeastOfFiction" size="60" maxlength="999" /></div><div><input class="buttonVideoSubmit" type="submit" value="Valider" /></div></form></div>';
						}
					</script>
				<?php
				}
				?>
				
    			<div class="vid_block1">
					<?php
					// Réinitialisation du compteur
					$counter = 1;

					while ($theVideo = $vid_block->fetch()) {
						// Si l'utilisateur est connecté au site
						if (isset($_SESSION['login']) && $_SESSION['id']) 
						{
					?>
							<form method="POST" action="retour.php">
								<div class="modifVidUrl">
									<input type="url" name="modifLink" id="modifLink" placeholder="Ex : https://www.youtube.com/watch?v=GAdob1t4Nyk&t=84s&ab_channel=FeastOfFiction" size="15" maxlength="999" />
								</div>
								<input class="modifVid" type="image" name="modifVid" value="Changer la vidéo" src="img/retour/modif_logo.png" />
								<input type="hidden" name="idVideo" value="<?php echo $theVideo['VID_Id']; ?>">
							</form>
					<?php
						}
						echo '<iframe style="margin-left: 5%;" src="'.$theVideo['VID_Lien'].'" frameborder="0" allowfullscreen></iframe>';

						// Si l'utilisateur est connecté au site
						if (isset($_SESSION['login']) && $_SESSION['id']) 
						{
	    			?>
	    					<form action="retour.php" method="POST">
	    						<input class="suppVid" type="image" name="suppressVid" value="supprimer" src="img/retour/suppVideo_logo.png">
	    						<input type="hidden" name="idVideo" value="<?php echo $theVideo['VID_Id']; ?>">
	    					</form>
	    			<?php
	    				}
						
						// S'il y a 3 vidéos
						if ($counter == 3) {
						?>
							</div>
							<div class="vid_block2">
						<?php
						}

						// S'il y a 6 vidéos
						if ($counter == 6) {
						?>
							</div>
							<div class="vid_block3">
						<?php
						}

						// S'il y a 9 vidéos
						if ($counter == 9) {
						?>
							</div>
						<?php
						}
						$counter++;
					}

					// Le nombre de vidéos
					$nb_vid = $bdd->prepare('SELECT COUNT(VID_Id) AS Nombre FROM video WHERE VID_Type = "Illustration de la journée"');
					$nb_vid->execute();

					$number = $nb_vid->fetch();

					// Convertion du type string en type int
					$numberVideo = intval($number['Nombre']);

					if ($numberVideo > 9) 
					{
					?>
						<div>
							<p><a href="retourVideo.php"><button class="all_video">Voir toutes les vidéo</button></a></p>
						</div>
					<?php
					}
					?>
				</div>
			</div>
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
				.mental_map {
					margin-top: 231px;
				}
				.vid_block2, .vid_block3, .vid_block1 {
				  margin-left: -137px;
				  width: 13%;
				}

				@media (max-width: 1199px)
				{
					.img_block_left, .img_block_right {
						flex-wrap: wrap;
						width: 230px;
					}

					.img_left, .img_right {
					    margin-left: 348px;
					}

					.mental_map {
					    margin-top: 50px;
					}

					.vid_block1, .vid_block2, .vid_block3 {
						display: flex;
						flex-direction: column;
						margin-left: 313px;
    					width: 66%;
					}
				}

				@media (max-width: 992px)
				{	
					.img_block_right, .img_block_left {
					    margin-left: 240px;
					}

					.img_left, .img_right {
					    margin-left: 0px;
					}

					.vid_block1, .vid_block2, .vid_block3 {
						margin-left: 195px;
    					width: 71%;
    				}

    				.vid_block2 {
	    				margin-top: 0px;
	    			}
				}

				@media (max-width: 768px)
				{
					.img_block_right, .img_block_left {
					    margin-left: 126px;
					}

					.vid_block1, .vid_block2, .vid_block3 {
						margin-left: 111px;
	    				width: 77%;
	    			}
				}

				@media all and (max-width: 400px) 
				{
					.img_block_right, .img_block_left {
					    margin-left: 59px;
					}

					.vid_block1, .vid_block2, .vid_block3 {
					    margin-left: 51px;
					    width: 85%;
					}
				}
			</style>
	<?php
		}
	?>
</html>
    			