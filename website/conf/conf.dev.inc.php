
<?php

$host = '127.0.0.1';
$dbname = 'dev6';
$user = 'root';
$password = 'root';

try {
    $dbh = new PDO('mysql:dbname=' . $dbname . ';host=' . $host.";port=8889", $user, $password);
} catch (PDOException $e) {
    die('Connexion échouée : ' . $e->getMessage());
}
