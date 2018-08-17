<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="mt-5 mb-5 d-block text-center">
				<h2>Usuários</h2>
			</div>
			<?php if( $status["message"] != null ){ ?>
			<div class="alert alert-<?php echo htmlspecialchars( $status["type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="alert">
				<?php echo htmlspecialchars( $status["message"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } ?>

			<form method="POST" action="/user/update">
				<input type="hidden" name="user_id" value="<?php echo htmlspecialchars( $user["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
				<div class="form-group row">
					<label for="first_name" class="col-sm-2 col-form-label text-right">Primeiro nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo htmlspecialchars( $user["first_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="last_name" class="col-sm-2 col-form-label text-right">Sobrenome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo htmlspecialchars( $user["last_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					</div>
				</div>
				<fieldset class="form-group">
					<div class="row">
						<legend class="col-form-label col-sm-2 pt-0 text-right">Sexo</legend>
						<div class="col-sm-10">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="sex" id="sex1" value="m" <?php if( $user["sex"]=='M' ){ ?>checked<?php } ?>>
								<label class="form-check-label" for="sex1">
									Masculino
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="sex" id="sex2" value="f" <?php if( $user["sex"]=='F' ){ ?>checked<?php } ?>>
								<label class="form-check-label" for="sex2">
									Feminino
								</label>
							</div>
						</div>
					</div>
				</fieldset>
				<div class="form-group row">
					<label for="cpf" class="col-sm-2 col-form-label text-right">CPF</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="cpf" id="cpf" value="<?php echo htmlspecialchars( $user["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					</div>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-success">
						<i class="fa fa-edit mr-2"></i>
						Confirmar
					</button>
					<a href="/user" class="btn btn-warning text-white">
						<i class="fa fa-sign-out-alt mr-2"></i>
						Voltar
					</a>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.alert').alert()
</script>