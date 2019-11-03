<?php 

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:admin-login.php');
}

include('header-adm.php');
include('./../Back/chamadas.php');
$base = new Chamadas();
$users = $base->verificaUsuarios();

?>

<style> body{background-color: #93a6a8;} </style>
<section style="margin: 2%;">
	<hr style="border:white 2px solid;">
		<h1 style="text-align: center; color: white;"> GERENCIAR USUARIOS DO PAINEL </h1>
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
			        Usuario
			      </div>
			      <div class="cell">
			        Ativar/Desativar
			      </div>
			      <div class="cell atualizar">
			        Editar
			      </div>
			    </div>
			<?php foreach ($users as $user) { ?>
				
				<div class="row">
			      <div class="cell" >
			        <span id="<?php echo 'nome-'.$user['id'] ?>"><?php echo $user['nome']; ?></span>
			      </div>
			      <div class="cell" >
			        <span id="<?php echo 'login-'.$user['id'] ?>"><?php echo $user['login']; ?></span>
			      </div>
			      <div class="cell">
			      	<a href="#" class="desativarUsuario" data-id='<?php echo $user['id'];?>' data-ativo='<?php echo ($user['ativo']==1) ? 0 : 1;  ?>' >
			      		<?php echo ($user['ativo']==1) ? 'Desativar' : 'Ativar';  ?>
			      	</a>	        
			      </div>
			      <div class="cell">
			      	<a href="#" class="atualizar" data-id='<?php echo $user['id'];?>' > Editar </a>
			      </div>
			    </div>


			<?php } ?>
	    
			</div>

			<div style="margin: 0 auto;">
				<input class="yes-or-no-field">
					<button class="yes-button blur-hover btn-acao inserir" data-item="prato">Inserir</button>
					<button class="or-button rectangalize-hover btn-acao">ou</button>
					<button class="no-button blur-hover btn-acao retornar"> retornar</button>
				</input>
			</div>

		</div>
	</div>
</section>
<section id="formulario-edicao" style="display: none;">
	<div class="container">
		<div class="row">
			<form id="usuario-editar-form">
			  <div class="form-group">
			    <label for="nome" class="form-label">Nome</label>
			    <input type="text" class="form-control" id="nomeUsuario" name="nome" >
			  </div>
			  <div class="form-group" >
			    <label for="login" class="form-label">Login</label>
			    <input type="text" class="form-control" id="loginUsuario" name="login" >
			  </div>
			  <div class="form-group">
			    <label for="senha" class="form-label">Nova Senha</label>
			    <input type="password" class="form-control" id="senhaUsuario" name="senha" >
			  </div>
			  <input type="hidden" name="idUsuario" id='idUsuario' value="" >
			  <button type="button" class="blur-hover yes-button btn-acao submit" style="padding: 10px 25px;" id="alterarUsuario">Alterar</button>
			</form>
		</div>
	</div>
</section>
<section id="formulario-insercao" style="display: none;">
	<div class="container">
		<div class="row">
			<form id="usuario-inserir-form">
			  <div class="form-group">
			    <label for="nomeUsuario" class="form-label">Nome do Usuario</label>
			    <input type="text" class="form-control" id="usuarioNome" name="nomeUsuario">
			  </div>
			  <div class="form-group" >
			    <label for="loginUsuario" class="form-label">Login</label>
			    <input type="text" class="form-control" id="usuarioLogin" name="loginUsuario">
			  </div>
			  <div class="form-group">
			    <label for="senhaUsuario" class="form-label">Senha</label>
			    <input type="password" class="form-control" id="usuarioSenha" name="senhaUsuario">
			  </div>
			  <button type="button" class="blur-hover yes-button btn-acao submit" style="padding: 10px 25px;" id="cadastrarUsuario">Cadastrar</button>
			</form>
		</div>
	</div>
</section>
<section id="formulario-exclusao" style="display: none;">
	<input type="number" name="deluserId" id="deluserId" value="">
	<input type="hidden" id="deluserAtivo" name="deluserAtivo" value="">
</section>
<script>
	$('.atualizar').click(function() {
		id = $(this).data('id');
		nome = '#nome-' + id;
		login = '#login-' + id;
		$('#nomeUsuario').val($(nome).html());
		$('#loginUsuario').val($(login).html());
		$('#idUsuario').val(id);
	
	});

</script>