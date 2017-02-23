<?php
session_start();


if(isset($_GET['q']) && !empty($_GET['q']))
{
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=connectlife;charset=utf8mb4', 'root', '');
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }

  $stmt = $db->prepare("SELECT GUID, societe FROM guid WHERE GUID = ?");
  $stmt ->execute(array($_GET['q']));
  $result = $stmt->fetch();
  $societe = $result['societe'];

  if ($_GET['q'] != $result['GUID'])
  {
    header('location:erreur_url.php');
  }
  else
  {
    $stmt = $db->prepare("SELECT id FROM client WHERE GUID = ?");
    $stmt ->execute(array($_GET['q']));
    $result = $stmt->fetch();

    if($result['id'] != false)
    {
      header('location:client_exist.php');
    }
    else
    {
      $_SESSION['GUID'] = $_GET['q'];
      $_SESSION['societe']= $societe;
    }
  }
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
        <h2>Bienvenu sur le site de ConnectLife</h2>
      </div>

      <div>
          <a href="formulaire.php">Lien pour le formulaire</a>
      </div>



  </body>
</html>
