<?php
	include 'database/database.php';

	$lien = $_POST['lien'];
	$titre = $_POST['title'];
	$description = $_POST['desc'];

	//conversion du lien pour que la video s'affiche
	$link = preg_replace('#watch\?v=#isU', 'embed/', $lien);


	if (isset($lien) && isset($titre) && isset($description))
	{
		$nouvVideo = 'INSERT INTO `video`(`url`, `lien`, `titre`, `description`) VALUES("'.$lien.'", "'.$link.'","'.$titre.'", "'.$description.'")';
		$req = $bdd->query($nouvVideo);

	}
	else
	{
		var_dump($lien);
		var_dump($titre);
		var_dump($description);
	}

?>

