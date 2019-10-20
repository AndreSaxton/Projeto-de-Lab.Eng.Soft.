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
/*
$jsonMesa = array(
    "id" => 1,
    "qt_cadeira" => 3
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

$jsonNewPrato = array(
    "id" => null,
    "nome" => "Nova Coisa",
    "valor" => 25.5,
    "descricao" => "è comida"
);
$jsonNewPrato = json_encode($jsonNewPrato);
*/
$jsonPromocao = array(
    "valor" => 25.5,
    "isPorcentagem" => false,
    "porcentagem" => null
);
$jsonPromocaoPercent = array(
    "valor" => 0,
    "isPorcentagem" => true,
    "porcentagem" => 20.5
);
$jsonPratoPromocao = array(
    "id" => 1,
    "nome" => "Arroz com Feijao",
    "valor" => 15.5,
    "descricao" => "Tem arroz e feijao"
);
$jsonPratoPromocao = json_encode($jsonPratoPromocao);
$jsonPromocao = json_encode($jsonPromocao);
$jsonPromocaoPercent = json_encode($jsonPromocaoPercent);
/*
$jsonReservaOfRefeicao = array(
    "id" => 7
);
$jsonReservaOfRefeicao = json_encode($jsonReservaOfRefeicao);

$jsonRefeicao = array(
    "idPrato" => 2,
    "idReserva" => 7,
);
$jsonRefeicao = json_encode($jsonRefeicao);
*/

// recebendo json do front
$action = $_POST["action"];
// var_dump( $action);

