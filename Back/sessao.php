<?php 

include('connection.php');
session_start();

$data = $_POST["data"];
$cliente = json_decode($data, true);
$login =  $cliente['login'];
$senha = md5($cliente['senha']);

	try {

		$stmt = $conn->prepare('SELECT * FROM cliente where nm_login = :login and cd_senha = :senha' );
		$stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        if($stmt->fetchColumn()){
        	$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
        	echo 1;
        	echo $_SESSION['login'];
        }else{
        	echo 2;
        }

	} catch (Exception $e) {
		throw new MyDatabaseException($Exception->getMessage(), $Exception->getCode());
	}



 ?>