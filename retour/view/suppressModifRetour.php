<?php
	
	$img = $bdd->prepare('SELECT * FROM images WHERE IMA_Type IN ("Illustration de la journée", "Carte mentale de la journée")');
	$img->execute();

	$texte = $bdd->prepare('SELECT * FROM texte  WHERE TEX_Type = "Illustration de la journée"');
	$texte->execute();

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
?>