<?php 
include('connection.php');
session_start();

$prato = $_POST['prato'];
$reserva = $_POST["reserva"];
$qtd = $_POST["quantidade"];

 
try {

    	$stmt = $conn->prepare('INSERT INTO prato_reserva (prato, reserva, quantidade) values(:prato, :reserva, :quantidade)' );
    	$stmt->bindValue(':prato', $prato);
        $stmt->bindValue(':reserva', $reserva);
        $stmt->bindValue(':quantidade', $qtd);
        $stmt->execute();

        $sucesso = $conn->lastInsertId();

        if($sucesso){                        
        	echo $sucesso;
        }else{
        	echo 'ERROR';
        }

} catch (Exception $e) {
	throw new MyDatabaseException($Exception->getMessage(), $Exception->getCode());
}


?>