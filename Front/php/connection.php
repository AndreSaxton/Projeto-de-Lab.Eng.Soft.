<?php

	$DB_USER = 'root';
	$DB_PASSWORD = '';

	try{
		$conn = new PDO('mysql:host=localhost'.';dbname=id10939434_lancheonnet',$DB_USER,$DB_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	}catch(PDOException $e){
		print "Error: ".$e->getMessage()."<br/>";
	}
?>