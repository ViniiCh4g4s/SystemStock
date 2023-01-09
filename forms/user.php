<?php
  
  include('../config.php');

  // Código do formulário
  $data['success'] = true;
  $data['message'] = "";

  if (Painel::logado() == false) {
    die("Você precisa fazer login.");
  }

  if(isset($_POST['type_action']) && $_POST['type_action'] == 'add-user'){
    sleep(2);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if ($name == "" || $email == "" || $username == "" || $password == "" || $role == "") {
      $data['success'] = false;
      $data['message'] = "Campos vazios não são permitidos!";
    }

    // Podemos cadastrar
    if($role > $_SESSION['role']){
      $data['success'] = false;
      $data['message'] = "Você precisa selecionar um tipo de usuário menor ou igual ao seu!";
    }else if(User::userExists($username)){
      $data['success'] = false;
      $data['message'] = "O login já existe, selecione outro por favor!";
    }else{
      //Cadastrando no banco de dados.
      //Validação de senha segura.
      if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{8,20}$/', $password)) {
        if ($data['success']) {
          $sql = MySql::connect()->prepare("INSERT INTO `tb.users` VALUES (null,?,?,?,?,?)");
          $sql->execute(array($username,$password,$email,$name,$role));
          //tudo okay, só cadastrar
          $data['message'] = "Usuário adicionado com sucesso!";

          //Listar no histórico.
          $date = date('Y-m-d H:i:s');
          $ip = $_SERVER['REMOTE_ADDR'];
          $changes = "Adicionou o usuário: ".$username;
          $register = MySql::connect()->prepare("INSERT INTO `tb.historic` VALUES (null,?,?,?,?,?)");
          $register->execute(array($date,$_SESSION['username'],$_SESSION['name'],$ip,$changes));
        }else{
          $data['success'] = false;
          $data['message'] = "Erro ao adicionar usuário.";
        }
      }else{
        $data['success'] = false;
        $data['message'] = "A senha deve atender aos requisitos de complexidade.";
      }
      
    }

  }else if(isset($_POST['type_action']) && $_POST['type_action'] == 'update-user'){
		sleep(2);
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    //Senha de confirmação admin
    $passwordAdmin = $_POST['passwordAdmin'];

    if ($name == "" || $email == "" || $username == "" || $password == "" || $role == "") {
      $data['success'] = false;
      $data['message'] = "Campos vazios não são permitidos!";
    }

    //Cadastrando no banco de dados.
    //Validação de senha segura.
    if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{8,20}$/', $password)) {
      if ($passwordAdmin == $_SESSION['password']) {
        if ($data['success']) {
          $sql = MySql::connect()->prepare("UPDATE `tb.users` SET `name` = ?,`email` =?,`username` = ?, `password` = ?,`role` = ? WHERE id = $id");
          $sql->execute(array($name,$email,$username,$password,$role));
          //tudo okay, só cadastrar
          $data['message'] = "O usuário foi atualizado com sucesso!";

          //Listar no histórico.
          $date = date('Y-m-d H:i:s');
          $ip = $_SERVER['REMOTE_ADDR'];
          $changes = "Editou o usuário: ".$username;
          $register = MySql::connect()->prepare("INSERT INTO `tb.historic` VALUES (null,?,?,?,?,?)");
          $register->execute(array($date,$_SESSION['username'],$_SESSION['name'],$ip,$changes));
        }else{
          $data['success'] = false;
          $data['message'] = "Erro ao atualizar.";
        }
      }else{
        $data['success'] = false;
        $data['message'] = "A senha de administrador está incorreta.";
      }
    }else{
      $data['success'] = false;
      $data['message'] = "A senha deve atender aos requisitos de complexidade.";
    }

  }else if(isset($_POST['type_action']) && $_POST['type_action'] == 'update-password'){
    $currentPassword = $_POST['currentPassword'];
		$passwordOld = $_POST['passwordOld'];
    $passwordNew = $_POST['passwordNew'];
    $passwordRepet = $_POST['passwordRepet'];
    $user = new User();

    if ($passwordOld == "" || $passwordNew == "" || $passwordRepet == "") {
      $data['success'] = false;
      $data['message'] = "Campos vazios não são permitidos!";
    }

    if ($passwordOld == $currentPassword) {
      if ($passwordNew == $passwordRepet) {
        if ($passwordNew != $currentPassword) {
          if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{8,20}$/', $passwordNew)) {
            if ($user->updatePassword($passwordNew)) {
              $currentPassword = $passwordNew;
              $data['message'] = "Senha atualizada com sucesso!";

              //Listar no histórico.
              $date = date('Y-m-d H:i:s');
              $ip = $_SERVER['REMOTE_ADDR'];
              $changes = "Alterou a própria senha de usuário";
              $register = MySql::connect()->prepare("INSERT INTO `tb.historic` VALUES (null,?,?,?,?,?)");
              $register->execute(array($date,$_SESSION['username'],$_SESSION['name'],$ip,$changes));
            }else{
              $data['success'] = false;
              $data['message'] = "Erro ao atualizar.";
            }
          }else{
            $data['success'] = false;
            $data['message'] = "A senha deve atender aos requisitos de complexidade.";
          }
        }else{
          $data['success'] = false;
          $data['message'] = "A senha deve ser diferente da anterior.";
        }
      }else{
        $data['success'] = false;
        $data['message'] = "As senhas não conferem.";
      }
    }else{
      $data['success'] = false;
      $data['message'] = "Senha antiga incorreta.";
    }

  }

  die(json_encode($data));

?>
