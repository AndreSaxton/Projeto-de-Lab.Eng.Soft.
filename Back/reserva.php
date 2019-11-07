<?php 
include('connection.php');
session_start();

$cliente = $_SESSION['id'];
$mesa = $_POST["mesa"];
$dataEntrada = new DateTime();

 
try {

    	$stmt = $conn->prepare('INSERT INTO reserva (dt_inicio_reserva, dt_termino_reserva, id_cliente, id_mesa, ativo) values(now(),now(),:cliente,:mesa, 1)' );
    	$stmt->bindValue(':cliente', $cliente);
        $stmt->bindValue(':mesa', $mesa);	
        $stmt->execute();

        $reserva = $conn->lastInsertId();

        if($reserva){                        
        	echo $reserva;
        }else{
        	echo 'ERROR';
        }

} catch (Exception $e) {
	throw new MyDatabaseException($Exception->getMessage(), $Exception->getCode());
}

?>