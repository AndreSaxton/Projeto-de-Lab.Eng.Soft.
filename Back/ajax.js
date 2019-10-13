$(document).ready(function () {
    function selectAllPrato(){
        let action = "selectAllPrato";
        // console.log(action);

        $.ajax({
            method: "POST",
            url: "controller.php",
            data: {action: action},
            success: function(response){
                let array = JSON.parse(response);
                console.table(array);

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
                console.table(array);

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
                console.table(JSON.parse(response));
                let array = JSON.parse(response);

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
                console.table(JSON.parse(response));
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
    function selectAllRefeicaoOfReserva(){
        let action = "selectAllRefeicaoOfReserva";
        // console.log(action);

        $.ajax({
            method: "POST",
            url: "controller.php",
            data: {action: action},
            success: function(response){
                console.table(JSON.parse(response));
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
    selectAllPrato();
    selectAllCliente();
    selectAllMesa();
    selectAllReserva();
    selectAllRefeicaoOfReserva();

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
    let c = new Cliente(1, "João", 13912345678, "email@email.com");
    console.log(c);

    class Mesa{
        id;
        qt_cadeira;

        constructor(id, qt_cadeira_mesa){
            this.id = id;
            this.qt_cadeira = qt_cadeira_mesa;
        }
    }
    let m = new Mesa(1, 3);
    console.log(m);
    
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
    let p = new Prato(1, "Arroz com Feijao", 15.5, "Tem arroz e feijao");
    console.log(p);

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
    let prato = Array();
    prato.push(
        new Prato(1, "Arroz com Feijao", 15.5, "Tem arroz e feijao"),
        new Prato(2, "P\u00e3o com ovo", 5, "P\u00e3o com ovo frito")
    );
    let r = new Reserva(null, "2019-02-15 15:20:14", "2019-02-15 16:20:14", c, m, prato, null);
    console.log(r);

    class Promocao{
        valor;
        isPorcentagem;
        porcentagem;

        constructor(valor, isPorcentagem, porcentagem){
            this.valor = valor;
            this.isPorcentagem = isPorcentagem;
            this.porcentagem = porcentagem;
        }
    }
    let pro = new Promocao(0, true, 20.5);
    console.log(pro);

    class Refeicao{
        idPrato;
        idReserva;;

        constructor(idPrato, idReserva){
            this.idPrato = idPrato;
            this.idReserva = idReserva;
        }
    }
    let ref = new Refeicao(2, 7);
    console.log(ref);

});