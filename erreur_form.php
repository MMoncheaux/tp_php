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
     <title>Erreur adresse Mail</title>
     <link rel="stylesheet" href="styles/main.css">
   </head>
   <body>
     <div class="container">
       <div class="entete">
         <img src="images/logo_entreprise.jpg" alt="">
       </div>

       <div class="paragraph">
         <h3>Erreur : l'addresse mail ne corresponds pas : <?php if(isset($nom)){ echo $nom." ";} if(isset($prenom)){ echo $prenom;} ?></h3>
       </div>

       <div>
           <a href="formulaire.php">Retour au formulaire</a>
       </div>

   </body>
 </html>
