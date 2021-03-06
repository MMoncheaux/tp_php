<?php
session_start();


if (isset($_GET['q']) && !empty($_GET['q'])) {
    require('config/bdd.php');

    $stmt = $db->prepare("SELECT GUID FROM guid WHERE GUID = ?");
    $stmt->execute(array($_GET['q']));
    $result = $stmt->fetch();

    if ($_GET['q'] != $result['GUID']) {
        header('location:erreur_url.php');
    } else {
        $stmt = $db->prepare("SELECT id FROM client WHERE GUID = ?");
        $stmt->execute(array($_GET['q']));
        $result = $stmt->fetch();

        if ($result['id'] != false) {
            header('location:client_exist.php');
        } else {
            $_SESSION['GUID'];
            header('location:client_exist.php');
        }
    }
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

    <div>
        <a href="accueil.php?q=261ecd2a-a324-411c-bbdd-3d6ab304d3a1">lien pour l'accueil</a>
    </div>

</body>
</html>
