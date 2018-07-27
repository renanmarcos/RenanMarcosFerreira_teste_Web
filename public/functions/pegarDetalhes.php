<?php

require_once("config.php");

$id = $_POST["id"];
$tipo = $_POST["tipo"] == 1 ? "passageiros" : "motoristas";

try {

    $stmt = $conn->prepare("SELECT * FROM " . $tipo . " WHERE id = ?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $result = $stmt->fetch();
    
    echo json_encode($result);

} catch(PDOException $e) {
    echo $e->getMessage();
}

$conn = null;

?>