// if(isset($_POST['action']) && !empty($_POST['action'])){
if(isset($action) && !empty($action)){
    // $function = $_POST['action'];
    $function = $action;

    require_once('classes.php');

    // Cliente
    // verCardapio
    if ($function == "selectAllPrato") {
        $cliente = json_decode($jsonCliente, true);
        $cliente = new Cliente(1, $cliente["nome"], $cliente["telefone"], $cliente["email"]);
        
        $pratos = $cliente->verCardapio();
        echo json_encode($pratos);
    }
    // fazerCadastro
    if ($function == "insertNewCliente") {
        $data = $_POST["data"];
        
        $cliente = json_decode($data, true);

        // so cadastra de o cliente nao tiver ID
        $cliente = new Cliente(null, $cliente["nome"], 
        $cliente["telefone"], $cliente["email"]);
    }
    // alterarCadastro
    if ($function == "updateCliente") {
        $data = $_POST["data"];
        
        $cliente = json_decode($data, true);

        $cliente = new Cliente($cliente["id"], $cliente["nome"], $cliente["telefone"], $cliente["email"]);
        $cliente->alterarCadastro($cliente->getIdentificador(), $cliente->getNome(), $cliente->getTelefone(), $cliente->getEmail());
    }
    // reservarMesa
    if ($function == "insertNewReserva") {
        $data = $_POST["data"];

        // print_r($data);

        $reserva = json_decode($data, true);

        $idReserva = null;
        $hInicio = new DateTime($reserva["hInicio"]);
        $hTermino = new DateTime($reserva["hTermino"]);
        $pagamento = $reserva["pagamento"];
        if($pagamento != null)
            $pagamento = new DateTime($pagamento);
        else
            $pagamento = null;
        
        $cliente = $reserva["cliente"][0];
        $cliente = new Cliente($cliente["id_cliente"], $cliente["nm_cliente"], $cliente["cd_telefone_cliente"], $cliente["nm_email_cliente"]);

        $mesa = $reserva["mesa"][0];
        $mesa = new Mesa($mesa["id_mesa"], $mesa["qt_cadeira_mesa"]);
        // print_r($mesa);
        
        $refeicao = $reserva["prato"]["prato"];
        // print_r($refeicao);
        
        $pratos = array();
        foreach ($refeicao as $prato) {
            // print_r($prato[0]);
            $pratos[] = new Prato($prato[0]["id_prato"], $prato[0]["nm_prato"], $prato[0]["vl_prato"], $prato[0]["ds_prato"]);
        }
        // print_r($pratos);

        $reserva = new Reserva(
            $idReserva, $hInicio, $hTermino, $cliente, $mesa,
            $pratos, $pagamento
        );
        // print_r($reserva);
        
        $cliente->reservarMesa($reserva);
    }
    // fazerPedido
    /*executado dentro do cadastrarReserva
    if ($function == "insertNewRefeicao") {
        $jsonRefeicao = json_decode($jsonRefeicao, true);
        $cliente = json_decode($jsonCliente, true);
        $cliente = new Cliente(1, $cliente["nome"], $cliente["telefone"], $cliente["email"]);

        $cliente->fazerPedido($jsonRefeicao["idReserva"], $jsonRefeicao["idPrato"]);
    }*/
    // pagarPedido
    if ($function == "") {}

    // Lanchonete
    // verListaCliente
    if ($function == "selectAllCliente") {
        $lanchonete = new Lanchonete();
        $clientes = $lanchonete->verListaCliente();
        echo json_encode($clientes);
    }
    // adicionarPrato
    if ($function == "insertNewPrato") {
        $data = $_POST["data"];
        
        $newPrato = json_decode($data, true);
        $lanchonete = new Lanchonete();
        $lanchonete->adicionarPrato($newPrato["nome"],$newPrato["valor"],$newPrato["descricao"]);
    }
    // alterarPrato
    if ($function == "updatePrato") {
        $data = $_POST["data"];
        
        $prato = json_decode($data, true);
        $lanchonete = new Lanchonete();
        $lanchonete->alterarPrato($prato["id"],$prato["nome"],$prato["valor"],$prato["descricao"]);
    }
    // removerPrato
    if ($function == "") {}
    // aplicarDesconto
    if ($function == "insertNewPromocao") {
        $data = $_POST["data"];

        // $jsonPratoPromocao = json_decode($jsonPratoPromocao, true);
        $jsonPromocao = json_decode($data, true);
        // $jsonPromocao = json_decode($jsonPromocaoPercent, true);
        // print_r($jsonPromocaoPercent);
        // print_r($jsonPromocao);
        $promocao = new Promocao();
        $lanchonete = new Lanchonete();
        $prato = new Prato($jsonPromocao["prato"][0]["id_prato"], $jsonPromocao["prato"][0]["nm_prato"],
         $jsonPromocao["prato"][0]["vl_prato"], $jsonPromocao["prato"][0]["ds_prato"]);
        

        if($jsonPromocao["isPorcentagem"]==true)
            $promocao->setDescontoPorcentagem($prato, $jsonPromocao["porcentagem"]);
        else
            $promocao->setDesconto($prato, $jsonPromocao["valor"]);

        
        // print_r($promocao);
        // print_r($prato);

        $lanchonete->aplicarDesconto($promocao);    
    }
    // verListaDesconto
    if ($function == "selectAllPromocao") {
        $lanchonete = new Lanchonete();
        $promocoes = $lanchonete->verListaPromocao();
        echo json_encode($promocoes);
    }
    // alterarDesconto
    if ($function == "") {}
    // removerDesconto
    if ($function == "") {}
    // prepararMesa
    if ($function == "insertNewMesa") {
        $data = $_POST["data"];

        $mesa = json_decode($data, true);
        $lanchonete = new Lanchonete();
        $mesa = new Mesa(null, $mesa["qt_cadeira"]);
        $lanchonete->prepararMesa($mesa);
    }
    // verListaMesa
    if ($function == "selectAllMesa") {
        $lanchonete = new Lanchonete();
        $mesas = $lanchonete->verListaMesa();
        echo json_encode($mesas);
    }
    // alterarMesa
    if ($function == "") {}
    // verListaReserva
    if ($function == "selectAllReserva") {
        $lanchonete = new Lanchonete();
        $reservas = $lanchonete->verListaReserva();
        echo json_encode($reservas);
    }
    // selectAllRefeicaoOfReserva
    if ($function == "selectAllRefeicaoOfReserva") {
        $idReserva = $_POST["id_reserva"];
        $lanchonete = new Lanchonete();
        
        // $idReserva = json_decode($jsonReservaOfRefeicao, true);
        
        $lanchonete = new Lanchonete();

        $refeicoes = $lanchonete->verListaRefeicaoDeReserva($idReserva);
        echo json_encode($refeicoes);
    }
    // divulgar
    if ($function == "") {}
}
?>