<?php
try
{
    $db = new PDO('mysql:host=localhost;dbname=connectlife;charset=utf8mb4', 'root', '');
}
catch(PDOException $e)
{
    echo $e->getMessage();
}