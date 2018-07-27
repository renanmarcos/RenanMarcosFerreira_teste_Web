<!-- Card -->
<div id="logged-card" class="card">
	<div class="card-body ">
		<h5 class="card-title">Adminstrador</h5>
		<h6 class="card-subtitle mb-2"><?php echo $_SESSION['email'] ?></h6>
		<div class="text-center">
			<button type="button" class="btn btn-primary" onClick="abrirFormInsertCorrida()">Inserir corrida</button>
		</div>
	</div>
</div>

<p class="text-center"><a class="logout" href="#">Fazer logout</a></p>

<!-- Modal -->
<div class="modal fade" id="modalInserirCorrida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Inserir corrida</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-cadastroCorrida">
				<div class="modal-body">
					<div class="form-group">
						<label for="motorista">Motorista</label>
						<select class="form-control" id="motorista" name="motorista">
						</select>
						<small id="motoristaHelpBlock" class="form-text text-muted">
							Os motoristas inativos não aparecem na lista.
						</small>
					</div>
					<div class="form-group">
						<label for="passageiro">Passageiro</label>
						<select class="form-control" id="passageiro" name="passageiro">
						</select>
					</div>
					<div class="form-group">
						<label for="valor">Valor da corrida</label>
						<input type="number" step="0.50" name="valor" class="form-control" id="valor" placeholder="22.30" required>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Descartar</button>
						<button type="submit" class="btn btn-primary">Cadastrar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>