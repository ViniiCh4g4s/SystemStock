<?php
    if(isset($_GET['loggout'])){
        Painel::loggout();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR" >
<head>
  <title>Sistema de Estoque - CSEC</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicons -->
  <link href="<?php echo INCLUDE_PATH; ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo INCLUDE_PATH; ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo INCLUDE_PATH_ASSETS ?>css/style.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

</head>
<body>

<base base="<?php echo INCLUDE_PATH; ?>" />
<!-- partial:index.partial.html -->
<div class="area"></div>
    <nav class="main-menu">
        <ul>
            <li>
                <a href="<?php echo INCLUDE_PATH ?>">
                    <i class="fa fa-list fa-1x"></i>
                    <span class="nav-text">
                        Material BMP
                    </span>
                </a>
              
            </li>
            <li <?php checkPermissionMenu(1);?> class="has-subnav">
                <a href="<?php echo INCLUDE_PATH ?>add-material">
                    <i class="fa fa-plus fa-2x"></i>
                    <span class="nav-text">
                        Adicionar Material
                    </span>
                </a>
                
            </li>
            <li <?php checkPermissionMenu(1);?>class="has-subnav">
                <a href="<?php echo INCLUDE_PATH ?>search-material">
                   <i class="fa fa-pencil-square-o fa-2x"></i>
                    <span class="nav-text">
                        Editar Material
                    </span>
                </a>
                
            </li>
            <li <?php checkPermissionMenu(2);?>class="has-subnav">
                <a href="<?php echo INCLUDE_PATH ?>locals">
                   <i class="fa fa-map-marker fa-2x"></i>
                    <span class="nav-text">
                        Locais
                    </span>
                </a>
                
            </li>
            <li <?php checkPermissionMenu(0);?>class="has-subnav">
                <a href="<?php echo INCLUDE_PATH ?>historic">
                    <i class="fa fa-list-alt fa-2x"></i>
                    <span class="nav-text">
                        Histórico
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo INCLUDE_PATH ?>profile">
                    <i class="fa fa-user fa-2x"></i>
                    <span class="nav-text">
                       <?php echo $_SESSION['name']; ?>
                    </span>
                </a>
            </li>
            <li <?php checkPermissionMenu(2);?>class="has-subnav">
                <a href="<?php echo INCLUDE_PATH ?>edit-users">
                    <i class="fa fa-users fa-2x"></i>
                    <span class="nav-text">
                       Editar usuários
                    </span>
                </a>
            </li>
        </ul>

        <ul class="logout">
            <li>
               <a href="<?php echo INCLUDE_PATH ?>?loggout">
                     <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Sair
                    </span>
                </a>
            </li>  
        </ul>
    </nav>
    <?php Painel::loadPage(); ?>

    <!-- ======= Partial ======= -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js'></script>
    <script src="<?php echo INCLUDE_PATH_ASSETS ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH_ASSETS ?>js/jquery.mask.js"></script>
    <script src="<?php echo INCLUDE_PATH_ASSETS ?>js/jquery.ajaxform.js"></script>
    <script src="<?php echo INCLUDE_PATH_ASSETS ?>js/constants.js"></script>
    <script src="<?php echo INCLUDE_PATH_ASSETS ?>js/script.js"></script>
    <script src="<?php echo INCLUDE_PATH_ASSETS ?>js/ajax.js"></script>

  </body>
</html>
