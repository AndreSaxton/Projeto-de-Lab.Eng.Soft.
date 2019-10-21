<?php
class Conexao{
    public $servername = "127.0.0.1";
    public $username = "root";
    public $password = "";
    public $dbname = "id10939434_lancheonnet";

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
            
            $clientes = array();

            while($row = $result->fetch_assoc()){
                $clientes[$row['id_cliente']]['id'] = $row['id_cliente'];
                $clientes[$row['id_cliente']]['nome'] = $row['nm_cliente'];
                $clientes[$row['id_cliente']]['email'] = $row['nm_email_cliente'];
                $clientes[$row['id_cliente']]['telefone'] = $row['cd_telefone_cliente'];
                
            }

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
    function updateCliente(int $identificador, string $nome, float $telefone, string $email){
        // Prepare an insert statement
        $sql = "UPDATE `cliente` SET `nm_cliente` = ?, `nm_email_cliente` = ?, `cd_telefone_cliente` = ? WHERE id_cliente = ?";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssii", $nome, $email, $telefone, $identificador);

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
    function deleteCliente(int $identificador){
        // Prepare an insert statement
        $sql = "DELETE FROM `cliente` WHERE id_cliente = ?";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $identificador);

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

    function selectAllUsuario(){
        $sql = "SELECT * FROM USUARIO";
        /*$sql = "SELECT prato.id_prato, nm_prato, ds_prato,
         vl_prato-promocao.vl_promocao AS vl_prato  FROM `prato` 
         JOIN promocao on promocao.id_prato = prato.id_prato";*/
        
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
            $usuarios = array();

            while($row = $result->fetch_assoc()){
                $usuarios[$row['id']]['id'] = $row['id'];
                $usuarios[$row['id']]['login'] = $row['login'];
                $usuarios[$row['id']]['nome'] = $row['nome'];
                $usuarios[$row['id']]['ativo'] = $row['ativo'];
 
            }

            
            return $usuarios;
        }
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
    function insertNewRefeicao(int $idReserva, int $idPrato){
        // Prepare an insert statement
        $sql = "INSERT INTO `refeicao`(`id_reserva`, `id_prato`) VALUES ((SELECT id_reserva FROM reserva WHERE id_reserva = ?),(SELECT id_prato FROM prato WHERE id_prato = ?))";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ii", $idReserva, $idPrato);

            // Set parameters
            // $idReserva = 7;
            // $idPrato = 1;

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
    function insertNewReserva($dtInicio, $dtTermino, $dtPagamento, $idCliente, $idMesa, $pratos){
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
                // echo "Records inserted successfully.";
                $idReserva = $conn->insert_id;

                foreach ($pratos as $prato) {
                    $this->insertNewRefeicao($idReserva, $prato->getIdentificador());
                }

            } else{
                // echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            // echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }
        // Close statement
        $stmt->close();

    }
    function deleteReserva($identificador){
        // Prepare an insert statement
        $sql = "DELETE FROM `reserva` WHERE id_reserva = ?";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $identificador);

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
            $mesas = array();

            while($row = $result->fetch_assoc()){
                $mesas[$row['id_mesa']]['id'] = $row['id_mesa'];
                $mesas[$row['id_mesa']]['numero'] = $row['cd_numero_mesa'];
                $mesas[$row['id_mesa']]['cadeira'] = $row['qt_cadeira_mesa'];
                $mesas[$row['id_mesa']]['descricao'] = $row['ds_mesa'];
                $mesas[$row['id_mesa']]['disponibilidade'] = $row['disponibilidade'];
                
            }

            return $mesas;
        }
    }
    function insertNewMesa( int $numero, int $qt_cadeira, string $descricao, int $disp){
        // Prepare an insert statement
        $sql = "INSERT INTO `mesa`(`cd_numero_mesa`, `qt_cadeira_mesa`, `ds_mesa`, `disponibilidade`) VALUES (?,?,?,?)";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("iisi", $numero, $qt_cadeira, $descricao, $disp);
            // Set parameters
            // $qtCadeira = 7;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // echo "Records inserted successfully.";
            } else{
                // echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            echo $conn->error;
        }
        // Close statement
        $stmt->close();
    }
    function updateMesa(int $identificador, int $numero, int $qt_cadeira, string $descricao, int $disp){
        // Prepare an insert statement
        $sql = "UPDATE `mesa` SET `cd_numero_mesa` = ?, `qt_cadeira_mesa` = ?, `ds_mesa` = ?, `disponibilidade` = ? WHERE id_mesa = ?";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("iisii", $numero, $qt_cadeira, $descricao, $disp, $identificador);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // echo "Records inserted successfully.";
            } else{
                // echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
             echo $conn->error;
        }
        // Close statement
        $stmt->close();
    }
    function deleteMesa(int $identificador, int $situacao){
        // Prepare an insert statement
        $sql = "UPDATE `mesa` SET `disponibilidade` = ? WHERE id_mesa = ?";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ii", $situacao,$identificador);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // echo "Records inserted successfully.";
            } else{
                // echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            echo $conn->error;
        }
        // Close statement
        $stmt->close();
    }

    // nao sera usado
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
    // nao sera usado
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
        /*$sql = "SELECT prato.id_prato, nm_prato, ds_prato,
         vl_prato-promocao.vl_promocao AS vl_prato  FROM `prato` 
         JOIN promocao on promocao.id_prato = prato.id_prato";*/
        
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
    function updatePrato(int $identificador, string $nome, float $valor, string $descricao){
        // Prepare an insert statement
        $sql = "UPDATE `prato` SET `nm_prato`= ?,`vl_prato`= ?,`ds_prato`= ? WHERE `id_prato`= ?";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sdsi", $nome, $valor, $descricao, $identificador);

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
    function deletePrato(int $identificador){
        // Prepare an insert statement
        $sql = "DELETE FROM `prato` WHERE `id_prato`= ?";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $identificador);

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
    function insertNewUser(string $nome, string $login, string $senha){
        // Prepare an insert statement
        $sql = "INSERT INTO `usuario`(`login`, `nome`, `senha`,`ativo`) VALUES (?,?,?,?)";
        $conn = $this->connectToDatabase();
        $senhaCodificada = md5($senha);
        $ativo = 1;
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssi", $login, $nome, $senhaCodificada,$ativo);
            var_dump($stmt->execute());
            die();
            if($stmt->execute()){
                // echo "Records inserted successfully.";
            } else{
                echo $conn->error;

            }
        } else{
            echo $conn->error;
        }
        // Close statement
        $stmt->close();
    }
    function updateUsuario(int $id,string $nome, string $login, string $senha){
        // Prepare an insert statement
        $sql = "UPDATE `usuario` SET `nome`= ?,`login`= ?,`senha`= ? WHERE `id`= ?";
        $conn = $this->connectToDatabase();
        $senhaCodificada = md5($senha);

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssi", $nome, $login, $senhaCodificada, $id);

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
            echo $conn->error;
        }
        // Close statement
        $stmt->close();
    }
    function deleteUsuario(int $identificador, int $situacao){
        // Prepare an insert statement
        $sql = "UPDATE `usuario` SET `ativo`= ? WHERE `id`= ?";
        $conn = $this->connectToDatabase();


        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ii",$situacao,$identificador);
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // echo "Records inserted successfully.";
            } else{
                // echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else{
            echo $conn->error;
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
                $id[] = $row["id_promocao"];
                $valor[] = $row["vl_promocao"];
                $porcentagem[] = $row["vl_porcentagem_promocao"];
                $idPrato[] = $row["id_prato"];

                $promocoes[] = $row;
            }
            // foreach ($id as $key => $value) {
            //     //echo $key . $value . "<br>";
            //     echo "ID: " . $id[$key] . ", VALOR: ".$valor[$key]." ,PORCENTAGEM:".$porcentagem[$key]." ,ID_PRATO:".$idPrato[$key]."<br>";
            // }
            return $promocoes;
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
    function updatePromocao(int $identificador, float $valor, float $porcentagem, int $idPrato){
        // Prepare an insert statement
        $sql = "UPDATE `promocao` SET `vl_promocao` = ?, `vl_porcentagem_promocao` = ?, `id_prato` = ? WHERE id_promocao = ?";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ddii", $valor, $porcentagem, $idPrato, $identificador);

            // Set parameters
            // $valor = 5.50;
            // $porcentagem = null;
            // $idPrato = 1;

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
    function deletePromocao(int $identificador){
        // Prepare an insert statement
        $sql = "DELETE FROM `promocao` WHERE id_promocao = ?";
        $conn = $this->connectToDatabase();

        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $identificador);

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