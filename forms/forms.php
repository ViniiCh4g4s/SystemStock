<?php
  
  include('../config.php');

  // Código do formulário
  $data['success'] = true;
  $data['message'] = "";

  if (Painel::logado() == false) {
    die("Você precisa fazer login.");
  }

  if(isset($_POST['type_action']) && $_POST['type_action'] == 'add-local'){
    sleep(2);
    $local = $_POST['local'];
    $created_in = date('Y-m-d');
    $created_by = $_SESSION['name'];

    // Podemos cadastrar
    if(User::localExists($local)){
      $data['success'] = false;
      $data['message'] = "Este local já foi adicionado, escolha outro por favor!";
    }else{
      if ($data['success']) {
        $sql = MySql::connect()->prepare("INSERT INTO `tb.local` VALUES (null,?,?,?)");
        $sql->execute(array($local,$created_in,$created_by));
        //tudo okay, só cadastrar
        $data['message'] = "Local adicionado com sucesso!";
      }else{
        $data['success'] = false;
        $data['message'] = "Erro ao adicionar local.";
      }
    }

  }else if(isset($_POST['type_action']) && $_POST['type_action'] == 'add-material'){
    sleep(2);
    $bmp = $_POST['bmp'];
    $description = $_POST['description'];
    $image = "";
    $obs = $_POST['obs'];
    $local = $_POST['local'];

    if ($bmp == "" || $description == "" || $local == "") {
      $data['success'] = false;
      $data['message'] = "Campos vazios não são permitidos!";
    }else if($obs == "") {
      $obs = "Sem alteração";
    }

    if(Painel::bmpExists($bmp)){
      $data['success'] = false;
      $data['message'] = "Este número de BMP já existe, insira outro por favor.";
    }

    if(isset($_FILES['img'])){
      if(Painel::imageValid($_FILES['img'])) {
        $image = $_FILES['img'];
      }else{
        $image = "";
        $data['success'] = false;
        $data['message'] = "Imagem inválida.";
      }
    }

    if ($data['success']) {
      if(is_array($image)) {
        $image = Painel::uploadFile($image);
      }

      $sql = MySql::connect()->prepare("INSERT INTO `tb.materials` VALUES (null,?,?,?,?,?)");
      $sql->execute(array($bmp,$description,$image,$obs,$local));
      
      $data['message'] = "Material adicionado com sucesso!";

      //Listar no histórico.
      $date = date('Y-m-d H:i:s');
      $ip = $_SERVER['REMOTE_ADDR'];
      $changes = "Adicionou o material com BMP: ".$bmp;
      $register = MySql::connect()->prepare("INSERT INTO `tb.historic` VALUES (null,?,?,?,?,?)");
      $register->execute(array($date,$_SESSION['username'],$_SESSION['name'],$ip,$changes));
    }else{
      $data['success'] = false;
      $data['message'] = "Erro ao adicionar material.";
    }

  }else if(isset($_POST['type_action']) && $_POST['type_action'] == 'update-material'){
		sleep(2);
    $id = $_POST['id'];
    $bmp = $_POST['bmp'];
    $description = $_POST['description'];
    $image = $_POST['imgCurrent'];
    $obs = $_POST['obs'];
    $local = $_POST['local'];

    if ($bmp == "" || $description == "" || $local == "") {
      $data['success'] = false;
      $data['message'] = "Campos vazios não são permitidos!";
    }else if($obs == "") {
      $obs = "Sem alteração";
    }

    if(isset($_FILES['img'])){
      if(Painel::imageValid($_FILES['img'])){
        @unlink('../uploads/'.$image);
        $image = $_FILES['img'];
      }else{
        $data['success'] = false;
        $data['message'] = "Imagem inválida.";
      }
    }

    if ($data['success']) {
      if(is_array($image)) {
        $image = Painel::uploadFile($image);
      }

      $sql = MySql::connect()->prepare("UPDATE `tb.materials` SET `description`=?,`img`=?,`obs`=?,`local`=? WHERE id = $id");
      $sql->execute(array($description,$image,$obs,$local));
      
      $data['message'] = "Material atualizado com sucesso!";

      //Listar no histórico.
      $date = date('Y-m-d H:i:s');
      $ip = $_SERVER['REMOTE_ADDR'];
      $changes = "Editou o material com BMP: ".$bmp;
      $register = MySql::connect()->prepare("INSERT INTO `tb.historic` VALUES (null,?,?,?,?,?)");
      $register->execute(array($date,$_SESSION['username'],$_SESSION['name'],$ip,$changes));
    }else{
      $data['success'] = false;
      $data['message'] = "Erro ao atualizar material.";
    }



  }else if(isset($_POST['type_action']) && $_POST['type_action'] == 'delete-material'){
		$id = $_POST['id'];

    $sql = MySql::connect()->prepare("SELECT img FROM `tb.materials` WHERE id = $id");
		$sql->execute();
		$image = $sql->fetch()['img'];
		@unlink('../uploads/'.$image);
		MySql::connect()->exec("DELETE FROM `tb.materials` WHERE id = $id");

    $data['message'] = "Material excluido com sucesso!";

  }else{
    $data['success'] = false;
    $data['message'] = "Erro no formulário.";
  }


  die(json_encode($data));

?>
