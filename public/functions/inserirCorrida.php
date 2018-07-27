<?php

require_once("config.php");

$passageiro = $_POST["passageiro"];
$motorista = $_POST["motorista"];
$valor = $_POST["valor"];

try {

    $stmt = $conn->prepare("INSERT INTO corridas (idpassageiro, idmotorista, 
    valor) VALUES (?, ?, ?)");

    $stmt->bindParam(1, $passageiro);
    $stmt->bindParam(2, $motorista);
    $stmt->bindParam(3, $valor);
    $stmt->execute();
    echo 1;

} catch(PDOException $e) {
    echo 0;
}

    $conn = null;
?>