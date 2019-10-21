<?php session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:admin-login.php');
}

include('header-adm.php');
include('./../Back/chamadas.php');
$base = new Chamadas();
$clientes = $base->verificaClientes();
?>

<style> body{background-color: #93a6a8;} </style>
<section style="margin: 2%;">
	<hr style="border:white 2px solid;">
		<h1 style="text-align: center; color: white;"> GERENCIAR USUARIOS DO PAINEL </h1>
		<p id="info-detalhes">*Esse módulo é para apenas leitura uma vez que as informações dos usuários só podem ser editadas pelo próprio</p>
	<hr style="border:white 2px solid;">
</section>
<section>
	<div class="container">
		<div class="row">
			
			<div class="table tableUsuario">
    
			    <div class="row header">
			      <div class="cell">
			        Nome
			      </div>
			      <div class="cell">
			        E-mail
			      </div>
			      <div class="cell">
			        Telefone
			      </div>
			    </div>
			<?php foreach ($clientes as $cliente) { ?>
				
				<div class="row">
			      <div class="cell" >
			        <span ><?php echo $cliente['nome']; ?></span>
			      </div>
			      <div class="cell" >
			        <span><?php echo $cliente['email']; ?></span>
			      </div>
			      <div class="cell" >
			        <span><?php echo $cliente['telefone']; ?></span>
			      </div>
			    </div>

			<?php } ?>
	    
			</div>

			<div style="margin: 0 auto;">
				<input class="yes-or-no-field">
					<button class="yes-button blur-hover btn-acao inserir" disabled data-item="prato">Inserir</button>
					<button class="or-button rectangalize-hover btn-acao">ou</button>
					<button class="no-button blur-hover btn-acao retornar"> retornar</button>
				</input>
			</div>

		</div>
	</div>
</section>