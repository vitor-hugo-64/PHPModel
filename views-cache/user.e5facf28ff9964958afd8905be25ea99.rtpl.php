<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="mt-5 mb-5 d-block text-center">
				<h1>Usuários</h1>
			</div>
			<?php if( $status["message"] != null ){ ?>
			<div class="alert alert-<?php echo htmlspecialchars( $status["type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="alert">
				<?php echo htmlspecialchars( $status["message"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php } ?>
			<a href="/user/insert" class="btn btn-primary mb-3">
				<i class="fa fa-plus mr-2"></i>
				Inserir
			</a>
			<a href="/" class="btn btn-warning text-white mb-3">
				<i class="fa fa-sign-out-alt mr-2"></i>
				Voltar
			</a>

			<div class="table-responsive-lg border rounded mb-5">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Primeiro nome</th>
							<th scope="col">Sobrenome</th>
							<th scope="col">Sexo</th>
							<th scope="col">CPF</th>
							<th style="width: 40px;"></th>
							<th style="width: 40px;"></th>
						</tr>
					</thead>
					<tbody>
						<?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>
						<tr>
							<th scope="row"><?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
							<td><?php echo htmlspecialchars( $value1["first_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
							<td><?php echo htmlspecialchars( $value1["last_name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
							<td><?php echo htmlspecialchars( $value1["sex"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
							<td><?php echo htmlspecialchars( $value1["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
							<td class="text-right">
								<a href="/user/update/<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success btn-sm">
									<i class="fa fa-edit mr-2"></i>
									Editar
								</a>
							</td>
							<td class="text-right">
								<a href="/user/delete/<?php echo htmlspecialchars( $value1["user_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-danger btn-sm">
									<i class="fa fa-trash mr-2"></i>
									Deletar
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>