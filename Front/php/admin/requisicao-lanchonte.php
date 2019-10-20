<?php 

	include('./php/connection.php');

	try {

		$lanchonete = array();
		$stmt = $conn->prepare('SELECT * FROM lanchonete where id_lanchonete=:id' );
		$stmt->bindValue(':id', 2);
        //$stmt->execute();

        $stmt->execute();
        $lanchonete = $stmt->fetchAll()[0];
        

        

	} catch (Exception $e) {
		throw new MyDatabaseException($Exception->getMessage(), $Exception->getCode());
	}

 ?>