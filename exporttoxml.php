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

$req = $db->prepare('SELECT * FROM client WHERE created_date >= ?');
$req->execute([$lastdate]);
$clients = $req->fetchAll();

$xml = new SimpleXMLElement('<clients></clients>');
array_to_xml($clients, $xml);
$xml->asXML('cache/export.xml');
header('Location: cache/export.xml');
file_put_contents('cache/lastexport.txt', time());