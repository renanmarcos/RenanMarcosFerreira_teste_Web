<?php

require_once("config.php");

$nome = $_POST["nome"];
$dataNasc = $_POST["data"];
$cpf = $_POST["cpf"];
$genero = $_POST["genero"] == "Masculino" ? 'M' : 'F'; 

try {

    $stmt = $conn->prepare("INSERT INTO passageiros (nome, dataNascimento, 
    cpf, sexo) VALUES (?, ?, ?, ?)");

    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $dataNasc);
    $stmt->bindParam(3, $cpf);
    $stmt->bindParam(4, $genero);
    $stmt->execute();
    echo 1;

} catch(PDOException $e) {
    echo 0;
}

    $conn = null;
?>