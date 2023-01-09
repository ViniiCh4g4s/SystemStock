<?php
	checkPermissionPage(1);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<div class="content">
	<?php
		if (isset($_GET['id'])) {
			$id = (int)$_GET['id'];
			$material = Painel::select('tb.materials','id = ?',array($id));
			$locals = Painel::selectLocal('tb.local');
		}else{
			
			Painel::alert('error','Você precisa passar o parametro ID');
			die();
		}
	?>
	<div class="box-content">
		<form update class="ajax row g-3" action="<?php echo INCLUDE_PATH ?>forms/forms.php" method="post" enctype="multipart/form-data"><!-- class="was-validated" -->
			<div class="col-md-3">
				<img style="width: 210px; height: 205px;" class="img-thumbnail" src="
					<?php 
						if($material['img'] == ''){
							echo INCLUDE_PATH.'uploads/sem_imagem.png'; 
						}else{
							echo INCLUDE_PATH ?>uploads/<?php echo $material['img']; 
						}
					?>">
			</div>
			<div class="col-md-9">
				<label class="form-label">BMP</label>
				<input type="text" class="form-control" value="<?php echo $material['bmp']; ?>" name="bmp" disabled>

				<label class="form-label">Descrição</label>
				<textarea class="form-control" rows="3" name="description"><?php echo $material['description']; ?></textarea>
			</div>
			<div class="mb-3">
			  	<label class="form-label">Selecione o arquivo para alterar a imagem do material</label>
			  	<input type="file" class="form-control"  name="img" value="">
			  	<input type="hidden" name="imgCurrent" value="<?php echo $material['img']; ?>">
			</div>
			<div class="col-12">
				<label for="inputAddress2" class="form-label">Observação</label>
				<textarea class="form-control" rows="1" name="obs"><?php echo $material['obs']; ?></textarea>
			</div>
			<div class="col-12">
				<label class="form-label">Local</label>
				<select class="form-select" name="local">
					<?php
						foreach ($locals as $key => $value) {
							if($value['local'] == $material['local']) {
								echo '<option selected value="'.$value['local'].'">'.$value['local'].'</option>';
							}
							echo '<option value="'.$value['local'].'">'.$value['local'].'</option>';
						}
					?>
				</select>
			</div>
			<div class="col-6">
				<a class="btn btn-primary" href="<?php echo INCLUDE_PATH ?>search-material?result=<?php echo $material['bmp']; ?>&action=" role="button">Voltar</a>
			</div>
			<div class="col-6">
				<!-- Button trigger modal -->
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="bmp" value="<?php echo $material['bmp']; ?>">
				<input type="hidden" name="name_table" value="tb.materials">
				<input type="hidden" name="type_action" value="update-material">
				<button type="submit" class="btn btn-primary" name="action" style="float: right;color: white;">Alterar</button>
			</div>

		</form>

	</div><!--box-content-->
</div>