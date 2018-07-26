<h1>Lista de motoristas</h1>
<ul class="list-group">
  <?php

    require_once("./functions/config.php");

    try {

      $stmt = $conn->prepare("SELECT * FROM motoristas LIMIT 100");
      $stmt->execute();
      $result = $stmt->fetchAll();

      foreach($result as $row) {
        echo '<li class="list-group-item">'. $row["nome"] .'</li>';
      }

    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    
  ?>
</ul>