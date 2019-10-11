<?php
class Conexao{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "lanchonet";

    /*// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    */
    function connectToDatabase(){
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return 0;
        }
        mysqli_set_charset($conn, 'utf8');
        return $conn;
    }
    /*
        $sql = "COMANDO SQL";

        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("si", $texto, $inteiro);

            // Set parameters
            $texto = "André";
            $inteiro = 1391234567;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo "Records inserted successfully.";
            } else{
                echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }
        // Close statement
        $stmt->close();
    */

    function selectAllCliente(){
        $sql = "SELECT * FROM CLIENTE";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // echo "Records selected successfully.";
            } else{
                // echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            // echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }

        //valores encontrados
        $result = $stmt->get_result();

        // Close statement
        $stmt->close();

        if($result->num_rows){
            while($row = $result->fetch_assoc()){
                $id[] = $row["id_cliente"];
                $nome[] = $row["nm_cliente"];
                $email[] = $row["nm_email_cliente"];
                $telefone[] = $row["cd_telefone_cliente"];

                $clientes[] = $row;
            }
            // foreach ($id as $key => $value) {
            //     //echo $key . $value . "<br>";
            //     echo "ID: " . $id[$key] . ", NOME: ".$nome[$key]." ,EMAIL:".$email[$key]." ,TELEFONE:".$telefone[$key]."<br>";
            // }
            return $clientes;
        }
    }
    function insertNewCliente(string $nome, float $telefone, string $email){
        // Prepare an insert statement
        $sql = "INSERT INTO `cliente`(`nm_cliente`, `nm_email_cliente`, `cd_telefone_cliente`) VALUES (?, ?, ?)";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssi", $nome, $email, $telefone);

            // Set parameters
            /*$first_name = $_REQUEST['first_name'];
            $last_name = $_REQUEST['last_name'];
            $email = $_REQUEST['email'];*/
            // $nome = "André";
            // $email = "email@email.com";
            // $telefone = 1391234567;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // echo "Records inserted successfully.";
            } else{
                // echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            // echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }
        // Close statement
        $stmt->close();
    }

    function selectAllReserva(){
        $sql = "SELECT * FROM RESERVA";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // echo "Records selected successfully.";
            } else{
                // echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            // echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }

        //valores encontrados
        $result = $stmt->get_result();

        // Close statement
        $stmt->close();
        if($result->num_rows)
        {
            while($row = $result->fetch_assoc()){
                $id[] = $row["id_reserva"];
                $dtInicio[] = $row["dt_inicio_reserva"];
                $dtTermino[] = $row["dt_termino_reserva"];
                $dtPagamento[] = $row["dt_pagamento_reserva"];
                $idCliente[] = $row["id_cliente"];
                $idMesa[] = $row["id_mesa"];

                $reserva[] = $row;
            }
            // foreach ($id as $key => $value) {
            //     //echo $key . $value . "<br>";
            //     echo "ID: " . $id[$key] . ", INICIO: ".$dtInicio[$key].
            //     " ,TERMINO:".$dtTermino[$key]." ,PAGAMENTO: ".$dtPagamento[$key].
            //     " ,ID_CLIENTE: ".$idCliente[$key]." ,ID_MESA: ".$idMesa[$key].
            //     "<br>";
            // }
            return $reserva;
        }
    }
    function insertNewReserva($dtInicio, $dtTermino, $dtPagamento, $idCliente, $idMesa){
        // Prepare an insert statement
        $sql = "INSERT INTO `reserva`(`dt_inicio_reserva`, `dt_termino_reserva`, `dt_pagamento_reserva`, `id_cliente`, `id_mesa`) VALUES (?,?,?,?,?)";
        $conn = $this->connectToDatabase();

        // $timeZone = new DateTimeZone('America/Sao_Paulo');
        // $dtInicio = new DateTime("2019-09-12 17:29:40", $timeZone);
        // echo date_format($dtInicio, "Y-m-d H:i:s");

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssii", $dtInicio, $dtTermino, $dtPagamento, $idCliente, $idMesa);

            // Set parameters
            $timeZone = new DateTimeZone('America/Sao_Paulo');
            // $dtInicio = date_format(
            //     new DateTime("2019-09-12 17:29:40", $timeZone)
            //     , "Y-m-d H:i:s");
            // $dtTermino = date_format(
            //     new DateTime("2019-09-12 18:29:40", $timeZone)
            //     , "Y-m-d H:i:s");
            //$dtTermino = new DateTime("2019-09-12 18:29:40", $timeZone);
            // $dtPagamento = null;
            // $idCliente = 2;
            // $idMesa = 1;

            $dtInicio = date_format($dtInicio, "Y-m-d H:i:s");
            $dtTermino = date_format($dtTermino, "Y-m-d H:i:s");
            if($dtPagamento!=null)
                $dtPagamento = date_format($dtPagamento, "Y-m-d H:i:s");

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo "Records inserted successfully.";
            } else{
                echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }
        // Close statement
        $stmt->close();

    }

    function selectAllMesa(){
        $sql = "SELECT * FROM MESA";
        $conn = $this->connectToDatabase();
        if($stmt = $conn->prepare($sql)){
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // echo "Records selected successfully.";
            } else{
                // echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            // echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }

        //valores encontrados
        $result = $stmt->get_result();

        // Close statement
        $stmt->close();
        if($result->num_rows){
            while($row = $result->fetch_assoc()){
                $id[] = $row["id_mesa"];
                $qtCadeira[] = $row["qt_cadeira_mesa"];

                $mesas[] = $row;
            }
            // foreach ($id as $key => $value) {
            //     //echo $key . $value . "<br>";
            //     echo "ID: " . $id[$key] . ", QUANT_CADEIRA: ".$qtCadeira[$key]."<br>";
            // }
            return $mesas;
        }
    }
    function insertNewMesa(int $qtCadeira){
        // Prepare an insert statement
        $sql = "INSERT INTO `mesa`(`qt_cadeira_mesa`) VALUES (?)";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $qtCadeira);

            // Set parameters
            // $qtCadeira = 7;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo "Records inserted successfully.";
            } else{
                echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }
        // Close statement
        $stmt->close();
    }

    function selectAllLanchonete(){
        $sql = "SELECT * FROM LANCHONETE";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo "Records selected successfully.";
            } else{
                echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }

        //valores encontrados
        $result = $stmt->get_result();

        // Close statement
        $stmt->close();

        if($result->num_rows){
            while($row = $result->fetch_assoc()){
                $nome[] = $row["nm_lanchonete"];
                $email[] = $row["nm_email_lanchonete"];
                $endereco[] = $row["nm_endereco_lanchonete"];
            }
            foreach ($nome as $key => $value) {
                //echo $key . $value . "<br>";
                echo "NOME: ".$nome[$key]." ,EMAIL:".$email[$key]." ,TELEFONE:".$endereco[$key]."<br>";
            }
        }
    }
    function insertNewLanchonete(){
        // Prepare an insert statement
        $sql = "INSERT INTO `lanchonete`(`nm_lanchonete`, `nm_email_lanchonete`, `nm_endereco_lanchonete`) VALUES (?,?,?)";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sss", $nome, $email, $endereco);

            // Set parameters
            $nome = "Lanchonet";
            $email = "lanchonet@lanchonet.com.br";
            $endereco = "Rua False, n 123";

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo "Records inserted successfully.";
            } else{
                echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }
        // Close statement
        $stmt->close();
    }

    function selectAllPrato(){
        $sql = "SELECT * FROM PRATO";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // echo "Records selected successfully.";
            } else{
                // echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            // echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }

        //valores encontrados
        $result = $stmt->get_result();

        // Close statement
        $stmt->close();

        if($result->num_rows){
            $pratos = array();

            while($row = $result->fetch_assoc()){
                $id[] = $row["id_prato"];
                $nome[] = $row["nm_prato"];
                $valor[] = $row["vl_prato"];
                $descricao[] = $row["ds_prato"];
                
                $pratos[] = $row;
            }
            // escrevendo o que foi selecionado
            // foreach ($id as $key => $value) {
            //     //echo $key . $value . "<br>";
            //     echo "ID: " . $id[$key] . ", NOME: ".$nome[$key]." ,VALOR:".$valor[$key]." ,DESCRIÇÃO:".$descricao[$key]."<br>";
            // }
            
            return $pratos;
        }
    }
    function insertNewPrato(string $nome, float $valor, string $descricao){
        // Prepare an insert statement
        $sql = "INSERT INTO `prato`(`nm_prato`, `vl_prato`, `ds_prato`) VALUES (?,?,?)";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sds", $nome, $valor, $descricao);

            // Set parameters
            // $nome = "Arroz com Feijao";
            // $valor = 15.50;
            // $descricao = "Tem arroz e feijao";

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // echo "Records inserted successfully.";
            } else{
                // echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            // echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }
        // Close statement
        $stmt->close();
    }

    function selectAllPromocao(){
        $sql = "SELECT * FROM PROMOCAO";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo "Records selected successfully.";
            } else{
                echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }

        //valores encontrados
        $result = $stmt->get_result();

        // Close statement
        $stmt->close();

        if($result->num_rows){
            while($row = $result->fetch_assoc()){
                $id[] = $row["id_promocao"];
                $valor[] = $row["vl_promocao"];
                $porcentagem[] = $row["vl_porcentagem_promocao"];
                $idPrato[] = $row["id_prato"];
            }
            foreach ($id as $key => $value) {
                //echo $key . $value . "<br>";
                echo "ID: " . $id[$key] . ", VALOR: ".$valor[$key]." ,PORCENTAGEM:".$porcentagem[$key]." ,ID_PRATO:".$idPrato[$key]."<br>";
            }
        }
    }
    function insertNewPromocao(float $valor, float $porcentagem, int $idPrato){
        // Prepare an insert statement
        $sql = "INSERT INTO `promocao`(`vl_promocao`, `vl_porcentagem_promocao`, `id_prato`) VALUES (?,?,?)";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ddi", $valor, $porcentagem, $idPrato);

            // Set parameters
            // $valor = 5.50;
            // $porcentagem = null;
            // $idPrato = 1;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo "Records inserted successfully.";
            } else{
                echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }
        // Close statement
        $stmt->close();
    }

    function selectAllRefeicaoOfReserva(int $idReserva){
        $sql = "SELECT * FROM REFEICAO WHERE id_reserva = ?";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $idReserva);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // echo "Records selected successfully.";
            } else{
                // echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            // echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }

        //valores encontrados
        $result = $stmt->get_result();

        // Close statement
        $stmt->close();

        if($result->num_rows){
            while($row = $result->fetch_assoc()){
                // $id[] = $row["id_refeicao"];
                // $idReserva[] = $row["id_reserva"];
                // $idPrato[] = $row["id_prato"];

                $refeicoes[] = $row;
            }
            // foreach ($id as $key => $value) {
            //     echo "ID: " . $id[$key] . ", ID_RESERVA: ".$idReserva[$key]." ,ID_PRATO:".$idPrato[$key]." ,ID_PRATO:".$idPrato[$key]."<br>";
            // }
            return $refeicoes;
        }
    }
    function insertNewRefeicao(){
        // Prepare an insert statement
        $sql = "INSERT INTO `refeicao`(`id_reserva`, `id_prato`) VALUES ((SELECT id_reserva FROM reserva WHERE id_reserva = ?),(SELECT id_prato FROM prato WHERE id_prato = ?))";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ii", $idReserva, $idPrato);

            // Set parameters
            $idReserva = 7;
            $idPrato = 1;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo "Records inserted successfully.";
            } else{
                echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }
        // Close statement
        $stmt->close();
    }
    // Close connection
    //$conn->close();
}
// echo"<pre>";
//  $conexao = new conexao();
// $conexao->selectAllCliente();
// //$conexao->insertNewCliente();
// echo"<br>";
// $conexao->selectAllMesa();
// //$conexao->insertNewMesa();
// echo"<br>";
// $conexao->selectAllReserva();
// //$conexao->insertNewReserva();
// echo"<br>";
// $conexao->selectAllLanchonete();
// //$conexao->insertNewLanchonete();
// echo"<br>";
//  $conexao->selectAllPrato();
// //$conexao->insertNewPrato();
// echo"<br>";
// $conexao->selectAllPromocao();
// //$conexao->insertNewPromocao();
// echo"<br>";
// $conexao->selectAllRefeicao();
// //$conexao->insertNewRefeicao();
?>