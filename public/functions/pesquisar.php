<?php

require_once("config.php");

$pesquisa = $_POST["pesquisa"] . "%";
$options = $_POST["options"];

try {

    if ($options == "motoristas")
        $stmt = $conn->prepare("SELECT * FROM " . $options . " WHERE nome ILIKE ? ORDER BY status DESC");
    else if ($options == "passageiros")
        $stmt = $conn->prepare("SELECT * FROM " . $options . " WHERE nome ILIKE ?");
    else
        $stmt = $conn->prepare("SELECT  corridas.idcorrida, passageiros.nome AS passageiro,
                                        motoristas.nome AS motorista, corridas.valor
                                FROM passageiros
                                INNER JOIN corridas
                                    ON passageiros.id = corridas.idpassageiro
                                INNER JOIN motoristas
                                    ON corridas.idmotorista = motoristas.id
                                WHERE motoristas.nome ILIKE ?");

    $stmt->bindParam(1, $pesquisa);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if(!isset($_SESSION)) session_start();

    $_SESSION['resultado'] = $result;
    $_SESSION['pesquisa'] = $_POST['pesquisa'];
    $_SESSION['options'] = $options;

    echo 1;

} catch(PDOException $e) {
    echo $e->getMessage();
}

    $conn = null;
?>