<?php
	
	$img = $bdd->prepare('SELECT * FROM images WHERE IMA_Type IN ("Illustration de la journée", "Carte mentale de la journée")');
	$img->execute();

	$vid = $bdd->prepare('SELECT * FROM video  WHERE VID_Type = "Illustration de la journée" LIMIT 9');
	$vid->execute();

	if (isset($_POST['suppressImg'])) 
	{
		if (isset($_POST['idImage'])) 
		{
			$id = $_POST['idImage'];

			$idImage = intval($id);

			// Suppression de l'image dans le serveur
			while($theImage = $img->fetch()) 
			{
				if ($theImage['IMA_Id'] == $idImage) 
				{
					$ima_path_db = $theImage['IMA_Chemin'];
					
					$fh = fopen($ima_path_db, 'a');
					fclose($fh);

					unlink($ima_path_db);
				}
			}

			// On supprime une seule image
			// On supprime l'image avec le bon ID
			// On supprime la bonne image
			$query = $bdd->prepare('DELETE FROM images WHERE IMA_Id = ?');
			$query->execute(array($idImage));
		}
	}

	if(isset($_FILES['modif_fileToUpload']))
	{
		if (isset($_POST['idImage'])) 
		{
			$id = $_POST['idImage'];

			$idImage = intval($id);
		    $dossierImage = 'img/retour/';
		    $fichier = basename($_FILES['modif_fileToUpload']['name']);
		    $ima_path = $dossierImage . $fichier;


		    // Suppression de l'ancienne image dans le serveur
			while($theImage = $img->fetch()) 
			{
				if ($theImage['IMA_Id'] == $idImage) 
				{
					$ima_path_db = $theImage['IMA_Chemin'];
					
					$fh = fopen($ima_path_db, 'a');
					fclose($fh);

					unlink($ima_path_db);

					// Préparation de la requête SQL suivante : modifier l'image
					$query = $bdd->prepare("UPDATE images SET IMA_Chemin = ?, UTI_Id = ? WHERE IMA_Id = ?");

					// Exécution de la requête 
					$query->execute(array($ima_path, $idUser, $idImage));
				}
			}

			if(move_uploaded_file($_FILES['modif_fileToUpload']['tmp_name'], $dossierImage . $fichier)) //Si la fonction ne renvoie rien, c'est que ça a fonctionné...
			{
			}
			else // Sinon cela retourne false
			{
				?>
				<script type="text/javascript"> alert("Echec de l'upload"); </script> 
				<?php
			}
		}
	}

	if (isset($_POST['suppressVid'])) 
	{
		if (isset($_POST['idVideo'])) 
		{
			$id = $_POST['idVideo'];

			$idVideo = intval($id);

			// On supprime une seule vidéo
			// On supprime la vidéo avec le bon ID
			// On supprime la bonne vidéo
			$query = $bdd->prepare('DELETE FROM video WHERE VID_Id = ?');
			$query->execute(array($idVideo));
		}
	}

	if (isset($_POST['modifVid'])) 
	{
		if (isset($_POST['idVideo'])) 
		{
			$id = $_POST['idVideo'];

			$idVideo = intval($id);

			while($theVideo = $vid->fetch()) 
			{
				if ($theVideo['VID_Id'] == $idVideo) 
				{
					// Récupération de la date et de l'heure du jour avec le bon fuseau horaire
					date_default_timezone_set('Europe/Paris');
					$date = date("Y-m-d");

					$firstLink = $_POST['modifLink'];

					if (empty($firstLink)) 
					{
					?>
						<script type="text/javascript"> alert("Veuillez saisir un lien"); </script> 
					<?php
					}

					else
					{
						//conversion du lien pour que la video s'affiche
						// Remplacer "watch?v=" par "embed/" dans le lien
						$firstLink = preg_replace('#watch\?v=#isU', 'embed/', $firstLink);

						// Supprimer tous ce qui se trouve après "&ab_channel=" dans le lien
						$finalLink = preg_replace('~&ab_channel=.*~', '', $firstLink);
						
						// Préparation de la requête SQL suivante : modifier la vidéo
						$query = $bdd->prepare("UPDATE video SET VID_Date = ?, VID_Lien = ?, UTI_Id = ? WHERE VID_Id = ?");

						// Exécution de la requête 
						$query->execute(array($date, $finalLink, $idUser, $idVideo));
					}
				}
			}
		}
	}
?>