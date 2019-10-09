<?php
include_once("classes.php");
include_once("conexao.php");

$timeZone = new DateTimeZone('America/Sao_Paulo');
/*$hInicio = new DateTime(null, $timeZone);
$hTermino = new DateTime($hInicio->format('Y-m-d H:i:s'), $timeZone);*/
$hInicio = new DateTime("2019-09-12 17:29:40", $timeZone);
$hTermino = new DateTime("2019-09-12 18:29:40", $timeZone);
/*echo "INICIO......:" . $hInicio->format('Y-m-d H:i:s');
echo "<br>";
echo "TERMINO:" . $hTermino->format('Y-m-d H:i:s');*/


// $cliente = new Cliente(5, "André", 13912345678 , "email@email.com");
// $mesa = new Mesa(2, 10);
// $prato = new Prato(1, "Arroz com Feijao", 15.5, "Tem arroz e Feijao");
// $reserva = new Reserva(7, $hInicio, $hTermino, $cliente, $mesa, $prato, null);
// $lanchonete = new Lanchonete();
// $promocao = new Promocao();


// echo "<pre>";
// var_dump($cliente);
// echo "\n";
// var_dump($reserva);
// echo "\n";
// var_dump($mesa);
// echo "\n";
// var_dump($lanchonete);
// echo "\n";
// var_dump($prato);
// echo "\n";
// var_dump($promocao);

?>