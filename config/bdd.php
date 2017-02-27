<?php
try
{
    $db = new PDO('mysql:host=localhost;dbname=connectlife;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, Pdo::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}