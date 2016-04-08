<?php 
namespace Vendor\Factory;

class ConnectionFactory{
	public static function getConnection(){
		$pdo = new \PDO("mysql:host=localhost;dbname=g1","root","");
		$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}
}
