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
$mesas = $base->verListaMesa();

?>

<style> body{background-color: #93a6a8;} </style>
<section style="margin: 2%;">
	<hr style="border:white 2px solid;">
		<h1 style="text-align: center; color: white;"> GERENCIAR MESAS DISPONÍVEIS </h1>
	<hr style="border:white 2px solid;">
</section>
<section>
	<div class="container">
		<div class="row">
			
			<div class="table tableMesa">
    
			    <div class="row header">
			      <div class="cell">
			        Número
			      </div>
			      <div class="cell" style="width: 120px;">
			        Nº cadeiras
			      </div>
			      <div class="cell">
			        Descrição
			      </div>
			      <div class="cell">
			        Disponibilidade
			      </div>
			      <div class="cell atualizar">
			        Editar
			      </div>
			    </div>
			<?php foreach ($mesas as $mesa) { ?>
				<div class="row">
			      <div class="cell" >
			        <span id="<?php echo 'numero-'.$mesa['id'] ?>"><?php echo $mesa['numero']; ?></span>
			      </div>
			      <div class="cell" >
			        <span id="<?php echo 'cadeira-'.$mesa['id'] ?>"><?php echo $mesa['cadeira']; ?></span>
			      </div>
			      <div class="cell" >
			        <span id="<?php echo 'desc-'.$mesa['id'] ?>"><?php echo $mesa['descricao']; ?></span>
			      </div>
			      <div class="cell">
			      	<a href="#" class="desativarMesa" data-id='<?php echo $mesa['id'];?>' data-ativo='<?php echo ($mesa['disponibilidade']==1) ? 0 : 1;  ?>' >
			      		<?php echo ($mesa['disponibilidade']==1) ? 'Disponivel' : 'Indisponivel';  ?>
			      	</a>	        
			      </div>
			      <div class="cell">
			      	<a href="#" class="atualizar" data-id='<?php echo $mesa['id'];?>' > Editar </a>
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
			    <label for="numeroMesa" class="form-label">Numero da Mesa</label>
			    <input type="text" class="form-control" id="numeroMesa" name="numeroMesa" >
			  </div>
			  <div class="form-group" >
			    <label for="cadeiraMesa" class="form-label">Numero de Cadeiras</label>
			    <input type="text" class="form-control" id="cadeiraMesa" name="cadeiraMesa" >
			  </div>
			  <div class="form-group">
			    <label for="descMesa" class="form-label">Descrição da mesa</label>
			    <textarea class="form-control" id="descMesa" name="descMesa" rows="3"></textarea>
			    <!-- <input type="text" class="form-control" id="descMesa" name="descMesa" > -->
			  </div>
			  <input type="hidden" name="idMesa" id='idMesa' value="" >
			  <button type="button" class="blur-hover yes-button btn-acao submit" style="padding: 10px 25px;" id="alterarMesa">Alterar</button>
			</form>
		</div>
	</div>
</section>
<section id="formulario-insercao" style="display: none;">
	<div class="container">
		<div class="row">
			<form id="usuario-inserir-form">
			  <div class="form-group">
			    <label for="mesaNumero" class="form-label">Numero da Mesa</label>
			    <input type="text" class="form-control" id="mesaNumero" name="mesaNumero">
			  </div>
			  <div class="form-group" >
			    <label for="mesaCadeira" class="form-label">Numero de cadeiras</label>
			    <input type="text" class="form-control" id="mesaCadeira" name="mesaCadeira">
			  </div>
			  <div class="form-group">
			    <label for="mesaDesc" class="form-label">Descrição da mesa</label>
			    <textarea class="form-control" id="mesaDesc" name="mesaDesc" rows="3"></textarea>
			  </div>
			  <button type="button" class="blur-hover yes-button btn-acao submit" style="padding: 10px 25px;" id="cadastrarMesa">Cadastrar</button>
			</form>
		</div>
	</div>
</section>
<section id="formulario-exclusao" style="display: none;">
	<input type="number" name="delmesaId" id="delmesaId" value="">
	<input type="hidden" id="delmesaAtivo" name="delmesaAtivo" value="">
</section>
<script>
	$('.atualizar').click(function() {
		id = $(this).data('id');
		numero = '#numero-' + id;
		cadeira = '#cadeira-' + id;
		desc = '#desc-' + id;
		$('#numeroMesa').val($(numero).html());
		$('#cadeiraMesa').val($(cadeira).html());
		$('#descMesa').val($(desc).html());
		$('#idMesa').val(id);
	
	});

</script>

