<?php
namespace model;
if($_SERVER["REQUEST_URI"] == "/admin/model/conexao.php"){
		header("Location: ../../admin");
		return;
}
class Conexao {

	private static $instance;
	public static function 	getConn() {
		$iniFile = parse_ini_file("C:/Users/josaf/Documents/mysql.ini");
		$user = $iniFile["user"];
		$password = $iniFile["password"];
		$database = $iniFile["database"];
		$ip = $iniFile["host"];
		$dsn = "mysql:host=".$ip."; dbname=".$database."; charset=utf8";
		if(!isset(self::$instance)) {
			self::$instance = new \PDO($dsn, $user, $password);
		}
		return self::$instance;
	}


}

