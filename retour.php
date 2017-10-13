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

	// Toutes les informations sur les images avec un Id impair
	$img_block1 = $bdd->prepare('SELECT * FROM image WHERE IMA_Type = "Illustration de la journée" AND IMA_Id%2 = 1');
	$img_block1->execute();

	// Toutes les informations sur les images avec un Id pair
	$img_block2 = $bdd->prepare('SELECT * FROM image WHERE IMA_Type = "Illustration de la journée" AND IMA_Id%2 = 0');
	$img_block2->execute();

	// Toutes les informations sur la carte mentale
	$img_map = $bdd->prepare('SELECT * FROM image WHERE IMA_Type = "Carte mentale de la journée"');
	$img_map->execute();

	// Toutes les informations sur les neufs premières vidéos
	$vid_block = $bdd->prepare('SELECT * FROM video LIMIT 9');
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
        <link href="css/pp.css" rel="stylesheet">

    </head>

    <body>

        <?php include "menu/menu.php"; ?>

        <!-- Page Content -->
        <div class="container">

        	<!-- Page Heading/Breadcrumbs -->
        	<h1 id="retour_title"><small>Nos</small>
		    	<span style="display: inline-block;" class="mt-4 mb-3">Retours</span>
		    </h1>

		    <ol class="breadcrumb">
		        <li class="breadcrumb-item">
		          <a href="index.html">Accueil</a>
		        </li>
		        <li class="breadcrumb-item active">Retour</li>
		    </ol>

		    <?php // Si l'utilisateur est connecté au site
			if (isset($_SESSION['login']) && $_SESSION['id']) 
			{
			?>
				<button class="buttonImage" onclick="btnClickImage()">Ajouter image</button>

				<p id="buttonImage"></p>

				<script>
					function btnClickImage() {
					    document.getElementById("buttonImage").innerHTML = '<div style="width: 100%"><form action="retour.php" method="post" enctype="multipart/form-data"><div class="buttonImageLabel"><input type="hidden" name="MAX_FILE_SIZE" value="300000">Selectioner une image (si carte mentale alors veiller à la renommer en : carte_mentale.png) :</div><div><input class="buttonImageSelectFile" type="file" name="fileToUpload" id="fileToUpload"></div><div><input class="buttonImageSubmit" type="submit" value="Valider" name="submit"></div></form></div>';
					}
				</script>
			<?php
			}
			?>
      		<!-- Bloque de la page -->
            <div class="main_block">
            	
				<div class="img_block_right">
    				<?php
            		while($theImage = $img_block2->fetch()) {
            			// Affiche toutes les images avec un ID pair
    					echo '<div class="img_right"><img src="'.$theImage['IMA_Chemin'].'"></img></div>';
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
							echo '<img src="'.$mentalMap['IMA_Chemin'].'"></img>';
						}
					?>
				</div>

            	<div class="img_block_left">
            		<?php
            		while($theImage = $img_block1->fetch()) {
            			// Affiche toutes les images avec un ID impair
    					echo '<div class="img_left"><img src="'.$theImage['IMA_Chemin'].'"></img></div>';
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
						    document.getElementById("buttonVideo").innerHTML = '<div style="width: 100%"><form method="POST" action="retour.php"><div class="buttonVideoLabel"><label for="link">Veuillez coller le lien YouTube de la vidéo : </label></div><div class="buttonVideoLink"><input type="url" name="link" id="link "placeholder="Ex : https://www.youtube.com/watch?v=GAdob1t4Nyk&t=84s&ab_channel=FeastOfFiction" size="60" maxlength="999" /></div><div><input class="buttonVideoSubmit" type="submit" value="Valider" /></div></form></div>';
						}
					</script>
				<?php
				}
				?>
				
    			<div class="vid_block1">
					<?php
					// Le compteur
					$counter = 1;

					while ($theVideo = $vid_block->fetch()) {
							echo '<iframe src="'.$theVideo['VID_Lien'].'" frameborder="0" allowfullscreen></iframe>';
						
						// IF conditions to make blocks of 3 elements only
						if ($counter == 3) {
						?>
							</div>
							<div class="vid_block2">
						<?php
						}

						if ($counter == 6) {
						?>
							</div>
							<div class="vid_block3">
						<?php
						}

						if ($counter == 9) {
						?>
							</div>
						<?php
						}
						$counter++;
					}
					?>
					<div>
						<p><a href="retourVideo.php"><button class="all_video">Voir toutes les vidéo</button></a></p>
					</div>
				</div>
			</div>
        </div>
        <?php include "view/footer.php"; ?>
    </body>
</html>
    			