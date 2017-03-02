<?php
session_start();
require('config/bdd.php');
$champs = [];


if (!isset($_POST['gender']) || empty($_POST['gender'])) {
    $champs['gender'] = "Veuillez indiquer votre civilité";
}

if (!isset($_POST['nom']) || empty($_POST['nom']) || is_numeric($_POST['nom'])) {
    $champs['nom'] = "Veuillez indiquer un nom valide";
}

if (!isset($_POST['prenom']) || empty($_POST['prenom']) || is_numeric($_POST['prenom'])) {
    $champs['prenom'] = "Veuillez indiquer un prénom valide";
}

if ($_SESSION['societe'] == 1) {
    if (!isset($_POST['nom_societe']) || empty($_POST['nom_societe'])) {
        $champs['nom_societe'] = "Veuillez indiquer un nom de société valide";
    }
    if (!isset($_POST['poste']) || empty($_POST['poste'])) {
        $champs['poste'] = "Veuillez indiquer un nom de poste valide";
    }
}


if (!isset($_POST['adresse1']) || empty($_POST['adresse1'])) {
    $champs['adresse1'] = "Veuillez indiquer une adresse";
}

if (!isset($_POST['code_postal']) || empty($_POST['code_postal']) || is_nan($_POST['code_postal'])) {
    $champs['code_postal'] = "Veuillez indiquer un code postal existant";
}


if (!isset($_POST['ville']) || empty($_POST['ville'])) {
    $champs['ville'] = "Veuillez choisir une ville dans la liste";
}

if ($_SESSION['societe'] == 1) {
    if (!isset($_POST['telephone1']) || empty($_POST['telephone1']) || is_nan($_POST['telephone1'])) {
        $champs['telephone1'] = "Veuillez indiquer un numéro de téléphone valide";
    }

    if (!isset($_POST['telephone2']) || empty($_POST['telephone2']) || is_nan($_POST['telephone2'])) {
        $champs['telephone2'] = "Veuillez indiquer un numéro de téléphone valide";
    }
} else {
    if ((!isset($_POST['telephone1']) || empty($_POST['telephone1'])) || (!isset($_POST['telephone2']) || empty($_POST['telephone2']))) {
        $champs['telephone1'] = "Veuillez indiquer un numéro de téléphone valide";
    } else {
        if (isset($_POST['telephone1']) && !empty($_POST['telephone1']) && is_nan($_POST['telephone1'])) {
            $champs['telephone1'] = "Veuillez indiquer un numéro de téléphone valide";
        }
        if (isset($_POST['telephone2']) && !empty($_POST['telephone2']) && is_nan($_POST['telephone2'])) {
            $champs['telephone2'] = "Veuillez indiquer un numéro de téléphone valide";
        }
    }
}

if (!isset($_POST['email']) || empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $champs['email'] = "Veuillez indiquer un email valide";
}

if (isset($_POST['ville']) && !empty($_POST['ville'])) {
    $req = $db->prepare('SELECT ville_nom FROM villes WHERE ville_id=?');
    $req->execute([$_POST['ville']]);
    $dataville = $req->fetch();
    $_POST['villenom'] = $dataville[0];
}

if (count($champs) > 0) {
    if (count($_SESSION['champs']) > 0) {
        reset($_SESSION['champs']);
    }
    if (count($_SESSION['input']) > 0) {
        reset($_SESSION['input']);
    }
    $_SESSION['champs'] = $champs;
    $_SESSION['input'] = $_POST;
    header("location:formulaire.php");
}


if (count($champs) == 0) {

    $stmt = $db->prepare("SELECT email FROM guid WHERE email = ?");
    $stmt->execute(array($_POST['email']));
    $result = $stmt->fetch();

    if ($result != false) {


        if ($_SESSION['societe'] == 1) {
            $stmt = $db->prepare("INSERT INTO `client`(
         `civilite`,
         `nom`,
         `prenom`,
         `poste_occupe`,
         `nom_societe`,
         `adresse1`,
         `adresse2`,
         `telephone1`,
         `telephone2`,
         `email`,
         `ville_id`,
         `GUID`)
         VALUES (
         :civilite,
         :nom,
         :prenom,
         :poste,
         :nom_societe,
         :adresse1,
         :adresse2,
         :telephone1,
         :telephone2,
         :email,
         :ville_id,
         :GUID)");
            extract($_POST);
            var_dump($_POST);
            $stmt->bindParam(':civilite', $gender);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':poste', $poste);
            $stmt->bindParam(':nom_societe', $nom_societe);
            $stmt->bindParam(':adresse1', $adresse1);
            $stmt->bindParam(':adresse2', $adresse2);
            $stmt->bindParam(':telephone1', $telephone1);
            $stmt->bindParam(':telephone2', $telephone2);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':ville_id', $ville_id);
            $stmt->bindParam(':GUID', $_SESSION['GUID']);
            $result = $stmt->execute();
            header("location: form_validate.php");
        } else {
            $stmt = $db->prepare('INSERT INTO `client`(
         `civilite`,
         `nom`,
         `prenom`,
         `adresse1`,
         `adresse2`,
         `telephone1`,
         `telephone2`,
         `email`,
         `ville_id`,
         `GUID`)
         VALUES (
         :civilite,
         :nom,
         :prenom,
         :adresse1,
         :adresse2,
         :telephone1,
         :telephone2,
         :email,
         :ville_id,
         :GUID)');
            extract($_POST);

            if (!isset($telephone1)) {
                $telephone1 = "";
            }
            if (!isset($telephone2)) {
                $telephone2 = "";
            }

            $stmt->bindParam(':civilite', $gender);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':adresse1', $adresse1);
            $stmt->bindParam(':adresse2', $adresse2);
            $stmt->bindParam(':telephone1', $telephone1);
            $stmt->bindParam(':telephone2', $telephone2);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':ville_id', $ville_id);
            $stmt->bindParam(':GUID', $_SESSION['GUID']);
            $result = $stmt->execute();
            header("location: form_validate.php");
        }
    } else {
        if (count($_SESSION['champs']) > 0) {
            reset($_SESSION['champs']);
        }
        if (count($_SESSION['input']) > 0) {
            reset($_SESSION['input']);
        }
        $_SESSION['champs'] = $champs;
        $_SESSION['input'] = $_POST;
        header("location:erreur_form.php");
    }
}
