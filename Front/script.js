$( document ).ready(function() {

    $('#lanche-login').click(function() {
        $("#etapa-escolha-login").slideUp();
        setTimeout(function(){ 
        	$("#etapa-realiza-login").slideDown(); 
        	$("#etapa-realiza-login").css('display','flex');
        	$("#container-acao").css('background-image','url(Icones/background_etapas_genericas.png)').fadeIn();
        }, 500);
    });

    $('#form-login').validate({
		rules: {
			login: { required: true, minlength: 2 },
			senha: { required: true,  minlength: 6}
		},messages: {
			login: { required: 'Preencha o seu Login', minlength: 'No mínimo 2 letras'},
			senha: { required: 'Informe a sua senha',  minlength: 'Tamanho mínimo: 06 dígitos' }
		},submitHandler: function(form) {
			alert('mandou');
			return false;
		}
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