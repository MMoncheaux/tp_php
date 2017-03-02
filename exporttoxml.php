<?php

function array_to_xml($array, &$xml) {
    foreach($array as $key => $value) {
        if(is_array($value)) {
            if(!is_numeric($key)){
                $subnode = $xml->addChild("$key");
                array_to_xml($value, $subnode);
            }else{
                $subnode = $xml->addChild("item$key");
                array_to_xml($value, $subnode);
            }
        }else {
            $xml->addChild("$key",htmlspecialchars("$value"));
        }
    }
}
require('config/bdd.php');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$last = file_get_contents('cache/lastexport.txt');
if(empty($last) || (isset($_GET['all']) && $_GET['all'] == 'true')){
    $last = 0;
}

$lastdate = date("Y-m-d H:i:s", $last);

$req = $db->prepare('SELECT client.id, client.civilite, client.nom, client.prenom, client.poste_occupe, client.nom_societe, client.adresse1, client.adresse2, client.telephone1, client.telephone2, client.email, client.created_date, client.GUID, villes.ville_nom, villes.ville_code_postal  FROM client INNER JOIN villes WHERE created_date >= ? and villes.  ville_id = client.ville_id');
$req->execute([$lastdate]);
$clients = $req->fetchAll();


$xml = new SimpleXMLElement('<clients></clients>');
array_to_xml($clients, $xml);
$xml->asXML('cache/export.xml');
file_put_contents('cache/lastexport.txt', time());
header('Location: cache/export.xml');
