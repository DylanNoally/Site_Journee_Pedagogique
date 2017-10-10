<?php
	include 'connexionBD.php';
	if(isset($_POST["formulaireConnexion"]))
	{
		$password_hache = sha1($_POST['motdepasse']);
		var_dump($password_hache);

		// Vérification des identifiants
		$req = $bdd->prepare('SELECT UTI_Id FROM utilisateur WHERE UTI_Login = :login AND UTI_Password = :motdepasse');
		$req->execute(array(
		    'login' => $_POST['login'],
		    'motdepasse' => $password_hache));

		$resultat = $req->fetch();

		if (!$resultat)
		{
		    echo '<script>alert("Mauvais identifiant ou mot de passe !");</script>';
		}
		else
		{
			$_POST['login'] = ucfirst($_POST['login']);
		    $_SESSION['id'] = $resultat['UTI_Id'];
		    $_SESSION['login'] = $_POST['login'];
		    header('Location: index.php');
  			exit();
		}
		// $maDate = new DateTime();
		// On enregistre les informations de connexion de l'utilisateur
		// $_SESSION['login'] = $_POST['login'];
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
	

