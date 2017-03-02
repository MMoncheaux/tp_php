<?php
session_start();
if(isset($_SESSION['input'])){
  extract($_SESSION['input']);
}

 ?>

 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
   <head>
     <meta charset="utf-8">
     <title>Erreur adresse Mail</title>
     <link rel="stylesheet" href="styles/main.css">
   </head>
   <body>
     <div class="container">
       <div class="entete">
         <img src="images/logo_entreprise.jpg" alt="">
       </div>

       <div class="paragraph">
         <h3>Bonjour <?php if(isset($nom)){ echo $nom." ";} if(isset($prenom)){ echo $prenom;} ?>, l'addresse mail que vous venez d'entrer n'est pas identique à celle que nous connaissons, vous pouvez choisir de retourner sur le formulaire en cliquant sur ce  <a href="formulaire.php">lien</a> ou alors vous pouvez contacter le service mass-mailing à  <a href="mailto:support-mail@connectlife.com">l'adresse</a> suivante afin de nous faire part de votre problème.</h3>
       </div>



   </body>
 </html>
