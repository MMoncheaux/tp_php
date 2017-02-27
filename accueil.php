<?php
session_start();


if (isset($_GET['q']) && !empty($_GET['q'])) {
    require('config/bdd.php');

    $stmt = $db->prepare("SELECT GUID, societe FROM guid WHERE GUID = ?");
    $stmt->execute(array($_GET['q']));
    $result = $stmt->fetch();
    $societe = $result['societe'];

    if ($_GET['q'] != $result['GUID']) {
        header('location:erreur_url.php');
    } else {
        $stmt = $db->prepare("SELECT id FROM client WHERE GUID = ?");
        $stmt->execute(array($_GET['q']));
        $result = $stmt->fetch();

        if ($result['id'] != false) {
            header('location:client_exist.php');
        } else {
            $_SESSION['GUID'] = $_GET['q'];
            $_SESSION['societe'] = $societe;
        }
    }
}else{
    header('location:erreur_url.php');
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
<div class="container">
    <div class="entete">
        <img src="images/logo_entreprise.jpg" alt="">
    </div>

    <div class="paragraph">
        <h2>Bienvenu sur le site de ConnectLife</h2>
    </div>

    <div class="acc-lien">
        <a href="formulaire.php" class="bouton">Lien pour le formulaire</a>
    </div>


</body>
</html>
