<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<div class="content">
  <div class="box-content">
    <form class="row g-3" method="post"> <!-- precisa desse atributo para upload de imagem enctype="multipart/form-data" -->

      <?php
        if (isset($_POST['action2'])) {
          
          $name = $_POST['name'];
          $username = $_POST['username'];
          $email = $_POST['email'];

          $user = new User();
          if ($user->updateUser($name,$username,$email)) {
            $_SESSION['name'] = $name;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            Painel::alert('success','Dados atualizados com sucesso');

            //Listar no histórico.
            $date = date('Y-m-d H:i:s');
            $ip = $_SERVER['REMOTE_ADDR'];
            $changes = "Alterou os dados de usuário";
            $register = MySql::connect()->prepare("INSERT INTO `tb.historic` VALUES (null,?,?,?,?,?)");
            $register->execute(array($date,$_SESSION['username'],$_SESSION['name'],$ip,$changes));
          }else{
            Painel::alert('error','Erro ao atualizar');
          }
        }
      ?>

      <div class="col-md-6">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['name']?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Usuário</label>
          <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username']?>">
      </div>
      <div class="col-12">
          <label class="form-label">E-mail</label>
          <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']?>">
          <div class="form-text" >Nunca compartilharemos seu e-mail com mais ninguém.</div>
      </div>
      <div class="col-12">
          <label class="form-label"><b>Tipo de Usuário:</b> <?php echo pickRole($_SESSION['role']); ?></label>
          <button type="submit" class="btn btn-primary" style="float: right;" name="action2">Alterar dados</button>
      </div>
    </form>

    <form class="ajax" action="<?php echo INCLUDE_PATH ?>forms/user.php" method="post">
      <div class="form-text"> 
        
          <div class="col-md-12">
            <input type="hidden" name="type_action" value="update-password">
          </div>

          <div class="col-md-12">
            <input type="hidden" name="currentPassword" value="<?php echo $_SESSION['password']; ?>">
          </div>
      
          <a href="<?php echo INCLUDE_PATH ?>edit-password" data-bs-toggle="modal" data-bs-target="#exampleModal">Clique aqui</a> para alterar a senha.
            
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <a>Senha Antiga:</a>
                <input type="password" class="form-control" name="passwordOld">
              </div>
              <div class="modal-body">
                <a>Nova Senha:</a>
                <input type="password" class="form-control" name="passwordNew">
                <span class="form-text">Sua senha deve ter de 8 a 20 caracteres, conter letras maiúsculas e minúsculas, números e não deve conter espaços ou caracteres especiais.</span>
              </div>
              <div class="modal-body">
                <a>Repita a Senha:</a>
                <input type="password" class="form-control" name="passwordRepet">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" name="action" class="btn btn-primary" data-bs-dismiss="modal">Alterar</button>
              </div>
            </div>
            </div>
          </div>
      </div>
    </form>


  </div><!--box-content-->
</div>