<?php

require_once("config.php");

$email = $_POST["email"];
$senha = $_POST["senha"];

try {

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bindParam(1, $email);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if ( password_verify($senha, $result[0]["senha"]) ) {
        if(!isset($_SESSION)) session_start();
        $_SESSION['email'] = $email;
        echo 1;
    } else {
        echo 0;
    }

} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

    $conn = null;
?>