<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<div class="row">
		<div class="col pt-5">
			<?php if( $status["message"]!=null ){ ?>
			<div class="alert alert-<?php echo htmlspecialchars( $status["type"], ENT_COMPAT, 'UTF-8', FALSE ); ?> alert-dismissible fade show" role="alert">
				<?php echo htmlspecialchars( $status["message"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } ?>
			<form method="post" action="/cep/get">
				<div class="form-group">
					<label>Informe o CEP</label>
					<input type="text" name="zip_code" class="form-control" placeholder="CEP">
				</div>
				<button class="btn btn-success">
					<i class="fa fa-search mr-2"></i>
					Pesquisar
				</button>
			</form>
			<a href="/" class="btn btn-warning mt-2">
				<i class="fa fa-angle-double-left mr-2"></i>
				Voltar
			</a>
		</div>
	</div>
</div>