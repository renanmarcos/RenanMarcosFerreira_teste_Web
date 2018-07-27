<?php

require_once("config.php");

$nome = $_POST["nome"];
$dataNasc = $_POST["data"];
$cpf = $_POST["cpf"];
$modeloCarro = $_POST["modelo"];
$status = $_POST["status"] == "Ativo" ? 1 : 0;
$genero = $_POST["genero"] == "Masculino" ? 'M' : 'F'; 

try {

    $stmt = $conn->prepare("INSERT INTO motoristas (nome, dataNascimento, 
    cpf, modeloCarro, status, sexo) VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $dataNasc);
    $stmt->bindParam(3, $cpf);
    $stmt->bindParam(4, $modeloCarro);
    $stmt->bindParam(5, $status);
    $stmt->bindParam(6, $genero);
    $stmt->execute();
    echo 1;

} catch(PDOException $e) {
    echo 0;
}

    $conn = null;
?>