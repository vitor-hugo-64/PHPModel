<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="mt-5 mb-5 d-block text-center">
				<h1>Correios</h1>
				<h3>Saiba o frete e o prazo de acordo com o serviço dos correios</h3>
			</div>
			<?php if( $status["message"] != null ){ ?>
			<div class="alert alert-<?php echo htmlspecialchars( $status["type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="alert">
				<?php if( $status["type"] == 'success' ){ ?>
				<i class="fa fa-check-circle mr-2"></i>
				<?php }else{ ?>
				<i class="fa fa-exclamation-circle mr-2"></i>
				<?php } ?>
				<?php echo htmlspecialchars( $status["message"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } ?>
			<div class="mt-5">
				<form>
					<div class="form-group row">
						<label for="weight" class="col-sm-2 col-form-label text-right">CEP de Origem </label>
						<div class="col-sm-10">
							<input type="text" class="form-control-plaintext" value="<?php echo htmlspecialchars( $courier["origin_zip_code"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="weight" class="col-sm-2 col-form-label text-right">CEP de Destino </label>
						<div class="col-sm-10">
							<input type="text" class="form-control-plaintext" value="<?php echo htmlspecialchars( $courier["destination_zip_code"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
						</div>
					</div>					
					<div class="form-group row">
						<label for="origin_zip" class="col-sm-2 col-form-label text-right">Codigo de Servico </label>
						<div class="col-sm-10">
							<input type="text" class="form-control-plaintext" value="<?php echo htmlspecialchars( $calculationResult["Codigo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="destination_zip" class="col-sm-2 col-form-label text-right">Valor</label>
						<div class="col-sm-10">
							<input type="text" class="form-control-plaintext" value="R$ <?php echo htmlspecialchars( $calculationResult["Valor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="weight" class="col-sm-2 col-form-label text-right">Prazo de Entrega</label>
						<div class="col-sm-10">
							<input type="text" class="form-control-plaintext" value="<?php echo htmlspecialchars( $calculationResult["PrazoEntrega"], ENT_COMPAT, 'UTF-8', FALSE ); ?> Dias" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="weight" class="col-sm-2 col-form-label text-right">Valor sem Adicionais</label>
						<div class="col-sm-10">
							<input type="text" class="form-control-plaintext" value="R$ <?php echo htmlspecialchars( $calculationResult["ValorSemAdicionais"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly>
						</div>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-success">
							<i class="fa fa-envelope mr-2"></i>
							Enviar
						</button>
						<a href="/" class="btn btn-warning text-white">
							<i class="fa fa-sign-out-alt mr-2"></i>
							Voltar
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>