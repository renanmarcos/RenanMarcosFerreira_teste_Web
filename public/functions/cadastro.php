<?php

require_once("config.php");

$email = $_POST["email"];
$senha = $_POST["senha"];

$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

try {

    $stmt = $conn->prepare("INSERT INTO users (email, senha) VALUES (?, ?)");
    $stmt->bindParam(1, $email);
    $stmt->bindParam(2, $senhaCriptografada);
    $stmt->execute();

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

    $conn = null;
?>