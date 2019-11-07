<?php 

include('connection.php');
session_start();

$data = $_POST["data"];
$cliente = json_decode($data, true);
$login =  $cliente['login'];
$senha = md5($cliente['senha']);

	try {

        	$stmt = $conn->prepare('SELECT id_cliente FROM cliente where nm_login = :login and cd_senha = :senha' );
        	$stmt->bindValue(':login', $login);
                $stmt->bindValue(':senha', $senha);
                $stmt->execute();

                $result = $stmt->fetchColumn();

                if($result){                        
                	$_SESSION['login'] = $login;
        		$_SESSION['senha'] = $senha;
                        $_SESSION['id'] = $result;
                	echo 1;
                }else{
                	echo 2;
                }

	} catch (Exception $e) {
		throw new MyDatabaseException($Exception->getMessage(), $Exception->getCode());
	}



 ?>