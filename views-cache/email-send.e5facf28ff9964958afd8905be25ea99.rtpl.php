<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="mt-5 mb-5 d-block text-center">
				<h2>Novo Email</h2>
			</div>
			<form enctype="multipart/form-data" method="POST" action="/email/send">
				<div class="form-group row">
					<label for="subject" class="col-sm-2 col-form-label text-right">Assunto</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="subject" id="subject">
					</div>
				</div>
				<div class="form-group row">
					<label for="body_text" class="col-sm-2 col-form-label text-right">Corpo</label>
					<div class="col-sm-10">
						<textarea name="body_text" id="body_text" class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group row">
					<label for="recipient_email" class="col-sm-2 col-form-label text-right">Email Destinátario</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="recipient_email" id="recipient_email">
					</div>
				</div>
				<div class="form-group row">
					<label for="sender_name" class="col-sm-2 col-form-label text-right">Nome Remetente</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="sender_name" id="sender_name">
					</div>
				</div>
				<div class="form-group row">
					<label for="sender_email" class="col-sm-2 col-form-label text-right">Email Remetente</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" name="sender_email" id="sender_email">
					</div>
				</div>
				<div class="form-group row">
					<label for="attachment" class="col-sm-2 col-form-label text-right">Anexo</label>
					<div class="col-sm-10">
						<input type="file" name="attachment" id="attachment">
					</div>
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-success">
						<i class="fa fa-envelope mr-2"></i>
						Enviar
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