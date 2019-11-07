<?php 

include('connection.php');
session_start();

$pratos = array();
$id = $_POST['reserva'];
$qtd = 0;

 
try {

	$stmt = $conn->prepare('select p.nm_prato as prato, p.vl_prato as valor, pr.quantidade as quantidade from reserva r inner join prato_reserva pr on (r.id_reserva = pr.reserva) inner join prato p on (pr.prato = p.id_prato ) where r.id_reserva=:id' );
	$stmt->bindValue(':id', $id);
    $stmt->execute();

    while($row = $stmt->fetch()) {
			    
	    $pratos[$qtd]['prato'] = $row['prato'];
	    $pratos[$qtd]['valor'] = $row['valor'];
	    $pratos[$qtd]['quantidade'] = $row['quantidade'];
	   
	    $qtd = $qtd + 1;
	}
    echo json_encode($pratos, JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
	throw new MyDatabaseException($Exception->getMessage(), $Exception->getCode());
}



?>