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
				<form method="POST" action="/courier/price-term-calculation">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label text-right">Tipo de serviço</label>
						<div class="col-sm-10">
							<select class="form-control" name="service_code">
								<option value="40010">SEDEX Varejo</option>
								<option value="40045">SEDEX a Cobrar Varejo</option>
								<option value="40215">SEDEX 10 Varejo</option>
								<option value="40290">SEDEX Hoje Varejo</option>
								<option value="41106">PAC Varejo</option>
							</select>							
						</div>
					</div>
					<div class="form-group row">
						<label for="origin_zip" class="col-sm-2 col-form-label text-right">CEP de Origem</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="origin_zip_code" id="origin_zip">
						</div>
					</div>
					<div class="form-group row">
						<label for="destination_zip" class="col-sm-2 col-form-label text-right">CEP de Destino</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="destination_zip_code" id="destination_zip">
						</div>
					</div>
					<div class="form-group row">
						<label for="weight" class="col-sm-2 col-form-label text-right">Peso (kg)</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="weight" id="weight">
						</div>
					</div>
					<div class="form-group row">
						<label for="length" class="col-sm-2 col-form-label text-right">Comprimento (cm)</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="length" id="length">
						</div>
					</div>
					<div class="form-group row">
						<label for="height" class="col-sm-2 col-form-label text-right">Altura (cm)</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="height" id="height">
						</div>
					</div>
					<div class="form-group row">
						<label for="width" class="col-sm-2 col-form-label text-right">Largura (cm)</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="width" id="width">
						</div>
					</div>
					<div class="form-group row">
						<label for="diameter" class="col-sm-2 col-form-label text-right">Diâmetro (cm)</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" name="diameter" id="diameter">
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