<?php
	
	class User{

		public function updateUser($name,$username,$email){
			$sql = MySql::connect()->prepare("UPDATE `tb.users` SET name = ?,username = ?,email = ? WHERE username = ?");
			if($sql->execute(array($name,$username,$email,$_SESSION['username']))){
				return true;
			}else{
				return false;
			}
		}

		public function updateUserPassword($id,$name,$username,$password,$email,$role){
			$sql = MySql::connect()->prepare("UPDATE `tb.users` SET name = ?,username = ?,password = ?, email = ?,role = ? WHERE id = ?");
			if($sql->execute(array($name,$username,$password,$email,$role,$id))){
				return true;
			}else{
				return false;
			}
		}

		public function updatePassword($password){
			$sql = MySql::connect()->prepare("UPDATE `tb.users` SET password = ? WHERE username = ?");
			if($sql->execute(array($password,$_SESSION['username']))){
				return true;
			}else{
				return false;
			}
		}

		public static function userExists($username){
			$sql = MySql::connect()->prepare("SELECT `id` FROM `tb.users` WHERE username=?");
			$sql->execute(array($username));
			if($sql->rowCount() == 1)
				return true;
			else
				return false;
		}

		public static function localExists($local){
			$sql = MySql::connect()->prepare("SELECT `id` FROM `tb.local` WHERE `local`=?");
			$sql->execute(array($local));
			if($sql->rowCount() == 1)
				return true;
			else
				return false;
		}

		public static function addUser($login,$password,$email,$name,$role){
			$sql = MySql::connect()->prepare("INSERT INTO `tb.users` VALUES (null,?,?,?,?,?)");
			$sql->execute(array($login,$password,$email,$name,$role));
		}

	}

?>