<?php
	checkPermissionPage(1);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<div class="content">
	<div class="box-content">
		<h2>Adicionar Usuário</h2>

		<form class="ajax row g-3" action="<?php echo INCLUDE_PATH ?>forms/user.php" method="post" enctype="multipart/form-data">

			<div class="col-md-6">
				<label class="form-label">Nome:</label>
				<input type="text" class="form-control" placeholder="Ex: S2 Fulano" aria-label="Username" aria-describedby="basic-addon1" name="name" required>
			</div>
			<div class="col-md-6">
				<label class="form-label">Login:</label>
				<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username" required>
			</div>
			<div class="mb-3">
				<label class="form-label">E-mail:</label>
				<input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
			</div>
			<div class="mb-3">
				<label for="inputPassword5" class="form-label">Senha:</label>
				<input type="password" class="form-control" aria-describedby="passwordHelpBlock" name="password" required>
				<div id="passwordHelpBlock" class="form-text">
				  Sua senha deve ter de 8 a 20 caracteres, conter letras maiúsculas e minúsculas, números e não deve conter espaços ou caracteres especiais.
				</div>
			</div>
			<div class="mb-3">
				<label class="form-label">Tipo de Usuário:</label>
				<select class="form-select" aria-label="Default select example" name="role" required>
					<?php
						foreach (Painel::$roles as $key => $value) {
							if($key <= $_SESSION['role']) echo '<option value="'.$key.'">'.$value.'</option>';
						}
					?>
				</select>
			</div>

			<div class="mb-3">
              <input type="hidden" name="type_action" value="add-user">
            </div>
			
            <div class="text-left">
              <button id="loading" style="display: none;float: right" class="btn btn-primary" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Carregando...
              </button>
              <button style="float: right" id="button" type="submit" name="action" class="btn btn-primary">Adicionar</button>
            </div>
		</form>



	</div><!--box-content-->
</div>