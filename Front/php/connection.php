<?php

	$DB_USER = 'id10939434_lancheonnet';
	$DB_PASSWORD = 'vn7tock54td5';

	try{
		$conn = new PDO('mysql:host=localhost'.';dbname=id10939434_lancheonnet',$DB_USER,$DB_PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	}catch(PDOException $e){
		print "Error: ".$e->getMessage()."<br/>";
	}
?>