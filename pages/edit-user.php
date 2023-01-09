<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<div class="content">
	<?php
		if (isset($_GET['id'])) {
			$id = (int)$_GET['id'];
			$users = Painel::select('tb.users','id = ?',array($id));
		}else{
			
			Painel::alert('error','Você precisa passar o parametro ID');
			die();
		}
	?>
  <div class="box-content">
    <h2>Usuário: <?php echo $users['username']?></h2>

    <form class="ajax row g-3" update action="<?php echo INCLUDE_PATH ?>forms/user.php" method="post" enctype="multipart/form-data">

      <div class="col-md-6">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" name="name" value="<?php echo $users['name']?>">
      </div>
      <div class="col-md-6">
          <label class="form-label">E-mail</label>
          <input type="email" class="form-control" name="email" value="<?php echo $users['email']?>">
      </div>
      <div class="col-12">
          <label class="form-label">Senha</label>
          <input type="password" class="form-control" name="password" value="<?php echo $users['password']?>">
          <div class="form-text">Sua senha deve ter de 8 a 20 caracteres, conter letras maiúsculas e minúsculas, números e não deve conter espaços ou caracteres especiais.</div>
      </div>
      <div class="col-12">
        <label class="form-label">Tipo de Usuário:</label>
        <select class="form-select" aria-label="Default select example" name="role" required>
          <option <?php if($users['role'] == '0') echo 'selected'; ?> value="0">Padrão</option>
          <option <?php if($users['role'] == '1') echo 'selected'; ?> value="1">Sub-Administrador</option>
          <option <?php if($users['role'] == '2') echo 'selected'; ?> value="2">Administrador</option>
        </select>
      </div>

      <div class="col-md-12">
        <input type="hidden" name="type_action" value="update-user">
      </div>

      <div class="col-md-12">
        <input type="hidden" name="id" value="<?php echo $users['id']; ?>">
      </div>
      
      <div class="col-md-12">
        <input type="hidden" name="username" value="<?php echo $users['username']; ?>">
      </div>

      <div class="text-left">
        <button id="loading" style="display: none;float: right" class="btn btn-primary" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Carregando...
        </button>
        <button type="button" id="button" class="btn btn-primary" style="float: right" data-bs-toggle="modal" data-bs-target="#exampleModal">Atualizar</button>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <a>Insira a senha de administrador para confirmar a alteração:</a>
              <input type="password" class="form-control" name="passwordAdmin">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" name="action" class="btn btn-primary" data-bs-dismiss="modal">Confirmar</button>
            </div>
          </div>
        </div>
      </div>

    </form>


  </div><!--box-content-->
</div>