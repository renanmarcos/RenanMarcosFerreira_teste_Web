<h1>Lista de passageiros</h1>
<ul class="list-group">
  <?php

    require_once("./functions/config.php");

    try {

      $stmt = $conn->prepare("SELECT * FROM passageiros");
      $stmt->execute();
      $result = $stmt->fetchAll();

      foreach($result as $row) {
        echo '<li class="list-group-item d-flex justify-content-between align-items-center">'. $row["nome"];
        echo '<button class="btn btn-primary" onClick="abrirDetalhes('.$row["id"].', 1)"><i class="fa fa-user fa-sm"></i> Detalhes</button>';
        echo '</li>';
      }

    } catch(PDOException $e) {
      echo "<br>" . $e->getMessage();
    }
    $conn = null;
    
  ?>
</ul>

<!-- Modal -->
<div class="modal fade" id="modalDetalhes" tabindex="-1" role="dialog" aria-labelledby="modalDetalhes" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detalhesTitulo"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
        <p id="dtNasc"></p>
        <p id="cpf"></p>
        <p id="sexo"></p>
			</div>

			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>

		</div>

	
	</div>
</div>