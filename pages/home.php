<?php
	$pageCurrent = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$limit = isset($_GET['selectedItensperPage']) ? $_GET['selectedItensperPage'] : 200;
	$perPage = isset($_GET['selectedItensperPage']) ? $_GET['selectedItensperPage'] : 200;

  	$perLocal = isset($_GET['selectedItensperLocal']) ? $_GET['selectedItensperLocal'] : false;

	$materials = Painel::selectMaterials('tb.materials',$perLocal,($pageCurrent - 1) * $perPage,$perPage);

	$totalPages = ceil(count(Painel::selectMaterials('tb.materials')) / $perPage);
	$previous = $pageCurrent - 1;
	$next = $pageCurrent + 1;
	
?>
<!-- Template Main CSS File -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>
<link rel='stylesheet' href='https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css'>
<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_ASSETS ?>css/home_style.css">
<div class="container">
  <h1></h1>

  <div id="toolbar" >
  	<form method="get" action="">
  		<select class="form-control" name='selectedItensperPage' id="selectedItensperPage">
					<option disabled selected>Limite por página</option>
					<?php 
						foreach([100,500,10000] as $perPage) {
					?>
					<option <?php if(isset($limit) && $limit == $perPage) echo "selected" ?> value="<?= $perPage; ?>"><?= $perPage; ?></option>
					<?php } ?>
			</select>
  	</form>
	<div style="float: right">
		<?php
			echo '<div style="width:100%;" class="busca-result"><p>Foram encontrados <b>'.count($materials).'</b> resultados</p></div>';
		?>
	</div>
  </div>

  <table 	id="table" 
  				data-search="true"
  				data-toggle="table"
          data-filter-control="true" 
  				data-show-export="true"
  				data-export-types="['doc', 'excel', 'txt', 'csv', 'sql']"
  				data-toolbar="#toolbar">
    <thead class="notSelectable">
      <tr>
        <th data-field="bmp" data-filter-control="input" data-sortable="true" unselectable="on" style="width:5%;">BMP</th>
        <th data-field="description" data-filter-control="input" data-sortable="true" unselectable="on" style="width:40%;">Descrição</th>
        <th data-formatter="imageFormatter" unselectable="on" style="width:10%;">Imagem</th>
        <th ata-field="obs" data-filter-control="input" data-sortable="true" unselectable="on" style="width:30%;">Observação</th>
        <th data-field="locale" data-filter-control="select" data-sortable="true" unselectable="on" style="width:15%;">Local</th>
      </tr>
    </thead>
    <tbody id="countMaterial">
    	<?php
    		foreach ($materials as $key => $value) {
    	?>

    	<tr class="material">
    		<td><?php echo $value['bmp']; ?></td>
    		<td><?php echo $value['description']; ?></td>
    		<td>
				<?php 
					if($value['img'] == ''){
						echo INCLUDE_PATH.'uploads/sem_imagem.png'; 
					}else{
						echo INCLUDE_PATH ?>uploads/<?php echo $value['img']; 
					}
				?>
			</td>
    		<td><?php echo $value['obs']; ?></td>
    		<td><?php echo $value['local']; ?></td>
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
  				echo '<li class="page-item"><a class="page-link" href="'.INCLUDE_PATH.'home?page='.$previous.'&selectedItensperPage='.$limit.'">Anterior</a></li>';
  			}
  			
  			for ($i=1; $i <= $totalPages; $i++) {
  				if ($i == $pageCurrent) {
  					echo '<li class="page-item active"><a class="page-link" href="'.INCLUDE_PATH.'home?page='.$i.'&selectedItensperPage='.$limit.'">'.$i.'</a></li>';
  				}else{
  					echo '<li class="page-item"><a class="page-link" href="'.INCLUDE_PATH.'home?page='.$i.'&selectedItensperPage='.$limit.'">'.$i.'</a></li>';
  				}
  			}

  			if ($pageCurrent == $totalPages) {
  				echo '<li style="display:none;" class="page-item disabled"><a class="page-link" href="">Próximo</a></li>';
  			}else{
  				echo '<li class="page-item"><a class="page-link" href="'.INCLUDE_PATH.'home?page='.$next.'&selectedItensperPage='.$limit.'">Próximo</a></li>';
  			}
  		?>
  	</ul>
  </nav>
</div>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>CVE</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="https://www.linkedin.com/in/vinichagas/" target="_blank">S2 Chagas</a>
    </div>
</footer><!-- End Footer -->

<div class="clear"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js'></script>

<!-- =======  Export table ======= -->
<script src='https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script><script src="<?php echo INCLUDE_PATH_ASSETS ?>js/export.js"></script>

<!-- ======= Important Scripts ======= -->
<script type="text/javascript">

    function imageFormatter(value, row) {
      return '<img src="'+value+'" />';
    }

    $(document).ready(function(){
    	$("#selectedItensperPage").change(function(){
    		$('form').submit();
    	})
    })

    $(document).ready(function(){
      $("#selectedItensperLocal").change(function(){
        $('form').submit();
      })
    })
</script>
