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
include('./../Back/chamadas.php');
$base = new Chamadas();
$pratos = $base->verificaPratos();
//var_dump($pratos);
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
			    <?php foreach ($pratos as $prato) { ?>
				<div class="row">
			      <div class="cell" >
			        <span id="<?php echo 'codigo-'.$prato['id_prato'] ?>"><?php echo $prato['id_prato']; ?></span>
			      </div>
			      <div class="cell" >
			        <span id="<?php echo 'prato-'.$prato['id_prato'] ?>"><?php echo $prato['nm_prato']; ?></span>
			      </div>
			      <div class="cell" >
			        <span id="<?php echo 'valor-'.$prato['id_prato'] ?>"><?php echo $prato['vl_prato']; ?></span>
			      </div>
			      <div class="cell" >
			        <span id="<?php echo 'desc-'.$prato['id_prato'] ?>"><?php echo $prato['ds_prato']; ?></span>
			      </div>
			      <div class="cell">
			      	<a href="#" class="desativarPrato" data-id='<?php echo $prato['id_prato'];?>' data-ativo='<?php echo ($prato['ativo']==1) ? 0 : 1;  ?>' >
			      		<?php echo ($prato['ativo']==1) ? 'Desativar' : 'Ativar';  ?>
			      	</a>	        
			      </div>
			      <div class="cell">
			      	<a href="#" class="atualizar" data-id='<?php echo $prato['id_prato'];?>' > Editar </a>
			      </div>
			    </div>
				


			<?php } ?>
	    
			</div>
	    
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
			    <label for="codigoPrato" class="form-label">Código</label>
			    <input type="text" class="form-control" id="codigoPrato" name="codigoPrato" value="<?php //adicionar ?>" readonly>
			  </div>
			  <div class="form-group">
			    <label for="nomePrato" class="form-label">Prato</label>
			    <input type="text" class="form-control" id="nomePrato" name="nomePrato" value="<?php //adicionar ?>">
			  </div>
			  <div class="form-group" >
			    <label for="valorPrato" class="form-label">Preço</label>
			    <input type="email" class="form-control" id="valorPrato" name="valorPrato" value="<?php //adicionar ?>">
			  </div>
			  <div class="form-group">
			    <label for="descPrato" class="form-label">Descrição</label>
			    <input type="text" class="form-control" id="descPrato" name="descPrato" value="<?php //adicionar ?>">
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
	<input type="hidden" name="delpratoId" id="delpratoId">
	<input type="hidden" name="delpratoAtivo" id="delpratoAtivo">
</section>
<script>
	$('.atualizar').click(function() {
		id = $(this).data('id');
		nome = '#prato-' + id;
		valor = '#valor-' + id;
		desc = '#desc-' + id;
		$('#codigoPrato').val(id);
		$('#nomePrato').val($(nome).html());
		$('#valorPrato').val($(valor).html());
		$('#descPrato').val($(desc).html());
	
	});

</script>
