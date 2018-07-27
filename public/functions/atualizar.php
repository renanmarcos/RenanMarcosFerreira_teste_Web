<?php

require_once("config.php");

$status = $_POST["status"] == "Ativo" ? 1 : 0;
$id = $_POST["id"];

try {

    $stmt = $conn->prepare("UPDATE motoristas SET status = ". $status ." WHERE id = " . $id);
    $stmt->execute();
    echo 1;

} catch(PDOException $e) {
    echo 0;
}

    $conn = null;
?>