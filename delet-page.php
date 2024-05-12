<?php
include 'config.php';

if (isset($_POST["delet"])) {
    $id = $_POST["id"];

    $query = $PDO->prepare('DELETE FROM products WHERE id = ?');
    $result = $query->execute([$id]);
    header('location: edit.php');
}
?>
