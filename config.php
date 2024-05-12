<?php
try {
    $PDO = new PDO('mysql:host=localhost;dbname=gestion de pose','root','');
    $conn = $PDO;
} catch (PDOException $e) {
    echo "<p>erreur:" . $e->getMessage();
    die();
}
?>