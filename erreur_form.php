<?php
session_start();
if(isset($_SESSION['input'])){
  extract($_SESSION['input']);
}

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Accueil</title>
     <link rel="stylesheet" href="main.css">
   </head>
   <body>
     <div class="container">
       <div class="entete">
         <img src="logo_entreprise.jpg" alt="">
       </div>

       <div class="paragraph">
         <h3>Erreur adresse mail <?php if(isset($nom)){ echo $nom." ";} if(isset($prenom)){ echo $prenom;} ?></h3>
       </div>

       <div>
           <a href="formulaire.php">Lien pour le formulaire</a>
       </div>

   </body>
 </html>
