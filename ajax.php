<?php
    if(isset($_POST['cp']) && !empty($_POST['cp']) && !is_nan($_POST['cp'])){
        require('config/bdd.php');
        $req = $db->prepare('SELECT * FROM villes WHERE ville_code_postal=?');
        $req->execute([$_POST['cp']]);
        $data = $req->fetchAll();

        echo json_encode($data);

    }else{
        header(500);
    }
?>