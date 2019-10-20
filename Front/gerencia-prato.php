<?php 
//verifica caso de usuário logado e se não tiver limpa as variaveis e o manda de volta ao login
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:admin-login.php');
}

include('header-adm.php');
 ?>
<style> body{background-color: #93a6a8;} </style>
<section style="margin: 2%;">
	<hr style="border:white 2px solid;">
		<h1 style="text-align: center; color: white;"> GERENCIAR PRATOS DA LANCHONETE </h1>
	<hr style="border:white 2px solid;">
</section>
<section>
	<div class="container">
		<div class="row">
			
			<div class="table tablePrato">
    
			    <div class="row header">
			      <div class="cell">
			        Código
			      </div>
			      <div class="cell">
			        Prato
			      </div>
			      <div class="cell">
			        Preço (R$)
			      </div>
			      <div class="cell" style="width: 40%;">
			        Descrição
			      </div>
			      <div class="cell">
			        Ativar/Desativar
			      </div>
			      <div class="cell atualizar">
			        Editar
			      </div>
			    </div>
			    <?php //aqui começa o foreach para gerar as linhas da tabela, tem um exemplo em 'dados-lanchonete.php"' ?>
	    
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
			<form id="pratos-editar-form">
			  <div class="form-group">
			    <label for="codigo" class="form-label">Código</label>
			    <input type="text" class="form-control" id="altpratoId" name="codigo" value="<?php //adicionar ?>" readonly>
			  </div>
			  <div class="form-group">
			    <label for="prato" class="form-label">Prato</label>
			    <input type="text" class="form-control" id="altpratoNome" name="prato" value="<?php //adicionar ?>">
			  </div>
			  <div class="form-group" >
			    <label for="preco" class="form-label">Preço</label>
			    <input type="email" class="form-control" id="altpratoValor" name="preco" value="<?php //adicionar ?>">
			  </div>
			  <div class="form-group">
			    <label for="descricao" class="form-label">Descrição</label>
			    <input type="text" class="form-control" id="altpratoDescricao" name="descricao" value="<?php //adicionar ?>">
			  </div>
			  <button type="button" class="blur-hover yes-button btn-acao submit" style="padding: 10px 25px;" id="alterarPrato">Submit</button>
			</form>
		</div>
	</div>
</section>
<section id="formulario-insercao" style="display: none;">
	<div class="container">
		<div class="row">
			<form id="pratos-inserir-form">
			  <div class="form-group">
			    <label for="prato" class="form-label">Prato</label>
			    <input type="text" class="form-control" id="pratoNome" name="prato">
			  </div>
			  <div class="form-group" >
			    <label for="preco" class="form-label">Preço</label>
			    <input type="email" class="form-control" id="pratoValor" name="preco">
			  </div>
			  <div class="form-group">
			    <label for="descricao" class="form-label">Descrição</label>
			    <input type="text" class="form-control" id="pratoDescricao" name="descricao">
			  </div>
			  <button type="button" class="blur-hover yes-button btn-acao submit" style="padding: 10px 25px;" id="cadastrarPrato">Submit</button>
			</form>
		</div>
	</div>
</section>
<section id="formulario-exclusao" style="display: none;">
	<input type="number" name="delpratoId" id="delpratoId">
</section>

