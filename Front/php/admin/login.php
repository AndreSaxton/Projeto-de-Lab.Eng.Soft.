<?php 

include('../connection.php');
session_start();

$login = $_POST['login'];
$senha = md5($_POST['senha']);

	try {

		$stmt = $conn->prepare('SELECT * FROM usuario where login = :login and senha = :senha and ativo=1' );
		$stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        if($stmt->fetchColumn()){
        	$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
        	echo 1;
        }else{
        	echo 2;
        }

	} catch (Exception $e) {
		throw new MyDatabaseException($Exception->getMessage(), $Exception->getCode());
	}



 ?>