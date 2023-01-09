<?php
	checkPermissionPage(2);

	if(isset($_GET['delete'])){
		$idDelete = intval($_GET['delete']);
		$select = Painel::select('tb.users','id = ?',array($idDelete));

		//Listar no histórico.
		$date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];
		$changes = "Excluiu o usuário: ".$select['username'];
		$register = MySql::connect()->prepare("INSERT INTO `tb.historic` VALUES (null,?,?,?,?,?)");
		$register->execute(array($date,$_SESSION['username'],$_SESSION['name'],$ip,$changes));

		Painel::delete('tb.users',$idDelete);
		Painel::redirect(INCLUDE_PATH.'edit-users');
	}

	$users = Painel::selectUsers('tb.users');
	
	
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>
<div class="content">
	<div class="box-content">
		<section>
			<div class="container">
				<?php 
			  		if(isset($_GET['action'])){
			  			$result = $_GET['result'];
			  			if ($result == '') {
			  				header('Location: '.INCLUDE_PATH.'/edit-users');
			  			}else{
			  				$sql = MySql::connect()->prepare("SELECT * FROM `tb.users` WHERE username LIKE '%".$result."%' OR email LIKE '%".$result."%' OR name LIKE '%".$result."%'");
							$sql->execute();
							$users = $sql->fetchAll();
			  			}
			  		}
			  	?>
			  	<nav class="navbar navbar-light" style="background-color: white;">
			  		<div class="container-fluid">
			  			<a class="btn btn-light" href="<?php echo INCLUDE_PATH ?>add-user" role="button">Adicionar Usuário</a>
			  			<form class="d-flex">
			  				<input class="form-control me-2" type="search" placeholder="Nome ou e-mail" name="result">
			  				<button class="btn btn-outline-primary" type="submit" name="action">Buscar</button>
			  			</form>
			  		</div>
			  	</nav>
			  	<table class="table table-bordered">
			  		<thead>
			  			<tr>
			  				<th style="width:20%;">Nome</th>
			        		<th style="width:20%;">Usuário</th>
					        <th style="width:40%;">E-mail</th>
					        <th style="width:10%;"></th>
					        <th style="width:10%;"></th>
					    </tr>
					</thead>
					<tbody>
				    	<?php
				    		foreach ($users as $key => $value) {
				    	?>

				    	<tr class='material'>
				    		<td><?php echo $value['name']; ?></td>
				    		<td>
				    			<?php
				    				if ($value['role'] == 0) {
				    					$value['role'] = "Padrão";
				    				}elseif ($value['role'] == 1) {
				    					$value['role'] = "Sub Administrador";
				    				}elseif ($value['role'] == 2) {
				    					$value['role'] = "Administrador";
				    				}
				    				echo $value['role']; 
				    			?>
				    		</td>
				    		<td><?php echo $value['email']; ?></td>
				    		<td><a class="btn btn-warning" style="color: white;" href="<?php echo INCLUDE_PATH ?>edit-user?id=<?php echo $value['id']; ?>" role="button">Editar</a></td>
				    		<td><a actionBtn="delete" class="btn btn-danger" href="<?php echo INCLUDE_PATH ?>edit-users?delete=<?php echo $value['id']; ?>" role="button">Excluir</a></td>
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