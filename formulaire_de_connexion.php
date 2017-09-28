<?php
	include 'view/includes/connexionBD.php';

	if(isset($_POST["formulaireConnexion"]))
	{
		$password_hache = sha1($_POST['motdepasse']);
		// 222 donne en sha1 = 1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9;

		if(isset($_POST['pseudonyme']) && isset($password_hache))
		{
			$login = $_POST['pseudonyme'];

			// Je récupère tous les champs login et password de la table CONNEXION
			$req = $bdd->prepare('SELECT Nom_utilisateur, Password_utilisateur FROM utilisateur');
			$req->execute(array(
			    'login' => 'Nom_utilisateur',
			    'password' => 'Password_utilisateur'));
			$resultat = $req->fetchAll();

			// Contrôle de vérification des informations du formulaire comparé aux valeurs de la BD
			if($login != $resultat[0]['Nom_utilisateur'] || $password_hache != $resultat[0]['Password_utilisateur'])
			{
    			echo '<script>alert("Mauvais identifiant ou mot de passe !");</script>';
			}
			else
			{
				$_SESSION['login'] = $login;			      // $_POST['pseudonyme'];
			    $_SESSION['mot_de_passe'] = $password_hache;  // $password_hache;
			}
 
		}

		// $maDate = new DateTime();

		// On enregistre les informations de connexion de l'utilisateur
		// $_SESSION['login'] = $_POST['pseudonyme'];
		// $_SESSION['mot_de_passe'] = $_POST['motdepasse'];

		// Il existe une autre fonction qui fait la même chose que date(), mais qui permet en plus de choisir la langue à utiliser : strftime()
		// Définir la langue avec la fonction setlocale.
		setlocale(LC_TIME, 'fra_fra');

		// On utilise strftime() :
		$_SESSION['datetime'] = strftime('%A %d %B %Y à %H:%M');



		// echo strftime('%Y-%m-%d %H:%M:%S');  // 2012-10-11 16:03:04
		// echo strftime('%A %d %B %Y, %H:%M'); // JOUR  NUMEROJOUR  MOIS  ANNEE, HEURE:MINUTES
		// echo strftime('%d %B %Y');           // NUMEROJOUR  MOIS  ANNEE
		// echo strftime('%d/%m/%y');           // JOUR/MOIS/ANNEE

	}
	

?>
	


