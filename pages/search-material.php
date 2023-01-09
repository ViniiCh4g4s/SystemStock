<?php
	checkPermissionPage(1);

	if(isset($_GET['delete'])){
		$idDelete = intval($_GET['delete']);
		$select = Painel::select('tb.materials','id = ?',array($idDelete));

		//Listar no histórico.
		$date = date('Y-m-d H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'];
		$changes = "Excluiu o material com BMP: ".$select['bmp'];
		$register = MySql::connect()->prepare("INSERT INTO `tb.historic` VALUES (null,?,?,?,?,?)");
		$register->execute(array($date,$_SESSION['username'],$_SESSION['name'],$ip,$changes));

		Painel::deleteMaterial('tb.materials',$idDelete);
		Painel::redirect(INCLUDE_PATH.'search-material');
	}
?>

<!-- Vendor CSS Files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>


<div class="content">
	<div class="box-content">
		<div class="mb-3">
			<form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="Digite o BMP do material" aria-label="Search" name="result">
				<button class="btn btn-outline-success" type="submit" name="action">Buscar</button>
			</form>
		</div>
		<form class="row g-3" method="post" enctype="multipart/form-data"><!-- class="was-validated" -->
			<?php
				if(isset($_GET['action'])){
					$result = $_GET['result'];
					if ($result == '') {
					}else{
						$sql = MySql::connect()->prepare("SELECT * FROM `tb.materials` WHERE bmp = ?");
						$sql->execute(array($result));
						$materials = $sql->fetchAll();
						foreach ($materials as $key => $value) {			
			?>
			<div class="col-md-3">
				<img style="width: 210px; height: 205px;" class="img-thumbnail" alt="" src="
					<?php 
						if($value['img'] == ''){
							echo INCLUDE_PATH.'uploads/sem_imagem.png'; 
						}else{
							echo INCLUDE_PATH ?>uploads/<?php echo $value['img']; 
						}
					?>">
			</div>
			<div class="col-md-9">
				<label class="form-label">BMP</label>
				<input type="text" class="form-control" value="<?php echo $value['bmp']; ?>" name="name" disabled>

				<label for="inputPassword4" class="form-label">Descrição</label>
				<textarea class="form-control" rows="3" name="description" disabled><?php echo $value['description']; ?></textarea>
			</div>
			<div class="col-12">
				<label for="inputAddress2" class="form-label">Observação</label>
				<textarea class="form-control" rows="1" name="obs" disabled><?php echo $value['obs']; ?></textarea>
			</div>
			<div class="col-12">
				<label class="form-label">Local</label>
				<select class="form-select" name="local" disabled>
					<option><?php echo $value['local']; ?></option>
				</select>
			</div>
			<div class="col-12" style="float: right;">
				<!-- Button trigger modal -->
				<a class="btn btn-warning" style="color: white;" href="<?php echo INCLUDE_PATH ?>edit-material?id=<?php echo $value['id']; ?>" role="button">Editar Material</a>
				<a <?php checkPermissionButton(1);?> class="btn delete btn-danger" item_id="<?php echo $value['id']; ?>" href="<?php echo INCLUDE_PATH ?>" role="button">Excluir</a>
			</div>
			
			<?php }}} ?>

		</form>

	</div><!--box-content-->
</div>
