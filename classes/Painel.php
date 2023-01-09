<?php
	
	class Painel
	{
	/* ----------- Painel ----------- */
		public static $roles = [
		'0' => 'Padrão',
		'1' => 'Sub Administrador',
		'2' => 'Administrador'];
		
		public static function logado(){
			return isset($_SESSION['login']) ? true : false;
		}

		public static function loggout(){
			setcookie('rememberMe','true',time()-1,'/');
			session_destroy();
			header('Location: '.INCLUDE_PATH);
		}

		public static function loadPage(){
			if(isset($_GET['url'])){
				$url = explode('/',$_GET['url']);
				if(file_exists('pages/'.$url[0].'.php')){
					include('pages/'.$url[0].'.php');
				}else{
					//Página não  existe!
					include('pages/404.php');
				}
			}else{
				include('pages/home.php');
			}
		}

		public static function alert($type,$message){
			if($type == 'success'){
				echo '<div class="col-md-12 text-center"><div class="box-alert success">'.$message.'</div></div>';
			}else if($type == 'error'){
				echo '<div class="col-md-12 text-center"><div class="box-alert error">'.$message.'
				</div></div>';
			}
		}

		public static function redirect($url){
			echo '<script>location.href="'.$url.'"</script>';
			die();
		}

	/* ----------- Banco de Dados ----------- */
		
		/*
			Metodo especifico para selecionar apenas 1 registro.
		*/
		public static function select($table,$query = '',$arr = ''){
			if($query != false){
				$sql = MySql::connect()->prepare("SELECT * FROM `$table` WHERE $query");
				$sql->execute($arr);
			}else{
				$sql = MySql::connect()->prepare("SELECT * FROM `$table`");
				$sql->execute();
			}
			return $sql->fetch();
		}

		public static function selectAll($table,$start = null,$end = null){
			if($start == null && $end == null)
				$sql = MySql::connect()->prepare("SELECT * FROM `$table` ORDER BY id DESC");
			else
				$sql = MySql::connect()->prepare("SELECT * FROM `$table` ORDER BY id DESC LIMIT $start,$end");
	
			$sql->execute();

			
			return $sql->fetchAll();

		}

		public static function uploadFile($file){
			if(move_uploaded_file($file['tmp_name'],BASE_DIR.'uploads/'.$file['name']))
				return $file['name'];
			else
				return false;
		}

		public static function deleteFile($file){
			@unlink('uploads/'.$file);
		}

		public static function update($arr){
			$true = true;
			$first = false;
			$name_table = $arr['name_table'];

			$query = "UPDATE `$name_table` SET ";
			foreach ($arr as $key => $value) {
				$name = $key;
				if($name == 'action' || $name == 'name_table' || $name == 'id')
					continue;
				if($value == ''){
					$true = false;
					break;
				}
				
				if($first == false){
					$first = true;
					$query.="$name=?";
				}
				else{
					$query.=",$name=?";
				}

				$parameters[] = $value;
			}

			if($true == true){
				$parameters[] = $arr['id'];
				$sql = MySql::connect()->prepare($query.' WHERE id=?');
				$sql->execute($parameters);
			}
			return $true;
		}

		public static function imageValid($image){
			if($image['type'] == 'image/jpeg' ||
				$image['type'] == 'image/jpg' ||
				$image['type'] == 'image/png'){

				$size = intval($image['size']/1024);
				if($size < 10000)
					return true;
				else
					return false;
			}else{
				return false;
			}
		}

		public static function delete($tabela,$id=false){
			if($id == false){
				$sql = MySql::connect()->prepare("DELETE FROM `$tabela`");
			}else{
				$sql = MySql::connect()->prepare("DELETE FROM `$tabela` WHERE id = $id");
			}
			$sql->execute();
		}

	/* ----------- Usuários ----------- */

		public static function selectUsers($table){
			$sql = MySql::connect()->prepare("SELECT * FROM `$table`");
			$sql->execute();
			return $sql->fetchAll();
		}

	/* ----------- Materiais ----------- */

		public static function selectMaterials($table,$local = false,$start = null,$end = null){
			if($start == null && $end == null) {
				if ($local == false) {
					$sql = MySql::connect()->prepare("SELECT * FROM `$table` ORDER BY `tb.materials`.`local` ASC");
				}else{
					$sql = MySql::connect()->prepare("SELECT * FROM `$table` ORDER BY `tb.materials`.`local` ASC WHERE local = '$local'");
				}
				
			}else{
				if ($local == false) {
					$sql = MySql::connect()->prepare("SELECT * FROM `$table` ORDER BY `tb.materials`.`local` ASC LIMIT $start,$end");
				}else{
					$sql = MySql::connect()->prepare("SELECT * FROM `$table` ORDER BY `tb.materials`.`local` ASC WHERE local = '$local' LIMIT $start,$end");
				}
			}

			$sql->execute();

			return $sql->fetchAll();
		}

		public static function bmpExists($bmp){
			$sql = MySql::connect()->prepare("SELECT `id` FROM `tb.materials` WHERE bmp=?");
			$sql->execute(array($bmp));
			if($sql->rowCount() == 1)
				return true;
			else
				return false;
		}

	/* ----------- Local ----------- */

		public static function selectLocal($table,$start = null,$end = null){
			if($start == null && $end == null)
				$sql = MySql::connect()->prepare("SELECT * FROM `$table` ORDER BY `tb.local`.`local` ASC");
			else
				$sql = MySql::connect()->prepare("SELECT * FROM `$table` ORDER BY `tb.local`.`local` ASC LIMIT $start,$end");
	
			$sql->execute();

			
			return $sql->fetchAll();

		}

		
	}

?>