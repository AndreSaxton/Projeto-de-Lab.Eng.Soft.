<?php 
include('connection.php');
session_start();

$id = $_POST['id'];

 
try {

    	$stmt = $conn->prepare('UPDATE reserva set ativo=0 where id_reserva = :id' );
    	$stmt->bindValue(':id', $id);
        $stmt->execute();

        if($stmt->execute()){                        
        	echo 'SUCESS';
        }else{
        	echo 'ERROR';
        }

} catch (Exception $e) {
	throw new MyDatabaseException($Exception->getMessage(), $Exception->getCode());
}


?>