<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="mt-5 mb-5 d-block text-center">
				<h1>Emails</h1>
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
			<a href="/email/send" class="btn btn-primary mb-3">
				<i class="fa fa-plus mr-2"></i>
				Novo
			</a>
			<a href="/" class="btn btn-warning text-white mb-3">
				<i class="fa fa-sign-out-alt mr-2"></i>
				Voltar
			</a>
		</div>
	</div>
</div>