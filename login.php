<?php
  if(isset($_COOKIE['rememberMe'])){
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
    $sql = MySql::connect()->prepare("SELECT * FROM `tb.users` WHERE username = ? AND password = ?");
    $sql->execute(array($username, $password));
    if($sql->rowCount() == 1){
      $info = $sql->fetch();
      $_SESSION['login'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      $_SESSION['email'] = $info['email'];
      $_SESSION['name'] = $info['name'];
      $_SESSION['role'] = $info['role'];
      Painel::redirect(INCLUDE_PATH);
    }
  }
?>
<!DOCTYPE html>
<head>
  <title>Login CSEC</title>
  <meta charset="UTF-8">
  
  <!-- Favicons -->
  <link href="<?php echo INCLUDE_PATH; ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo INCLUDE_PATH; ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'><link rel="stylesheet" href="<?php echo INCLUDE_PATH_ASSETS ?>css/login_style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper">
    <?php
      if (isset($_POST['action'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = MySql::connect()->prepare("SELECT * FROM `tb.users` WHERE username = ? AND password = ?");
        $sql->execute(array($username, $password));
        if($sql->rowCount() == 1){
          $info = $sql->fetch();
          //logamos com sucesso.
          $_SESSION['login'] = true;
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
          $_SESSION['email'] = $info['email'];
          $_SESSION['name'] = $info['name'];
          $_SESSION['role'] = $info['role'];
          if (isset($_POST['rememberMe'])) {
            setcookie('rememberMe',true,time()+(60*60*24),'/');
            setcookie('username',$username,time()+(60*60*24),'/');
            setcookie('password',$password,time()+(60*60*24),'/');
          }
          Painel::redirect(INCLUDE_PATH);
        }else{
          //falhou
          echo '<div class="col-md-12 text-center">
        <div class="error-message" name="error-message">Usuário ou senha incorretos.</div>
      </div>';
        }
      }
    ?>
    <form class="form-signin" method="post">       
      <h2 class="form-signin-heading">Login</h2>
      <input type="text" class="form-control" name="username" placeholder="Usuário" required=""/>
      <input type="password" class="form-control" name="password" placeholder="Senha" required=""/>      
      <label class="checkbox">
        <input type="checkbox" name="rememberMe"> Permanecer conectado
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="action">Login</button>
    </form>
  </div>
  
</body>
</html>
