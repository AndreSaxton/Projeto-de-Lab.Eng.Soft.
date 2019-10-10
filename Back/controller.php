<?php
// dados que serao recebidos do front
// tirar quando juntar com o front
// o back recebera um json com os dados abaixo, a depender do que será realizado

$jsonCliente = array(
    "id" => 1,
    "nome" => "João",
    "telefone" => 13912345678,
    "email" => "email@email.com"
);
$jsonCliente = json_encode($jsonCliente);

$jsonMesa = array(
    "id" => 1,
    "qt_cadeira" => 7
);
$jsonMesa = json_encode($jsonMesa);

$jsonPrato = array(
    array(
        "id" => 1,
        "nome" => "Arroz com Feijao",
        "valor" => 15.5,
        "descricao" => "Tem arroz e feijao"
    ),
    array(
        "id" => 2,
        "nome" => "P\u00e3o com ovo",
        "valor" => 5,
        "descricao" => "P\u00e3o com ovo frito"
    )
);
$jsonPrato = json_encode($jsonPrato);

$jsonReserva = array(
    "id" => null,
    "hInicio" => "2019-02-15 15:20:14",
    "hTermino" => "2019-02-15 16:20:14",
    "cliente" => array(
        "id" => 1,
        "nome" => "João",
        "telefone" => 13912345678,
        "email" => "email@email.com"
    ),
    "mesa" => array(
        "id" => 1,
        "qt_cadeira" => 7
    ),
    "prato" => array(
        array(
            "id" => 1,
            "nome" => "Arroz com Feijao",
            "valor" => 15.5,
            "descricao" => "Tem arroz e feijao"
        ),
        array(
            "id" => 2,
            "nome" => "P\u00e3o com ovo",
            "valor" => 5,
            "descricao" => "P\u00e3o com ovo frito"
        )
    ),
    "pagamento" => null
);
$jsonReserva = json_encode($jsonReserva);

$action = "insertNewReserva";




// if(isset($_POST['action']) && !empty($_POST['action'])){
if(isset($action) && !empty($action)){
    // $function = $_POST['action'];
    $function = $action;

    require_once('classes.php');
    
    if ($function == "insertNewCliente") {
        // so executa de o cliente nao tiver ID
        $cliente = json_decode($jsonCliente, true);
        $cliente = new Cliente(null, $cliente["nome"], 
        $cliente["telefone"], $cliente["email"]);
    }
    if ($function == "selectAllPrato") {
        $cliente = json_decode($jsonCliente, true);
        $cliente = new Cliente(1, $cliente["nome"], $cliente["telefone"], $cliente["email"]);
        
        $pratos = $cliente->verCardapio();
        echo json_encode($pratos);
    }
    if ($function == "insertNewReserva") {
        $reserva = json_decode($jsonReserva, true);

        $idReserva = null;
        $hInicio = new DateTime($reserva["hInicio"]);
        $hTermino = new DateTime($reserva["hTermino"]);
        $cliente = $reserva["cliente"];
        $cliente = new Cliente($cliente["id"], $cliente["nome"], $cliente["telefone"], $cliente["email"]);
        $mesa = $reserva["mesa"];
        $mesa = new Mesa($mesa["id"], $mesa["qt_cadeira"]);
        
        $pratos = array();
        foreach ($reserva["prato"] as $prato) {
            $pratos[] = new Prato($prato["id"], $prato["nome"], $prato["valor"], $prato["descricao"]);
        }
        $pagamento = $reserva["pagamento"];
        $reserva = new Reserva(
            $idReserva, $hInicio, $hTermino, $cliente, $mesa,
            $pratos, $pagamento
        );
        // print_r($reserva);
        $cliente->reservarMesa($reserva);
    }

    // if ($function == "saveKanban") {
    //     $kanban = json_decode($_POST['kanban'], true);
    //     $colab = new colaborador();
    //     $result = $colab->saveKanban($kanban);
    //     echo $result;
    // }
}
?>