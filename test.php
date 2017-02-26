<?php


var_dump($_GET);
echo $_GET['q'] . "<br>";
$_GET['q'] = "1fde3e0a-d149-473d-ad92-7a979c06f01c";

$_POST['mail'] = "jeremy.bonhomme@societe2.fr";

require('config/bdd.php');


$stmt = $db->prepare("INSERT INTO client ("
    . "civilite, "
    . "nom,"
    . "prenom,"
    . "poste_occupe, "
    . "adresse1,"
    . "adresse2, "
    . "code_postal, "
    . "ville, "
    . "telephone1, "
    . "telephone2, "
    . "email, "
    . "GUID, "
    . "VALUES (:civilite, "
    . ":nom, "
    . ":prenom, "
    . ":poste_occupe, "
    . ":adresse1, "
    . ":adresse2, "
    . ":code_postal, "
    . ":ville, "
    . ":telephone1, "
    . ":telephone2, "
    . ":email, "
    . "GUID");

extract($_POST);
$stmt->bindParam(':civilite', $gender);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':poste_occupe', $poste);
$stmt->bindParam(':adresse1', $adresse1);
$stmt->bindParam(':adresse2', $adresse2);
$stmt->bindParam(':code_postal', $code_postal);
$stmt->bindParam(':ville', $ville);
$stmt->bindParam(':telephone1', $telephone1);
$stmt->bindParam(':telephone2', $telephone2);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':GUID', $_SESSION['guid']);

$result = $stmt->fetch();
var_dump($result);
print_r($result);

if ($result['email'] == $_POST['mail']) {
    echo "C'est bien tu es gentil";
} else {
    echo "tu pues la merde chinoise batard!";


    if (isset($_GET['q']) && !empty ($_GET['q'])) {
        require('config/bdd.php');

        $stmt = $db->prepare("SELECT id FROM client WHERE GUID = ?");
        $stmt->execute(array($_GET['q']));
        $result = $stmt->fetch();
        if ($result['id'] != false) {
            header('location:client_exist.php');
        } else {
            $stmt = $db->prepare("SELECT GUID FROM guid WHERE GUID = ?");
            $stmt->execute(array($_GET['q']));
            $result = $stmt->fetch();

            if ($_GET['q'] != $result['GUID']) {
                header('location:erreur.php');
            }
        }
    }

