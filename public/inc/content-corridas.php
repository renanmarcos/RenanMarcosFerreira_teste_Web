<h1>Lista de corridas</h1>
<ul class="list-group">
  <?php

    require_once("./functions/config.php");

    try {

      $stmt = $conn->prepare("SELECT  corridas.idcorrida, passageiros.nome AS passageiro,
                                      motoristas.nome AS motorista, corridas.valor
                              FROM passageiros
                              INNER JOIN corridas
                                    ON passageiros.id = corridas.idpassageiro
                              INNER JOIN motoristas
                                    ON corridas.idmotorista = motoristas.id;");
      $stmt->execute();
      $result = $stmt->fetchAll();

      foreach($result as $row) {
        $valor = number_format($row["valor"], 2, ',', '.');
        echo '<li class="list-group-item d-flex justify-content-between align-items-center">Corrida #'.
        $row["idcorrida"] . '/ Motorista: ' . $row["motorista"] . ' - Passageiro: ' . $row["passageiro"];
        echo '<span class="badge badge-primary badge-pill"> R$ '. $valor .' </span>';
        echo '</li>';
      }

    } catch(PDOException $e) {
      echo "<br>" . $e->getMessage();
    }
    $conn = null;
    
  ?>
</ul>