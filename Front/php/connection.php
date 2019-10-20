<?php

	$DB_USER = 'root';
	$DB_PASSWORD = '';

	try{
		$conn = new PDO('mysql:host=127.0.0.1'.';dbname=id10939434_lancheonnet',$DB_USER,$DB_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	}catch(PDOException $e){
		print "Error: ".$e->getMessage()."<br/>";
	}
?>