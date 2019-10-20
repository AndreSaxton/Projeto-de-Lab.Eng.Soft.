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

});