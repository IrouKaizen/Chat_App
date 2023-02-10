<?php

try{
$host = 'localhost';
$db = 'chat';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $pdo = new PDO($dsn, $user, $pass);

}
catch(Exception $error){
    die("Erreur" . $error->getMessage());
}
echo "hello";

?>