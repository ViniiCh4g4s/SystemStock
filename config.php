<?php

	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoLoad.php');
		}
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH','http://localhost/csec/');
	define('INCLUDE_PATH_ASSETS',INCLUDE_PATH.'assets/');

	define('BASE_DIR',__DIR__.'/');

	//Conectar com banco de dados!
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','csec');

	//Funções
	function pickRole($index){
		return Painel::$roles[$index];
	}

	function checkPermissionMenu($permission){
		if ($_SESSION['role'] >= $permission) {
			return;
		}else{
			echo 'class="permission"';
		}
	}

	function checkPermissionButton($permission){
		if ($_SESSION['role'] >= $permission) {
			return;
		}else{
			echo 'style="display:none;"';
		}
	}

	function checkPermissionPage($permission){
		if ($_SESSION['role'] >= $permission) {
			return;
		}else{
			include('pages/permission-denied.php');
			die();
		}
	}

?>