<?php
	checkPermissionPage(1);

	$locals = Painel::selectLocal('tb.local');
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
<div class="content">
	<div class="box-content">
		<h2></h2>
		<form class="ajax" action="<?php echo INCLUDE_PATH ?>forms/forms.php" method="post" enctype="multipart/form-data"><!-- class="was-validated" -->
			<div class="mb-3">
				<label class="form-label">BMP</label>
				<input type="text" class="form-control" placeholder="Ex.: 1413076" name="bmp" required>
				<div class="invalid-feedback">Insira o número de BMP do material.</div>
			</div>
			<div class="mb-3">
			  <label class="form-label">Descrição:</label>
			  <textarea class="form-control" placeholder='Ex.: Monitor Dell 19" - Modelo E1911C' rows="3" name="description" required></textarea>
			  <div class="invalid-feedback">Insira uma descrição sobre o material.</div>
			</div>
			<div class="mb-3">
			  <label class="form-label">Selecione a imagem do material</label>
			  <input class="form-control" type="file" name="img">
			</div>
			<div class="mb-3">
			  <label class="form-label">Observação:</label>
			  <textarea class="form-control" placeholder="Ex.: Em estoque no armário" rows="1" name="obs"></textarea>
			  <div class="invalid-feedback">Insira uma observação sobre o material.</div>
			</div>
			<div class="mb-3">
				<label class="form-label">Local</label>
				<select class="form-select" name="local" required>
					<option disabled="disabled" selected="selected">Escolha o Local</option>
					<?php
						foreach ($locals as $key => $value) {
							echo '<option value="'.$value['local'].'">'.$value['local'].'</option>';
						}
					?>
				</select>
			</div>

			<div class="mb-3">
              <input type="hidden" name="type_action" value="add-material">
            </div>
			
			<button type="submit" name="action" class="btn btn-primary" style="margin-top: 2%; float: right;">Adicionar</button>
		</form>



	</div><!--box-content-->
</div>