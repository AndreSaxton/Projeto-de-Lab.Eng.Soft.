<?php 
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:admin-login.php');
}
include('header-adm.php'); ?>
<style> body{background-color: #93a6a8;} </style>
<section id="area-blocos">
	<div class="container">
		<div class="row">
			<div align="center" class="fond">
				<div style="width:1000px;">

					<a href="http://localhost/Front/dados-lanchonete.php">
						<div class="box-item" style="background-color:#cb2025;">
							<img src="./Icones/garfo.png" class="img-responsive">
							<p class="text-bloco">Dados da <br> Lanchonete</p>
						</div>
					</a>
					<a href="https://www.devmedia.com.br/javascript-redirect-redirecionando-o-usuario-com-window-location/39809">
						<div class="box-item" style="background-color:#f8b334;">
							<img src="./Icones/usuarios.png" class="img-responsive">
							<p class="text-bloco">Gerenciar <br> Usuarios</p>
						</div>
					</a>
					<a href="http://localhost/Front/gerencia-prato.php">
						<div class="box-item" style="background-color:#97bf0d;">
							<img src="./Icones/pratos.png" class="img-responsive">
							<p class="text-bloco">Gerenciar <br> Pratos</p>
						</div>
					</a>				
					
					<hr>

					<a href="https://www.devmedia.com.br/javascript-redirect-redirecionando-o-usuario-com-window-location/39809">
						<div class="box-item" style="background-color:#97bf0d;">
							<img src="./Icones/cliente.png" class="img-responsive">
							<p class="text-bloco">Ver<br> Clientes</p>
						</div>
					</a>
					<a href="https://www.devmedia.com.br/javascript-redirect-redirecionando-o-usuario-com-window-location/39809">
						<div class="box-item" style="background-color:#cb2025;">
							<img src="./Icones/reserva.png" class="img-responsive">
							<p class="text-bloco">Gerenciar <br> Reservas</p>
						</div>
					</a>
					<a href="https://www.devmedia.com.br/javascript-redirect-redirecionando-o-usuario-com-window-location/39809">
						<div class="box-item" style="background-color:#f8b334;">
							<img src="./Icones/mesas.png" class="img-responsive">
							<p class="text-bloco">Gerenciar <br> Mesas</p>
						</div>
					</a>
					<hr>
  					<a href="https://www.devmedia.com.br/javascript-redirect-redirecionando-o-usuario-com-window-location/39809">
						<div class="box-item" style="background-color:#cb2025;">
							<img src="./Icones/promocao.png" class="img-responsive">
							<p class="text-bloco">Lançar <br> Promoção</p>
						</div>
					</a>
					<a href="https://www.devmedia.com.br/javascript-redirect-redirecionando-o-usuario-com-window-location/39809">
						<div class="box-item" style="background-color:#f8b334;">
							<img src="./Icones/sair.png" class="img-responsive">
							<p class="text-bloco">Sair <br> do Painel</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

</body>
</html>