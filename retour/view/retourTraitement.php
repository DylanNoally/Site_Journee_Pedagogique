<?php
	// Vérification de la connexion à la base de données
	// Si nous sommes bien connecté
	if ($bdd == true) {
		if(isset($_FILES['fileToUpload']))
		{
		    $dossierImage = 'img/retour/';
		    $fichier = basename($_FILES['fileToUpload']['name']);
		    $ima_path = $dossierImage . $fichier;


			// Si c'est une carte mentale
			if ($ima_path == "img/retour/carte_mentale.png" || $ima_path == "img/retour/carte-mentale.png" || $ima_path == "img/retour/carte_mentale.jpg" || $ima_path == "img/retour/carte-mentale.jpg" || $ima_path == "img/retour/carte_mentale.gif" || $ima_path == "img/retour/carte-mentale.gif" || $ima_path == "img/retour/carte mentale.png" || $ima_path == "img/retour/carte mentale.jpg" || $ima_path == "img/retour/carte mentale.gif" || $ima_path == "img/retour/carte_mental.png" || $ima_path == "img/retour/carte-mental.png" || $ima_path == "img/retour/carte_mental.jpg" || $ima_path == "img/retour/carte-mental.jpg" || $ima_path == "img/retour/carte_mental.gif" || $ima_path == "img/retour/carte-mental.gif" || $ima_path == "img/retour/carte mental.png" || $ima_path == "img/retour/carte mental.jpg" || $ima_path == "img/retour/carte mental.gif") 
			{
				// Toutes les informations sur la carte mentale
				$imgMapExist = $bdd->prepare('SELECT * FROM images WHERE IMA_Type = "Carte mentale de la journée"');
				$imgMapExist->execute();
				$mentalMapExist = $imgMapExist->fetch();

				// S'il n'y a rien
				// Insertion de la carte mentale
				if (empty($mentalMapExist)) {
					// Préparation de la requête SQL suivante : inserer l'image
					$query = $bdd->prepare("INSERT INTO images (IMA_Type , IMA_Chemin, UTI_Id) values ('Carte mentale de la journée' , ?, ?)");
				}

				// Exécution de la requête 
				$query->execute(array($ima_path, $idUser));
			}

			
			// Uniquement pour les images autre qu'une carte mentale 
			/**/
			/**/
			// Si un fichier du même nom que celui uploadé existe déjà
			// Si l'image existe déjà
		    if (file_exists($dossierImage . $fichier)) 
		    {
		    	if ($fichier != "carte_mentale.png" && $fichier != "carte-mentale.png" && $fichier != "carte_mentale.jpg" && $fichier != "carte-mentale.jpg" && $fichier != "carte_mentale.gif" && $fichier != "carte-mentale.gif" && $fichier != "carte mentale.png" && $fichier != "carte mentale.jpg" && $fichier != "carte mentale.gif" && $fichier != "carte_mental.png" && $fichier != "carte-mental.png" && $fichier != "carte_mental.jpg" && $fichier != "carte-mental.jpg" && $fichier != "carte_mental.gif" && $fichier != "carte-mental.gif" && $fichier != "carte mental.png" && $fichier != "carte mental.jpg" && $fichier != "carte mental.gif")
		    	{
			    ?>
					<script type="text/javascript"> alert("L'image existe déjà"); </script> 
				<?php
				}
			}

			// Si l'image n'éxiste pas encore
			elseif (!(file_exists($dossierImage . $fichier)))
			{
				if ($fichier != "carte_mentale.png" && $fichier != "carte-mentale.png" && $fichier != "carte_mentale.jpg" && $fichier != "carte-mentale.jpg" && $fichier != "carte_mentale.gif" && $fichier != "carte-mentale.gif" && $fichier != "carte mentale.png" && $fichier != "carte mentale.jpg" && $fichier != "carte mentale.gif" && $fichier != "carte_mental.png" && $fichier != "carte-mental.png" && $fichier != "carte_mental.jpg" && $fichier != "carte-mental.jpg" && $fichier != "carte_mental.gif" && $fichier != "carte-mental.gif" && $fichier != "carte mental.png" && $fichier != "carte mental.jpg" && $fichier != "carte mental.gif")
				{
				    // Préparation de la requête SQL suivante : inserer l'image
					$query = $bdd->prepare("INSERT INTO images (IMA_Type, IMA_Chemin, UTI_Id) values ('Illustration de la journée', ?, ?)");

					// Exécution de la requête 
					$query->execute(array($ima_path, $idUser));
				}	
			}

			if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $dossierImage . $fichier)) //Si la fonction ne renvoie rien, c'est que ça a fonctionné...
			{
			}
			else // Sinon cela retourne false
			{
				?>
				<script type="text/javascript"> alert("Echec de l'upload"); </script> 
				<?php
			}
		}


		if (isset($_POST['testimony'])) {
			if (empty($_POST['testimony'])) {
				// Ne rien faire
			}
			else {
				$text = $_POST['testimony'];

				// Préparation de la requête SQL suivante : inserer le texte
				$query = $bdd->prepare("INSERT INTO texte (TEX_Text, TEX_Type, UTI_Id) values (?, 'Illustration de la journée', ?)");

				// Exécution de la requête 
				$query->execute(array($text, $idUser));
			}
		}
	}
					
	else {
		echo "Echec de connexion à la base de données";
	}
?>