<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle - Lanche On net</title>
	<script src="jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>    
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<section class="fundo"></section>
<section id="logar">
	<div class="container">
		<div class="row">
			<div class="col-md-auto">
				<div id="area-formulário">
					<div id="login-button">
					  <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
					  </img>
					</div>
					<form id="validar-log-admin">
						<label class="lbl-login transl-17px">Login</label><br>
						<input type="text" name="login" class="input-login-adm"> <br>
						<label class="lbl-login transl-17px">Senha</label><br>
						<input type="password" name="senha" class="input-login-adm">
						<br>
						<input type="submit" name="entrar" id="btn-login">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
</body>
</html>