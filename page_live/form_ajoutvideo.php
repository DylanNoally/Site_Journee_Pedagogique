<!DOCTYPE html>
<html lang="en">

	<head>

	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>Modern Business - Start Bootstrap Template</title>

	    <!-- Bootstrap core CSS -->
	    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="css/modern-business.css" rel="stylesheet">

	</head>

  	<body>

		<div id="content">
			<h1>Nouvelle vidéo</h1>
			<br>
			<form method="POST" action="ajout_video.php">
				<h2>Ajouter une nouvelle vidéo :</h2>
				<br>
				<label>Lien :</label>
				<input name="lien" />
				<br>
				<label>Titre :</label>
				<input name="title" />
				<br>
				<label>Description :</label>
				<input name="desc" />
				<br>
				<button>Valider</button>
			</form>
		</div>
	</body>
</html>