<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message']))
   {
   echo "Veuillez remplir toutes les zones à remplir";
   return false;
   }

if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	{
	echo "Veuillez entrez une adresse mail valide";
   return false;
	}
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'informatique@lyceestvincent.net'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Site web Journée Pédagogique Page Contact:  $name";
$email_body = "Vous avez reçu un nouveau message venant du site web Journée Pédagogique.\n\n"."Détails:\n\nNom: $name\n\nEmail: $email_address\n\nTél: $phone\n\nMessage:\n$message";
$headers = "De: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "A: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
