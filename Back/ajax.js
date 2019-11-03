$(document).ready(function () {
    // requisicoes AJAX
    // estas recebem um json, e exibe o resultado em uma tabela
    function selectAllPrato(){
        let action = "selectAllPrato";
        // console.log(action);

        $.ajax({
            method: "POST",
            url: urlController,
            data: {action: action},
            success: function(response){
                let array = JSON.parse(response);
                // console.table(array);

                pratos = array;

                // let divPrato = $("#divPrato");
                // console.log(divPrato);
                // let table = document.createElement("table");
                let table = $(".tablePrato");

                array.forEach(element => {
                    // console.table(element);
                    // criando elementos da tabela
                    let tr = document.createElement("div");

                    let tdId = document.createElement("div");
                    let tdNm = document.createElement("div");
                    let tdVl = document.createElement("div");
                    let tdDs = document.createElement("div");
                    let tdAtivo = document.createElement("a");
                    let tdEditar = document.createElement("a");

                    let textId = document.createTextNode(element.id_prato);
                    let textNm = document.createTextNode(element.nm_prato);
                    let textVl = document.createTextNode(element.vl_prato);
                    let textDs = document.createTextNode(element.ds_prato);
                    let textAtivo = document.createTextNode("Ativo");
                    let textEditar = document.createTextNode("Editar");

                    // atribuindo classes
                    tr.className = "row";
                    tdId.className = "cell";
                    tdNm.className = "cell";
                    tdVl.className = "cell";
                    tdDs.className = "cell";
                    tdAtivo.className = "cell";
                    tdEditar.className = "cell atualizar";

                    tdId.append(textId);
                    tdNm.append(textNm);
                    tdVl.append(textVl);
                    tdDs.append(textDs);
                    tdAtivo.append(textAtivo);
                    tdEditar.append(textEditar);

                    tr.append(tdId);
                    tr.append(tdNm);
                    tr.append(tdVl);
                    tr.append(tdDs);
                    tr.append(tdAtivo);
                    tr.append(tdEditar);

                    table.append(tr);
                    // divPrato.append(table);

                    
                    $(tdAtivo).attr("id", "deletarPrato");
                    $(tdAtivo).attr("href", "#");
                    $(tdEditar).attr("href", "#");
                    // atribuindo funcao para carregar dados no form editar
                    $(tdEditar).click(function(){
                        carregarDadosFormEditar(element.id_prato);
                    });
                    $(tdAtivo).click(function(){
                        $("#delpratoId").val(element.id_prato);
                        deletarPrato();
                    });
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
            url: urlController,
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
            url: urlController,
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
            url: urlController,
            data: {action: action},
            success: function(response){
                // console.table(JSON.parse(response));
                array = JSON.parse(response);

                reservas = array;

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
            url: urlController,
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
    function selectAllPromocao(){
        let action = "selectAllPromocao";
        // console.log(action);

        $.ajax({
            method: "POST",
            url: urlController,
            data: {action: action},
            success: function(response){
                // console.table(JSON.parse(response));
                let array = JSON.parse(response);

                promocoes = array;

                let divPromocao = $("#divPromocao");
                let table = $("#divPromocao table");

                array.forEach(element => {                    
                    let tr = document.createElement("tr");

                    let tdId = document.createElement("td");
                    let tdVlReal = document.createElement("td");
                    let tdVlPorc = document.createElement("td");
                    let tdIdPrato = document.createElement("td");

                    let textId = document.createTextNode(element.id_promocao);
                    let textVlReal = document.createTextNode(element.vl_promocao);
                    let textVlPorc = document.createTextNode(element.vl_porcentagem_promocao);
                    let textIdPrato = document.createTextNode(element.id_prato);

                    tdId.append(textId);
                    tdVlReal.append(textVlReal);
                    tdVlPorc.append(textVlPorc);
                    tdIdPrato.append(textIdPrato);

                    tr.append(tdId);
                    tr.append(tdVlReal);
                    tr.append(tdVlPorc);
                    tr.append(tdIdPrato);

                    table.append(tr);
                    divPromocao.append(table);
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
                url: urlController,
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
                url: urlController,
                data: {
                    action: action,
                    data: JSON.stringify(prato)
                },
                success: function(response){
                    console.table(response);
                    alert('Sucesso!');
                    location.reload();
                }
            })
            .fail(function (response){
                console.log(response);
            })
        }
    }
    function cadastrarUsuario(){
        let nome = $("#usuarioNome").val();
        let login = $("#usuarioLogin").val();
        let senha = $("#usuarioSenha").val();
        console.log(nome);

        if(nome && login && senha){
            user = new Usuario(null, nome, login, senha,1);
            // console.log(prato);

            let action = "insertNewUsuario";

            $.ajax({
                method: "POST",
                url: urlController,
                data: {
                    action: action,
                    data: JSON.stringify(user)
                },
                success: function(response){
                    console.table(response);
                    alert('Sucesso!');
                    location.reload();
                }
            })
            .fail(function (response){
                console.log(response);
            })
        }
    }
    function cadastrarMesa(){
        let numero = $("#mesaNumero").val();
        let qt_cadeira = $("#mesaCadeira").val();
        let desc = $("#mesaDesc").val();
        
        if(qt_cadeira && desc && numero){
             mesa = new Mesa(null, numero, qt_cadeira, desc,1);
            // console.log(mesa);

            let action = "insertNewMesa";

            $.ajax({
                method: "POST",
                url: urlController,
                data: {
                    action: action,
                    data: JSON.stringify(mesa)
                },
                success: function(response){
                    console.table(response);
                    alert('Sucesso!');
                    location.reload();
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
                url: urlController,
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
        //let isPorcentagem = $("#promocaoIsPorcentagem:checked").val()
        let nome = $("#promoNome").val();
        let descricao = $("#promoDesc").val()
        let valor = $("#promoValor").val();

        if(nome && descricao && valor){
        
           promocao = new Promocao(null, valor, nome, descricao,1);

            let action = "insertNewPromocao";

            $.ajax({
                method: "POST",
                url: urlController,
                data: {
                    action: action,
                    data: JSON.stringify(promocao)
                },
                success: function(response){
                    console.table(response);
                    alert('Sucesso!');
                    location.reload();
                }
            })
            .fail(function (response){
                console.log(response);
            })
        }
    }
    // estas montam um objeto e enviam via json para serem alterados no BD
    function alterarCliente(){
        let id = $("#altclienteId").val();
        let nome = $("#altclienteNome").val();
        let telefone = $("#altclienteTelefone").val();
        let email = $("#altclienteEmail").val();

        if(nome && telefone && email){
            cliente = new Cliente(id, nome, telefone, email);
            let action = "updateCliente";

            $.ajax({
                method: "POST",
                url: urlController,
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
    function alterarPrato(){
        let id = $("#codigoPrato").val();
        let nome = $("#nomePrato").val();
        let valor = $("#valorPrato").val();
        let descricao = $("#descPrato").val();

        if(nome && valor && descricao){
            prato = new Prato(id, nome, valor, descricao);
            let action = "updatePrato";

            $.ajax({
                method: "POST",
                url: urlController,
                data: {
                    action: action,
                    data: JSON.stringify(prato)
                },
                success: function(response){
                    console.table(response);
                    alert('Sucesso!');
                    location.reload();
                }
            })
            .fail(function (response){
                console.log(response);
            })
        }
    }
    function alterarUsuario(){
        let id = $("#idUsuario").val();
        let nome = $("#nomeUsuario").val();
        let login = $("#loginUsuario").val();
        let senha = $("#senhaUsuario").val();

        if(nome && login && senha){
            usuario = new Usuario(id, nome, login, senha,1);
            let action = "updateUsuario";

            $.ajax({
                method: "POST",
                url: urlController,
                data: {
                    action: action,
                    data: JSON.stringify(usuario)
                },
                success: function(response){
                    console.table(response);
                    alert('Sucesso!');
                    location.reload();
                }
            })
            .fail(function (response){
                console.log(response);
            })
        }
    }
    function alterarMesa(){
        let id = $("#idMesa").val();
        let numero = $("#numeroMesa").val();
        let qt_cadeira = $("#cadeiraMesa").val();
        let desc = $("#descMesa").val();
        
        //id, numero, qt_cadeira_mesa, descricao, disponibilidade
        if(qt_cadeira && desc && numero){
            mesa = new Mesa(id, numero, qt_cadeira, desc,1);

            let action = "updateMesa";

            $.ajax({
                method: "POST",
                url: urlController,
                data: {
                    action: action,
                    data: JSON.stringify(mesa)
                },
                success: function(response){
                    console.table(response);
                    alert('Sucesso!');
                    location.reload();
                }
            })
            .fail(function (response){
                console.log(response);
            })
        }
    }
    function alterarReserva(){
        let id = $("#altreservaId").val();
        let inicio = $("#altreservaHInicio").val();
        let termino = $("#altreservaHTermino").val();
        let idCliente = $("#altreservaIdCliente").val();
        let idMesa = $("#altreservaIdMesa").val();
        let pagamento = $("#altreservaPagamento").val();

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

            reserva = new Reserva(id, inicio, termino, cliente, mesa, refeicao, pagamento);

            let action = "updateReserva";

            $.ajax({
                method: "POST",
                url: urlController,
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
    function alterarPromocao(){
        let id = $("#idPromo").val();
        let nome = $("#nomePromo").val();
        let descricao = $("#descPromo").val()
        let valor = $("#valorPromo").val();

        if(id && nome && descricao && valor){

            promocao = new Promocao(id, valor, nome, descricao,1);

            let action = "updatePromocao";

            $.ajax({
                method: "POST",
                url: urlController,
                data: {
                    action: action,
                    data: JSON.stringify(promocao)
                },
                success: function(response){
                    console.table(response);
                    alert('Sucesso!');
                    location.reload();
                }
            })
            .fail(function (response){
                console.log(response);
            })
        }
    }
    // estas montam um objeto e enviam via json para serem alterados no BD
    function deletarCliente(){
        let idCliente = $("#delclienteId").val();

        if(idCliente){
            cliente = $.map(clientes, function( n ) {
                if(n.id_cliente == idCliente){
                    return n;
                }
            });
            
            cliente = new Cliente(idCliente, cliente.nm_cliente, cliente.cd_telefone_cliente, cliente.nm_email_cliente);
            let action = "deleteCliente";

            $.ajax({
                method: "POST",
                url: urlController,
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
    function deletarPrato(){
        let idPrato = $("#delpratoId").val();
        let situacao = $("#delpratoAtivo").val();

            prato = new Prato(idPrato, null, null, null,situacao);
            let action = "deletePrato";

            $.ajax({
                method: "POST",
                url: urlController,
                data: {
                    action: action,
                    data: JSON.stringify(prato)
                },
                success: function(response){
                    console.table(response);
                    alert('Sucesso!');
                    location.reload();
                }
            })
            .fail(function (response){
                console.log(response);
            })
        
    }
    function deletarUsuario(){
        let idUser = $("#deluserId").val();
        let situacao = $("#deluserAtivo").val(); 

        user = new Usuario(idUser, null, null, null,situacao);
        let action = "deleteUsuario";

        $.ajax({
            method: "POST",
            url: urlController,
            data: {
                action: action,
                data: JSON.stringify(user)
            },
            success: function(response){
                console.table(response);
                alert('Sucesso!');
                location.reload();
            }
        })
        .fail(function (response){
            console.log(response);
        })
        
    }
    function deletarMesa(){
        let idMesa = $("#delmesaId").val();
        let situacao = $("#delmesaAtivo").val(); 
        

        mesa = new Mesa(idMesa,null,null,null, situacao); 

        let action = "deleteMesa";

        $.ajax({
            method: "POST",
            url: urlController,
            data: {
                action: action,
                data: JSON.stringify(mesa)
            },
            success: function(response){
                console.table(response);
                alert('Sucesso!');
                location.reload();
            }
        })
        .fail(function (response){
            console.log(response);
        })

    }
    function deletarReserva(){
        let idReserva = $("#delreservaId").val();
        
        if(idReserva){
            let reserva = $.map(reservas, function( n ) {
                if(n.id_reserva == idReserva){
                    return n;
                }
            });
            reserva = reserva[0];
            reserva = new Reserva(idReserva, reserva.dt_inicio_reserva, reserva.dt_termino_reserva, reserva.id_cliente, reserva.id_mesa, null, reserva.dt_pagamento_reserva);
            console.table(reserva);

            let action = "deleteReserva";

            $.ajax({
                method: "POST",
                url: urlController,
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
    function deletarPromocao(){
        let idPromo = $("#delpromoId").val();
        let situacao = $("#delpromoAtivo").val(); 
        
        
        if(idPromo && situacao){
            promocao = new Promocao(idPromo, null, null, null,situacao);
            
            let action = "deletePromocao";

            $.ajax({
                method: "POST",
                url: urlController,
                data: {
                    action: action,
                    data: JSON.stringify(promocao)
                },
                success: function(response){
                    console.table(response);
                    alert('Sucesso!');
                    location.reload();
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
    // muda o valor final do prato
    function carregarDadosFormEditar(id_prato){
        let prato = $.map(pratos, function( n ) {
            if(n.id_prato == id_prato){
                return n;
            }
        });
        prato = prato[0];
        $("#altpratoId").val(prato.id_prato);
        $("#altpratoNome").val(prato.nm_prato);
        $("#altpratoValor").val(prato.vl_prato);
        $("#altpratoDescricao").val(prato.ds_prato);
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
        numero;
        qt_cadeira;
        descricao;
        disponibilidade;

        constructor(id, numero, qt_cadeira_mesa, descricao, disponibilidade){
            this.id = id;
            this.numero = numero;
            this.qt_cadeira = qt_cadeira_mesa;
            this.descricao = descricao;
            this.disponibilidade = disponibilidade;
        }
    }
    class Prato{
        id;
        nome;
        valor;
        descricao;
        situacao;

        constructor(id, nome, valor, descricao, situa = 1){
            this.id = id;
            this.nome = nome;
            this.valor = valor;
            this.descricao = descricao;
            this.situacao = situa;
        }
    }
    class Usuario{
        id;
        nome;
        login;
        senha;
        situacao;

        constructor(id, nome, login, senha,situa){
            this.id = id;
            this.nome = nome;
            this.login = login;
            this.senha = senha;
            this.situacao = situa;
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
        id;
        valor;
        nome;
        descricao;
        situacao;

        constructor(id, valor, nome, descricao, situacao){
            this.id = id;
            this.valor = valor;
            this.nome = nome;
            this.descricao = descricao;
            this.situacao = situacao;
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
    
    // para guardar os pratos
    var pratos = Array();
    // para guardar os pratos da reserva
    var refeicao = new Refeicao();
    // para guardar os clientes
    var clientes = Array();
    // para guardar as mesas
    var mesas = Array();
    // para guardar as promocoes
    var promocoes = Array();
    // para guardar as reservas
    var reservas = Array();
    // usado na selectAllRefeicaoOfReserva()
    var idReservaRefeicao = 19;
    // url onde esta o controller
    var urlController = "../Back/controller.php";

    // funções que populam a pagina
    selectAllPrato();
    selectAllCliente();
    selectAllMesa();
    selectAllReserva();
    selectAllRefeicaoOfReserva(idReservaRefeicao);
    selectAllPromocao();
    
    $("#cadastrarCliente").click(function(){
        cadastrarCliente();
    });
    $("#cadastrarPrato").click(function(){
        cadastrarPrato();
    });
    $("#cadastrarUsuario").click(function(){
        cadastrarUsuario();
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

    $("#alterarCliente").click(function(){
        alterarCliente();
    });
    $("#alterarPrato").click(function(){
        alterarPrato();
    });
    $("#alterarUsuario").click(function(){
        alterarUsuario();
    });
    $("#alterarMesa").click(function(){
        alterarMesa()
    });
    $("#alterarReserva").click(function(){
        alterarReserva()
    });
    $("#alterarPromocao").click(function(){
        alterarPromocao();
    });

    $("#deletarCliente").click(function(){
        deletarCliente();
    });
    $("#deletarPrato").click(function(){
        deletarPrato();
    });
    $("#deletarUsuario").click(function(){
        deletarUsuario();
    });
    $("#deletarMesa").click(function(){
        deletarMesa()
    });
    $('.desativarPrato').click(function() {
        id = $(this).data('id')
        ativo = $(this).data('ativo');
        $('#delpratoId').val(id);
        $('#delpratoAtivo').val(ativo);
         deletarPrato();
    });
    $('.desativarMesa').click(function() {
        id = $(this).data('id')
        ativo = $(this).data('ativo');
        $('#delmesaId').val(id);
        $('#delmesaAtivo').val(ativo);
         deletarMesa();
    });
    $("#deletarReserva").click(function(){
        deletarReserva()
    });
    $("#deletarPromocao").click(function(){
        deletarPromocao();
    });
    $('.desativarPromocao').click(function() {
        id = $(this).data('id')
        ativo = $(this).data('ativo');
        $('#delpromoId').val(id);
        $('#delpromoAtivo').val(ativo);
         deletarPromocao();
    });
    $('.desativarUsuario').click(function() {
        id = $(this).data('id')
        ativo = $(this).data('ativo');
        $('#deluserId').val(id);
        $('#deluserAtivo').val(ativo);
         deletarUsuario();
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