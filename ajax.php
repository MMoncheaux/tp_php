<?php
    if(isset($_POST['cp']) && !empty($_POST['cp']) && !is_nan($_POST['cp'])){
        try{
            $db = new PDO('mysql:host=localhost;dbname=connectlife;charset=utf8mb4', 'root', '');
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        $req = $db->prepare('SELECT * FROM villes WHERE ville_code_postal=?');
        $req->execute([$_POST['cp']]);
        $data = $req->fetchAll();

        echo json_encode($data);

    }else{
        header(500);
    }
?>