<?php

require_once("config.php");

class Pessoa {
    public $nome;
    public $is_motorista;
    public $id;
}

try {

    $stmt = $conn->prepare("SELECT * FROM motoristas WHERE status = 1");
    $stmt->execute();
    $result = $stmt->fetchAll();

    $resultado = array();

    foreach ($result as $row) {
        $pessoa = new Pessoa();
        $pessoa->nome = $row["nome"];
        $pessoa->is_motorista = true;
        $pessoa->id = $row["id"];
        array_push($resultado, $pessoa);
    }

    $stmt = $conn->prepare("SELECT * FROM passageiros");
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $row) {
        $pessoa = new Pessoa();
        $pessoa->nome = $row["nome"];
        $pessoa->is_motorista = false;
        $pessoa->id = $row["id"];
        array_push($resultado, $pessoa);
    }
    
    echo json_encode($resultado);

} catch(PDOException $e) {
    echo $e->getMessage();
}

    $conn = null;
?>