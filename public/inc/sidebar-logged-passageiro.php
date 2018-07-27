<!-- Card -->
<div id="logged-card" class="card">
	<div class="card-body ">
		<h5 class="card-title">Adminstrador</h5>
		<h6 class="card-subtitle mb-2"><?php echo $_SESSION['email'] ?></h6>
		<div class="text-center">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInserirPassageiro">Inserir passageiro</button>
		</div>
	</div>
</div>

<p class="text-center"><a class="logout" href="#">Fazer logout</a></p>

<!-- Modal -->
<div class="modal fade" id="modalInserirPassageiro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Inserir passageiro</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-cadastroPassageiro">
				<div class="modal-body">
					<div class="form-group">
						<label for="nome">Nome do passageiro</label>
						<input type="text" name="nome" class="form-control" id="nome" placeholder="Fulano" required>
					</div>
					<div class="form-group">
						<label for="datepicker">Data de nascimento</label>
						<input class="form-control" name="data" id="datepicker" placeholder="DD/MM/AAAA" required>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col">
								<label for="cpf">CPF</label>
								<input type="text" id="cpf" name="cpf" class="form-control" maxlength="14" placeholder="XXX.XXX.XXX-XX" required>
							</div>
							<div class="col">
								<label for="genero">Gênero:</label>
								<select class="form-control" id="genero" name="genero">
									<option>Masculino</option>
									<option>Feminino</option>
								</select>
							</div>
						</div>
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