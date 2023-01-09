<?php
	checkPermissionPage(2);

	if(isset($_GET['delete'])){
		$idDelete = intval($_GET['delete']);
		$select = Painel::select('tb.local','id = ?',array($idDelete));

		//Listar no histórico.
		$date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];
		$changes = "Excluiu o local: ".$select['local'];
		$register = MySql::connect()->prepare("INSERT INTO `tb.historic` VALUES (null,?,?,?,?,?)");
		$register->execute(array($date,$_SESSION['username'],$_SESSION['name'],$ip,$changes));

		Painel::delete('tb.local',$idDelete);
		Painel::redirect(INCLUDE_PATH.'locals');
	}

	$local = Painel::selectLocal('tb.local');
	
	
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>
<div class="content">
	<div class="box-content">
		<section>
			<div class="container">
				<?php 
			  		if(isset($_GET['actionSearch'])){
			  			$result = $_GET['result'];
			  			if ($result == '') {
			  				header('Location: '.INCLUDE_PATH.'/locals');
			  			}else{
			  				$sql = MySql::connect()->prepare("SELECT * FROM `tb.local` WHERE `local` LIKE '%".$result."%' OR `created_by` LIKE '%".$result."%'");
							$sql->execute();
							$locals = $sql->fetchAll();
			  			}
			  		}
			  	?>
			  	<nav class="navbar navbar-light" style="background-color: white;">
			  		<div class="container-fluid">
						<form class="ajax row g-3" action="<?php echo INCLUDE_PATH ?>forms/forms.php" method="post" enctype="multipart/form-data">

							<div class="col-md-12">
								<input type="hidden" name="type_action" value="add-local">
							</div>
						
							<button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">Adicionar Local</button>
							
							<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<a>Insira o nome do local:</a>
										<input type="text" class="form-control" name="local">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
										<button type="submit" name="action" class="btn btn-primary" data-bs-dismiss="modal">Adicionar</button>
									</div>
								</div>
								</div>
							</div>
						</form>
			  			<!--<form class="d-flex">
			  				<input class="form-control me-2" type="search" placeholder="Digite sua busca..." name="result">
			  				<button class="btn btn-outline-primary" type="submit" name="actionSearch">Buscar</button>
			  			</form>-->
			  		</div>
			  	</nav>
			  	<table class="table table-bordered">
			  		<thead>
			  			<tr>
			  				<th style="width:40%;">Local</th>
			        		<th style="width:25%;">Criado em</th>
					        <th style="width:25%;">Criado por</th>
					        <th style="width:10%;"></th>
					    </tr>
					</thead>
					<tbody>
				    	<?php
				    		foreach ($local as $key => $value) {
				    	?>

				    	<tr class='material'>
				    		<td><?php echo $value['local']; ?></td>
				    		<td><?php echo $value['created_in']; ?></td>
				    		<td><?php echo $value['created_by']; ?></td>
				    		<td><a actionBtn="delete" class="btn btn-danger" href="<?php echo INCLUDE_PATH ?>locals?delete=<?php echo $value['id']; ?>" role="button">Excluir</a></td>
				    	</tr>

				    	<?php } ?>
				    </tbody>
				</table>
			</div>
		</section>
	</div><!--box-content-->
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>