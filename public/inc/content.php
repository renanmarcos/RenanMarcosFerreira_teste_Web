<h1>Lista de motoristas</h1>
<div class="alert alert-info" role="alert">
  "Inativo" representa que o motorista está de férias.
</div>
<ul class="list-group">
  <?php

    require_once("./functions/config.php");

    try {

      $stmt = $conn->prepare("SELECT * FROM motoristas ORDER BY status DESC");
      $stmt->execute();
      $result = $stmt->fetchAll();

      foreach($result as $row) {
        
        $status = $row["status"] == 1 ? "Ativo" : "Inativo";

        echo '<li class="list-group-item d-flex justify-content-between align-items-center">'. $row["nome"];
        echo '<span class="pull-right"><span class="badge badge-primary badge-pill">'. $status .'</span>';
        echo '<button style="margin-left: 2em" class="btn btn-primary pull-right" onClick="abrirDetalhes('.$row["id"].', 0)"><i class="fa fa-user fa-sm"></i> Detalhes</button>';
        echo '</span></li>';
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

			<form id="form-status">

        <div class="modal-body">
          <p id="dtNasc"></p>
          <p id="cpf"></p>
          <p id="sexo"></p>
          <?php
            if (isset($_SESSION['email'])) {
              echo '<div class="form-group">
                      <label for="status">Status:</label>
                      <select class="form-control" id="status" name="status">
                        <option>Ativo</option>
                        <option>Inativo</option>
                      </select>                      
                    </div>';
            }
          ?>
          <input name="id" id="details-id" type="hidden"></input>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <?php
            if (isset($_SESSION['email'])) {
              echo '<button type="submit" class="btn btn-primary">Atualizar</button>';
            }
          ?>
        </div>

      </form>

		</div>

	
	</div>
</div>