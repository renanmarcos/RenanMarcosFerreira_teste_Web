<h1>Resultados de pesquisa para "<?php echo $_SESSION["pesquisa"] ?>"</h1>

<ul class="list-group">
  <?php

    $result = $_SESSION["resultado"];

      if (empty($result)) {
        echo '<h2>Nada encontrado.</h2>';
      } else {
        echo  '<h2>Lista de ' . $_SESSION["options"]. '</h2>';
      }

      foreach($result as $row) {


        $tipo = $_SESSION["options"];
        if ($tipo == "motoristas") $status = $row["status"] == 1 ? "Ativo" : "Inativo";

        if ($tipo == "corridas") {

          $valor = number_format($row["valor"], 2, ',', '.');
          echo '<li class="list-group-item d-flex justify-content-between align-items-center">Corrida #'.
          $row["idcorrida"] . '/ Motorista: ' . $row["motorista"] . ' - Passageiro: ' . $row["passageiro"];
          echo '<span class="badge badge-primary badge-pill"> R$ '. $valor .' </span>';
          echo '</li>';

        } else {

          $number_tipo = $tipo == "passageiros" ? 1 : 0;

          echo '<li class="list-group-item d-flex justify-content-between align-items-center">'. $row["nome"];
          if ($tipo == "motoristas") echo '<span class="pull-right"><span class="badge badge-primary badge-pill">'. $status .'</span>';
          echo '<button style="margin-left: 2em" class="btn btn-primary pull-right" onClick="abrirDetalhes('.$row["id"].', '.$number_tipo.')"><i class="fa fa-user fa-sm"></i> Detalhes</button>';
          echo '</span></li>';

        }

      }

    
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
            if (isset($_SESSION['email']) && $tipo == "motoristas") {
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
            if (isset($_SESSION['email']) && $tipo == "motoristas") {
              echo '<button type="submit" class="btn btn-primary">Atualizar</button>';
            }
          ?>
        </div>

      </form>

		</div>

	
	</div>
</div>