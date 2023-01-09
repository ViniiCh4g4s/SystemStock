<?php
  checkPermissionPage(0);

  $pageCurrent = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  $perPage = 100;

  $historic = Painel::selectAll('tb.historic',($pageCurrent - 1) * $perPage,$perPage);

  $totalPages = ceil(count(Painel::selectAll('tb.historic')) / $perPage);
  $previous = $pageCurrent - 1;
  $next = $pageCurrent + 1;
  
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>
<div class="content">
  <div class="box-content">
    <section>
      <div class="container">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th >Data da atualização</th>
                  <th >Login</th>
                  <th >Nome</th>
                  <th >Endereço IP</th>
                  <th >Ação</th>
              </tr>
          </thead>
          <tbody>
              <?php
                foreach ($historic as $key => $value) {
              ?>

              <tr class='material'>
                <td><?php echo $value['date']; ?></td>
                <td><?php echo $value['username']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['ip']; ?></td>
                <td><?php echo $value['changes']; ?></td>
              </tr>

              <?php } ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation example" style="padding: 2% 0;">
          <ul class="pagination justify-content-center">
            <?php
              if ($pageCurrent == 1) {
                echo '<li style="display:none;" class="page-item disabled"><a class="page-link" href="">Anterior</a></li>';
              }else{
                echo '<li class="page-item"><a class="page-link" href="'.INCLUDE_PATH.'historic?page='.$previous.'">Anterior</a></li>';
              }
              
              for ($i=1; $i <= $totalPages; $i++) {
                if ($i == $pageCurrent) {
                  echo '<li class="page-item active"><a class="page-link" href="'.INCLUDE_PATH.'historic?page='.$i.'">'.$i.'</a></li>';
                }else{
                  echo '<li class="page-item"><a class="page-link" href="'.INCLUDE_PATH.'historic?page='.$i.'">'.$i.'</a></li>';
                }
              }

              if ($pageCurrent == $totalPages) {
                echo '<li style="display:none;" class="page-item disabled"><a class="page-link" href="">Próximo</a></li>';
              }else{
                echo '<li class="page-item"><a class="page-link" href="'.INCLUDE_PATH.'historic?page='.$next.'">Próximo</a></li>';
              }
            ?>
          </ul>
        </nav>
      </div>
    </section>
  </div><!--box-content-->
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>