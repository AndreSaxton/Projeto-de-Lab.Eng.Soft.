<?php 

	include('../connection.php');

	$fantasia = $_POST['fantasia'];
	$cnpj = $_POST['cnpj'];
	$email = $_POST['email'];
	$endereco = $_POST['endereco'];

	try {


		$stmt = $conn->prepare('UPDATE lanchonete set nm_lanchonete = :fantasia, cd_cnpj_lanchonete = :cnpj, nm_email_lanchonete = :email, nm_endereco_lanchonete = :endereco where id_lanchonete = 2' );
		$stmt->bindValue(':fantasia',$fantasia);
		$stmt->bindValue(':cnpj',$cnpj);
		$stmt->bindValue(':email',$email);
		$stmt->bindValue(':endereco',$endereco);
        $stmt->execute();
        
        echo $stmt->execute();

	} catch (Exception $e) {
		throw new MyDatabaseException($Exception->getMessage(), $Exception->getCode());
	}

 ?>