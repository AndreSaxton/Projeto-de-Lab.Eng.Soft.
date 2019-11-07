$( document ).ready(function() {


	$("#clienteContato").mask("(00) 0000-00009");

    $('#lanche-login').click(function() {
        $("#etapa-escolha-login").slideUp();
        setTimeout(function(){ 
        	$("#etapa-realiza-login").slideDown(); 
        	$("#etapa-realiza-login").css('display','flex');
        	$("#container-acao").css('background-image','url(Icones/background_etapas_genericas.png)').fadeIn();
        }, 500);
    });

    $('#novo-membro').click(function(e) { 
    	e.preventDefault();
        $("#etapa-realiza-login").slideUp();
        setTimeout(function(){ 
        	$("#etapa-realiza-cadastro").slideDown(); 
        	$("#etapa-realiza-cadastro").css('display','flex');
        }, 500);
    });

    $('#btn-pessoas').click(function() { 
        $("#etapa-pessoas").slideUp();
        setTimeout(function(){ 
        	$("#etapa-mesas").slideDown(); 
        	$("#etapa-mesas").css('display','flex');
        }, 500);

        var quantidade = $('#pessoas').val();
        $('#pessoas').val(quantidade);
    });

    $('#escolhe-prato').click(function() { 

    	var urlSessao = "../Back/reserva.php";
    	var mesa = $('#escolheMesa').val();

        $.ajax({
				type: 'POST',
				url: urlSessao,
				async: true,
				data: {mesa: mesa},
				success: function(data) {
					
					if(data !="ERROR"){
						adicionarpratos(data);
					}else{
						alert('Um erro ocorreu, tente novamente mais tarde');
					}

				}
			});
        
        // $("#etapa-mesas").slideUp();
        // setTimeout(function(){ 
        //     $("#etapa-pratos").slideDown(); 
        //     $("#etapa-pratos").css('display','flex');
        // }, 500);

    });

    function adicionarpratos(reserva){
    	var urlAdiciona = "../Back/adicionarPrato.php";
    	var qtd = $('#qtdPrato').val();
    	var prato;
    	var verifica;
    	var reserva = reserva;
    	var pratoId;
    	var quantidade;
    	for (var i = 1; i <= qtd; i++) {
    		prato = "#qtd-prato-"+i;
    		verifica ="#ver-prato-"+i;
 
    		if(!($(verifica).hasClass('desativado'))){
    			pratoId = $(verifica).data('id');
    			quantidade = $(prato).val();
    			$.ajax({
				type: 'POST',
				url: urlAdiciona,
				async: true,
				data: {prato: pratoId, reserva:reserva, quantidade:quantidade},
				success: function(reservado) {
					if(reservado !="ERROR"){
						$("#etapa-pratos").slideUp();
				        setTimeout(function(){ 
				            $("#etapa-final").slideDown(); 
				            $("#etapa-final").css('display','flex');
				        }, 500);

					}else{
						alert('Um erro ocorreu, tente novamente mais tarde');
					}

				}
			});
    		}
    	}

    }

    $('.escolhe-mesa').click(function() { 
        $("#etapa-mesas").slideUp();
        setTimeout(function(){ 
        	$("#etapa-pratos").slideDown(); 
        	$("#etapa-pratos").css('display','flex');
        }, 500);

        var mesa = $(this).data('id');
        $('#escolheMesa').val(mesa);

    });


	$('#validar-log-admin').validate({
		rules: {
			login: { required: true, minlength: 2 },
			senha: { required: true,  minlength: 6}
		},messages: {
			login: { required: 'Preencha o seu Login', minlength: 'No mínimo 2 letras'},
			senha: { required: 'Informe a sua senha',  minlength: 'Tamanho mínimo: 06 dígitos' }
		},submitHandler: function(form) {
			var dados = $(form).serialize();
			$.ajax({
				type: 'POST',
				url: document.location.origin + '/Front/php/admin/login.php',
				async: true,
				data: dados,
				success: function(data) {
					if(data == '1') {
						alert('sucesso! Redirecionando...');
						window.location.href ="admin.php"; 
					}else{
						alert('Acesso Negado');
					}
				}
			});
		}
	});

	$('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:10,
	    nav:true,
	    items:1

	});

	$('.owl-prev span').html('< Mesa Anterior');
	$('.owl-next span').html('Próxima Mesa >');

	
	$('#lanchonete-form').validate({
		rules: {
			fantasia: { required: true, minlength: 2 },
			cnpj: { required: true},
			email: { required: true},
			endereco: { required: true}

		},messages: {
			fantasia: { required: 'Preencha o seu Login', minlength: 'No mínimo 2 letras'},
			cnpj: { required:'Campo obrigatório'},
			email: { required: 'Campo obrigatório'},
			endereco: { required: 'Campo obrigatório'}
		},submitHandler: function(form) {
			var dados = $(form).serialize();
			$.ajax({
				type: 'POST',
				url: document.location.origin + '/Front/php/admin/atualiza-lanchonete.php',
				async: true,
				data: dados,
				success: function(data) {
					if(data == '1') {
						alert('Atualizado com Sucesso!');
						location.reload();
					}else{
						alert('Acesso Negado');
					}
				}
			});
		}
	});

	$('.seleciona-prato').click(function(e) {
		e.preventDefault();
		if( $(this).hasClass('desativado')){
			var seletor =  '#qtd-prato-' + $(this).data('id');
			var tag = '#seleciona-'+$(this).data('id');
			$(seletor).removeAttr("disabled");
			$(tag).slideDown();
			$(this).removeClass('desativado');
		}else{
			var seletor =  '#qtd-prato-' + $(this).data('id');
			var tag = '#seleciona-'+$(this).data('id');
			$(seletor).val('');
			$(seletor).attr("disabled","disabled");
			$(tag).slideUp();
			$(this).addClass('desativado');
		}
		

	});

	$('.retornar').click(function() {
		window.location.href ="https://lancheonnet.000webhostapp.com/Front/admin.php"; 
	});

	$('.atualizar').click(function() {
		if($('#formulario-edicao').hasClass('aberto')){
			$('#formulario-edicao').removeClass('aberto');
			$('#formulario-edicao').slideUp();
		}else{
			$('#formulario-edicao').addClass('aberto');
			$('#formulario-edicao').slideDown();
		}

	});

	$('.inserir').click(function() {
		if($('#formulario-insercao').hasClass('aberto')){
			$('#formulario-insercao').removeClass('aberto');
			$('#formulario-insercao').slideUp();
		}else{
			$('#formulario-insercao').addClass('aberto');
			$('#formulario-insercao').slideDown();
		}
	});

	$('.emBreve').click(function() {
		alert('[EM BREVE] - Conteúdo Indisponível no momento');
	});


});