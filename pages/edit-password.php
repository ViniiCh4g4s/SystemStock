<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<div class="content">
	<div class="box-content">

		<form class="row g-3" method="post" enctype="multipart/form-data">

			<?php
				if (isset($_POST['action'])) {
					
					$passwordOld = $_POST['passwordOld'];
					$passwordNew = $_POST['passwordNew'];
					$passwordRepet = $_POST['passwordRepet'];
					$user = new User();
					if ($passwordOld == $_SESSION['password']) {
						if ($passwordNew == $passwordRepet) {
							if ($passwordNew != $_SESSION['password']) {
								if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{8,20}$/', $passwordNew)) {
									if ($user->updatePassword($passwordNew)) {
										$_SESSION['password'] = $passwordNew;
										Painel::alert('success','Senha atualizada com sucesso');

										//Listar no histórico.
						                $date = date('Y-m-d H:i:s');
						                $ip = $_SERVER['REMOTE_ADDR'];
						                $changes = "Alterou a senha de usuário";
						                $register = MySql::connect()->prepare("INSERT INTO `tb.historic` VALUES (null,?,?,?,?,?)");
						                $register->execute(array($date,$_SESSION['username'],$_SESSION['name'],$ip,$changes));
									}else{
										Painel::alert('error','Erro ao atualizar');
									}
								}else{
									Painel::alert('error','A senha deve atender aos requisitos de complexidade.');
								}
							}else{
								Painel::alert('error','A senha deve ser diferente da anterior.');
							}
						}else{
							Painel::alert('error','As senhas não conferem');
						}
					}else{
						Painel::alert('error','Senha antiga incorreta');
					}
					
				}
			?>

			<div class="row g-3 align-items-center">
				<div class="col-auto">
					<label class="col-form-label">Senha Antiga</label>
				</div>
				<div class="col-auto">
					<input type="password" class="form-control" name="passwordOld">
				</div>
			</div>
			<div class="row g-3 align-items-center">
				<div class="col-auto">
					<label class="col-form-label">Nova Senha</label>
				</div>
				<div class="col-auto">
					<input type="password" class="form-control" name="passwordNew">
				</div>
				<div class="col-auto">
					<span class="form-text">Sua senha deve ter de 8 a 20 caracteres, conter letras maiúsculas e minúsculas, números e não deve conter espaços ou caracteres especiais.</span>
				</div>
			</div>
			<div class="row g-3 align-items-center">
				<div class="col-auto">
					<label fclass="col-form-label">Repita a Senha</label>
				</div>
				<div class="col-auto">
					<input type="password" class="form-control" name="passwordRepet">
				</div>
			</div>
			<div class="col-12">
				<button type="submit" class="btn btn-primary" name="action">Alterar</button>
			</div>
		</form>


	</div><!--box-content-->
</div>