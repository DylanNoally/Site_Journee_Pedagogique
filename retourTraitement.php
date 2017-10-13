<?php
	// Vérification de la connexion à la base de données
	// Si nous sommes bien connecté
	if ($bdd == true) {
		if(isset($_FILES['fileToUpload']))
		{
		    $dossierImage = 'img/retour/';
		    $fichier = basename($_FILES['fileToUpload']['name']);

		     // Si un fichier du même nom que celui uploadé existe déjà
		    if (file_exists($dossierImage . $fichier) && $fichier != "carte_mentale.png") {
			    ?>
				<script type="text/javascript"> alert("Le fichier existe déjà"); </script> 
				<?php
				// On supprime le fichier
			    unlink($dossierImage . $fichier);
			}

			// Et si c'est une carte mentale
		    if (file_exists($dossierImage . $fichier) && $fichier == "carte_mentale.png") {
			    unlink("img/retour/carte_mentale.png"); // On supprime le fichier déjà existant ; l'ancienne carte mentale
			}

		    if ($fichier == "carte_mentale.jpg" || $fichier == "carte_mentale.gif" || $fichier == "carte_mentale" || $fichier == "carte-mentale.jpg" || $fichier == "carte-mentale.gif" || $fichier == "carte-mentale" ) {
			    ?>
				<script type="text/javascript"> alert("N'oubliez pas, il faut renommer le fichier en : carte_mentale.png"); </script> 
				<?php
			    unlink($dossierImage . $fichier); // On supprime le fichier
			}

		    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $dossierImage . $fichier)) //Si la fonction ne renvoie rien, c'est que ça a fonctionné...
			{
			}
			else // Sinon (la fonction renvoie FALSE)
			{
				?>
				<script type="text/javascript"> alert("Echec de l'upload"); </script> 
				<?php
			}

			
			$ima_path = $dossierImage.$fichier;

			// Si c'est une carte mentale
			if ($ima_path == "img/retour/carte_mentale.png") {
				// Préparation de la requête SQL suivante : inserer l'image
				$query = $bdd->prepare("INSERT INTO image (IMA_Type , IMA_Chemin, UTI_Id) values ('Carte mentale de la journée' , ?, ?)");

				
				/* Si il y a un changement de la carte mentale*/
				/**/
				/**/
				// Toutes les informations sur la carte mentale
				$imgMapExist = $bdd->prepare('SELECT * FROM image WHERE IMA_Type = "Carte mentale de la journée"');
				$imgMapExist->execute();
				$mentalMapExist = $imgMapExist->fetch();

				if (!empty($mentalMapExist)) {
					// Préparation de la requête SQL suivante : modifier l'mage'
					$query = $bdd->prepare("UPDATE image SET IMA_Chemin = ?, UTI_Id = ? WHERE IMA_Type = 'Carte mentale de la journée'");
				}
			}
			else {
			    // Préparation de la requête SQL suivante : inserer l'image
				$query = $bdd->prepare("INSERT INTO image (IMA_Type , IMA_Chemin, UTI_Id) values ('Illustration de la journée' , ?, ?)");	
			}

			// Exécution de la requête 
			$query->execute(array($ima_path, $idUser));

			//header('Location: retour.php');
		}


		if(isset($_POST['link']))
		{
			// Récupération de la date et de l'heure du jour avec le bon fuseau horaire
			date_default_timezone_set('Europe/Paris');
			$date = date("Y-m-d");

			$firstLink = $_POST['link'];

			//conversion du lien pour que la video s'affiche
			// Remplacer "watch?v=" par "embed/" dans le lien
			$firstLink = preg_replace('#watch\?v=#isU', 'embed/', $firstLink);

			// Supprimer tous ce qui se trouve après "&ab_channel=" dans le lien
			$finalLink = preg_replace('~&ab_channel=.*~', '', $firstLink);
			
			$query = $bdd->prepare("INSERT INTO video (VID_Date, VID_Lien, UTI_Id) values (?, ?, ?)");
			$query->execute(array($date, $finalLink, $idUser));

			//header('Location: retour.php');
		}
	}
					
	else {
		echo "Echec de connexion à la base de données";
	}


	

	/*// --- requete pour récupérer l'ID du denrier insert ----
	$reqideleve = $baseA->prepare('SELECT @@IDENTITY as ideleve');
	$reqideleve->execute();
	$ideleve = $reqideleve->fetch(PDO::FETCH_ASSOC);
	$idEleve = 	$ideleve['ideleve'];
	
	//-- Mise à jour de la table ELEVE pour insérer les clés étrangères --
	$requpdatedepistage = $baseA->prepare('UPDATE ELEVE 
										SET eleve.Id_eleve = ?');
	$requpdatedepistage->execute(array($idEleve));*/
?>