<?php 
$bdd = new PDO('mysql:host=localhost;dbname=ppe;charset=utf8', 'root', ''); 

try {
$con = new PDO('mysql:host=localhost;dbname=ppe', 'root', '');;
} catch(Exeption $e) {
	die($e);
}
?>
