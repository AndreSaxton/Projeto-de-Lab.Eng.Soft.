$(document).ready(function () {
    // requisicoes AJAX
    // estas recebem um json, e exibe o resultado em uma tabela
    function selectAllPrato(){
        let action = "selectAllPrato";
        // console.log(action);

        $.ajax({
            method: "POST",
            url: "controller.php",
            data: {action: action},
            success: function(response){
                let array = JSON.parse(response);
                // console.table(array);

                pratos = array;

                let divPrato = $("#divPrato");
                // console.log(divPrato);
                // let table = document.createElement("table");
                let table = $("#divPrato table");

                array.forEach(element => {
                    // console.table(element);
                    
                    let tr = document.createElement("tr");

                    let tdId = document.createElement("td");
                    let tdNm = document.createElement("td");
                    let tdVl = document.createElement("td");
                    let tdDs = document.createElement("td");

                    let textId = document.createTextNode(element.id_prato);
                    let textNm = document.createTextNode(element.ds_prato);
                    let textVl = document.createTextNode(element.vl_prato);
                    let textDs = document.createTextNode(element.ds_prato);

                    tdId.append(textId);
                    tdNm.append(textNm);
                    tdVl.append(textVl);
                    tdDs.append(textDs);

                    tr.append(tdId);
                    tr.append(tdNm);
                    tr.append(tdVl);
                    tr.append(tdDs);

                    table.append(tr);
                    divPrato.append(table);
                });
            }
        })
        .fail(function (response){
            console.log(response);
        })
    }
    function selectAllCliente(){
        let action = "selectAllCliente";
        // console.log(action);

        $.ajax({
            method: "POST",
            url: "controller.php",
            data: {action: action},
            success: function(response){
                let array = JSON.parse(response);
                // console.table(array);

                clientes = array;

                let divCliente = $("#divCliente");
                // console.log(divCliente);
                // let table = document.createElement("table");
                let table = $("#divCliente table");

                array.forEach(element => {                    
                    let tr = document.createElement("tr");

                    let tdId = document.createElement("td");
                    let tdNm = document.createElement("td");
                    let tdEmail = document.createElement("td");
                    let tdTel = document.createElement("td");

                    let textId = document.createTextNode(element.id_cliente);
                    let textNm = document.createTextNode(element.nm_cliente);
                    let textEmail = document.createTextNode(element.nm_email_cliente);
                    let textTel = document.createTextNode(element.cd_telefone_cliente);

                    tdId.append(textId);
                    tdNm.append(textNm);
                    tdEmail.append(textEmail);
                    tdTel.append(textTel);

                    tr.append(tdId);
                    tr.append(tdNm);
                    tr.append(tdEmail);
                    tr.append(tdTel);

                    table.append(tr);
                    divCliente.append(table);
                });
            }
        })
        .fail(function (response){
            console.log(response);
        })
    }
    function selectAllMesa(){
        let action = "selectAllMesa";
        // console.log(action);

        $.ajax({
            method: "POST",
            url: "controller.php",
            data: {action: action},
            success: function(response){
                // console.table(JSON.parse(response));
                let array = JSON.parse(response);

                mesas = array;

                let divMesa = $("#divMesa");
                let table = $("#divMesa table");

                array.forEach(element => {                    
                    let tr = document.createElement("tr");

                    let tdId = document.createElement("td");
                    let tdQt = document.createElement("td");

                    let textId = document.createTextNode(element.id_mesa);
                    let textQt = document.createTextNode(element.qt_cadeira_mesa);

                    tdId.append(textId);
                    tdQt.append(textQt);

                    tr.append(tdId);
                    tr.append(tdQt);

                    table.append(tr);
                    divMesa.append(table);
                });
            }
        })
        .fail(function (response){
            console.log(response);
        })
    }
    function selectAllReserva(){
        let action = "selectAllReserva";
        // console.log(action);

        $.ajax({
            method: "POST",
            url: "controller.php",
            data: {action: action},
            success: function(response){
                // console.table(JSON.parse(response));
                array = JSON.parse(response);

                let divReserva = $("#divReserva");
                let table = $("#divReserva table");

                array.forEach(element => {                    
                    let tr = document.createElement("tr");

                    let tdId = document.createElement("td");
                    let tdInicio = document.createElement("td");
                    let tdTermino = document.createElement("td");
                    let tdPagamento = document.createElement("td");
                    let tdCliente = document.createElement("td");
                    let tdMesa = document.createElement("td");

                    let textId = document.createTextNode(element.id_reserva);
                    let textInicio = document.createTextNode(element.dt_inicio_reserva);
                    let textTermino = document.createTextNode(element.dt_termino_reserva);
                    let textPagamento = document.createTextNode(element.dt_pagamento_reserva);
                    let textCliente = document.createTextNode(element.id_cliente);
                    let textMesa = document.createTextNode(element.id_mesa);

                    tdId.append(textId);
                    tdInicio.append(textInicio);
                    tdTermino.append(textTermino);
                    tdPagamento.append(textPagamento);
                    tdCliente.append(textCliente);
                    tdMesa.append(textMesa);

                    tr.append(tdId);
                    tr.append(tdInicio);
                    tr.append(tdTermino);
                    tr.append(tdPagamento);
                    tr.append(tdCliente);
                    tr.append(tdMesa);

                    table.append(tr);
                    divReserva.append(table);
                });
            }
        })
        .fail(function (response){
            console.log(response);
        })
    }
    function selectAllRefeicaoOfReserva(id_reserva){
        let action = "selectAllRefeicaoOfReserva";
        // console.log(action);

        $.ajax({
            method: "POST",
            url: "controller.php",
            data: {
                action: action,
                id_reserva: id_reserva
            },
            success: function(response){
                // console.table(JSON.parse(response));
                array = JSON.parse(response);

                let divRefeicao = $("#divRefeicao");
                let table = $("#divRefeicao table");

                array.forEach(element => {                    
                    let tr = document.createElement("tr");

                    let tdId = document.createElement("td");
                    let tdReserva = document.createElement("td");
                    let tdPrato = document.createElement("td");

                    let textId = document.createTextNode(element.id_refeicao);
                    let textReserva = document.createTextNode(element.id_reserva);
                    let textPrato = document.createTextNode(element.id_prato);

                    tdId.append(textId);
                    tdReserva.append(textReserva);
                    tdPrato.append(textPrato);

                    tr.append(tdId);
                    tr.append(tdReserva);
                    tr.append(tdPrato);

                    table.append(tr);
                    divRefeicao.append(table);
                });
            }
        })
        .fail(function (response){
            console.log(response);
        })
    }
    // estas montam um objeto e enviam via json para ser salvo no BD
    function cadastrarCliente(){
        let nome = $("#clienteNome").val();
        let telefone = $("#clienteTelefone").val();
        let email = $("#clienteEmail").val();

        if(nome && telefone && email){
            cliente = new Cliente(null, nome, telefone, email);
            // console.log(cliente);

            let action = "insertNewCliente";

            $.ajax({
                method: "POST",
                url: "controller.php",
                data: {
                    action: action,
                    data: JSON.stringify(cliente)
                },
                success: function(response){
                    console.table(response);
                }
            })
            .fail(function (response){
                console.log(response);
            })
        }
    }
    function cadastrarPrato(){
        let nome = $("#pratoNome").val();
        let valor = $("#pratoValor").val();
        let descricao = $("#pratoDescricao").val();

        if(nome && valor && descricao){
            prato = new Prato(null, nome, valor, descricao);
            // console.log(prato);

            let action = "insertNewPrato";

            $.ajax({
                method: "POST",
                url: "controller.php",
                data: {
                    action: action,
                    data: JSON.stringify(prato)
                },
                success: function(response){
                    console.table(response);
                }
            })
            .fail(function (response){
                console.log(response);
            })
        }
    }
    function cadastrarMesa(){
        let qt_cadeira = $("#mesaQtdCadeira").val();
        
        if(qt_cadeira){
            mesa = new Mesa(null, qt_cadeira);
            // console.log(mesa);

            let action = "insertNewMesa";

            $.ajax({
                method: "POST",
                url: "controller.php",
                data: {
                    action: action,
                    data: JSON.stringify(mesa)
                },
                success: function(response){
                    console.table(response);
                }
            })
            .fail(function (response){
                console.log(response);
            })
        }
    }
    function cadastrarReserva(){
        let inicio = $("#reservaHInicio").val();
        let termino = $("#reservaHTermino").val();
        let idCliente = $("#reservaIdCliente").val();
        let idMesa = $("#reservaIdMesa").val();
        let pagamento = $("#reservaPagamento").val();

        // console.log(refeicao);
        // console.log(clientes);
        // console.log(mesas);

        if(inicio && termino && idCliente && idMesa && refeicao){
            
            cliente = $.map(clientes, function( n ) {
                if(n.id_cliente == idCliente){
                    return n;
                }
            });

            mesa = $.map(mesas, function( n ) {
                // console.log(n);
                if(n.id_mesa == idMesa){
                    return n;
                }
            });

            
            // console.log(mesa);
            reserva = new Reserva(null, inicio, termino, cliente, mesa, refeicao, pagamento);
            // console.log(reserva);

            let action = "insertNewReserva";

            $.ajax({
                method: "POST",
                url: "controller.php",
                data: {
                    action: action,
                    data: JSON.stringify(reserva)
                },
                success: function(response){
                    console.table(response);
                }
            })
            .fail(function (response){
                console.log(response);
            })
        }
    }
    function cadastrarPromocao(){
        let isPorcentagem = $("#promocaoIsPorcentagem:checked").val()
        let id_prato = $("#promocaoIdPrato").val();
        let valor = $("#promocaoValor").val();

        if(id_prato && valor){
            let prato = $.map(pratos, function( n ) {
                if(n.id_prato == id_prato){
                    return n;
                }
            });
            let valorPorcentagem;
            let valorReal;
            if (isPorcentagem) {
                isPorcentagem = true;
                valorReal = calcularPorcentagem(prato[0].vl_prato, valor);
                valorPorcentagem = valor;
            }
            else{
                isPorcentagem = false;
                valorReal = valor;
                valorPorcentagem = 0;
            }
            
            promocao = new Promocao(prato, valorPorcentagem, isPorcentagem, valorReal);
            console.table(promocao);

            let action = "insertNewPromocao";

            $.ajax({
                method: "POST",
                url: "controller.php",
                data: {
                    action: action,
                    data: JSON.stringify(promocao)
                },
                success: function(response){
                    console.table(response);
                }
            })
            .fail(function (response){
                console.log(response);
            })
        }
    }
    // este salva os pratos em um json no front
    function adicionarReservaPrato(){
        let idPrato = $("#reservaIdPrato").val();
        
        let refeicaoTable = $("#divRefeicaoReserva table");
        
        $("#reservaIdPrato").val(null);

        let prato = $.map(pratos, function( n ) {
            if(n.id_prato == idPrato){
                return n;
            }
        });

        refeicao.adicionarPrato(prato);
        // pratosRefeicao.push(prato);

        prato.forEach(element => {
            
            let tr = document.createElement("tr");

            let tdId = document.createElement("td");
            let tdNm = document.createElement("td");
            let tdVl = document.createElement("td");
            let tdDs = document.createElement("td");
        
            let textId = document.createTextNode(element.id_prato);
            let textNm = document.createTextNode(element.nm_prato);
            let textVl = document.createTextNode(element.vl_prato);
            let textDs = document.createTextNode(element.ds_prato);

            tdId.append(textId);
            tdNm.append(textNm);
            tdVl.append(textVl);
            tdDs.append(textDs);

            tr.append(tdId);
            tr.append(tdNm);
            tr.append(tdVl);
            tr.append(tdDs);

            refeicaoTable.append(tr);
        });
    }
    // calcular porcentagem
    function calcularPorcentagem (valor, porcentagem) {
        console.log(valor * (porcentagem / 100));
        
        return valor * (porcentagem / 100);
    }
    // calcula e exibe o desconto do prato
    function calcularValorFinal (id_prato, valor) {
            let prato = $.map(pratos, function( n ) {
                if(n.id_prato == id_prato){
                    return n;
                }
            });
            
            if($("#promocaoIsPorcentagem:checked").val())
                valorFinal = prato[0].vl_prato - calcularPorcentagem(prato[0].vl_prato, valor);
            else
                valorFinal = prato[0].vl_prato - valor;
            return valorFinal;
    }
    // muda o valor final do prato
    function mudarValorFinalPromocao() {
        let id_prato = $("#promocaoIdPrato").val();
        let valor = $("#promocaoValor").val();

        if(id_prato && valor){
            let valorFinal = calcularValorFinal(id_prato, valor);
            $("#promocaoValorFinal").val(valorFinal);
            console.table(valor);
            console.table(valorFinal);
        }
    }
    
    // classes
    class Cliente{
        id;
        nome;
        telefone;
        email;

        constructor(id, nome, telefone, email){
            this.id = id;
            this.nome = nome;
            this.telefone = telefone;
            this.email = email;
        }
    }
    class Mesa{
        id;
        qt_cadeira;

        constructor(id, qt_cadeira_mesa){
            this.id = id;
            this.qt_cadeira = qt_cadeira_mesa;
        }
    }
    class Prato{
        id;
        nome;
        valor;
        descricao;

        constructor(id, nome, valor, descricao){
            this.id = id;
            this.nome = nome;
            this.valor = valor;
            this.descricao = descricao;
        }
    }
    class Reserva{
        id;
        hInicio;
        hTermino;
        cliente = new Cliente();
        mesa = new Mesa();
        prato = Array();
        pagamento;

        constructor(id, hInicio, hTermino, cliente, mesa, prato, pagamento){
            this.id = id;
            this.hInicio = hInicio;
            this.hTermino = hTermino;
            this.cliente = cliente;
            this.mesa = mesa;
            this.prato = prato;
            this.pagamento = pagamento;
        }
    }
    class Promocao{
        valor;
        isPorcentagem;
        porcentagem;
        prato;

        constructor(prato, porcentagem, isPorcentagem, valor){
            this.prato = prato;
            this.porcentagem = porcentagem;
            this.isPorcentagem = isPorcentagem;
            this.valor = valor;
        }
    }
    class Refeicao{
        prato = new Array();
        idReserva;

        constructor(idReserva = null){
            this.idReserva = idReserva;
        }

        adicionarPrato(prato) {
            this.prato.push(prato);
        }
    }
    
    // instanciando e exibindo o objeto no log
    /*
    let c = new Cliente(1, "João", 13912345678, "email@email.com");
    console.log(c);
    let m = new Mesa(1, 3);
    console.log(m);
    let p = new Prato(1, "Arroz com Feijao", 15.5, "Tem arroz e feijao");
    console.log(p);
    let prato = Array();
    prato.push(
        new Prato(1, "Arroz com Feijao", 15.5, "Tem arroz e feijao"),
        new Prato(2, "P\u00e3o com ovo", 5, "P\u00e3o com ovo frito")
    );
    let r = new Reserva(null, "2019-02-15 15:20:14", "2019-02-15 16:20:14", c, m, prato, null);
    console.log(r);
    let pro = new Promocao(0, true, 20.5);
    console.log(pro);
    let ref = new Refeicao();
    ref.adicionarPrato(7);
    console.log(ref);

    // exibe os dados do cliente
    function popularDadosCliente() {
        $("#divDados p")[0].innerHTML += c.id;
        $("#divDados p")[1].innerHTML += c.nome;
        $("#divDados p")[2].innerHTML += c.telefone;
        $("#divDados p")[3].innerHTML += c.email;
    }
    popularDadosCliente();
    */
   

    // para guardar os pratos
    var pratos = Array();
    // para guardar os pratos da reserva
    var refeicao = new Refeicao();
    // var pratosRefeicao = Array();
    // para guardar os clientes
    var clientes = Array();
    // para guardar as mesas
    var mesas = Array();
    // usado na selectAllRefeicaoOfReserva()
    var idReservaRefeicao = 19;

    // funções que populam a pagina
    selectAllPrato();
    selectAllCliente();
    selectAllMesa();
    selectAllReserva();
    selectAllRefeicaoOfReserva(idReservaRefeicao);
    
    $("#cadastrarCliente").click(function(){
        cadastrarCliente();
    });
    $("#cadastrarPrato").click(function(){
        cadastrarPrato();
    });
    $("#cadastrarMesa").click(function(){
        cadastrarMesa()
    });
    $("#cadastrarReserva").click(function(){
        cadastrarReserva()
    });
    $("#adicionarReservaPrato").click(function(){
        adicionarReservaPrato();
    });
    $("#cadastrarPromocao").click(function(){
        cadastrarPromocao();
    });
    $("#promocaoIsPorcentagem").change(function (e) {
        if(this.checked)
            $("#promocaoValor").attr("placeholder", "Porcentagem");
        else
            $("#promocaoValor").attr("placeholder", "Desconto em Real");
        $("#promocaoValor").val(0);
        mudarValorFinalPromocao();
    });
    $("#promocaoIdPrato").change(function (e) {
        mudarValorFinalPromocao();
    });
    $("#promocaoValor").change(function (e) {
        mudarValorFinalPromocao();
    });
    
});