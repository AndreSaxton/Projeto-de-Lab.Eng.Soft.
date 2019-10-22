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
$promos = $base->verListaPromocao();
?>

<style> body{background-color: #93a6a8;} </style>
<section style="margin: 2%;">
	<hr style="border:white 2px solid;">
		<h1 style="text-align: center; color: white;"> GERENCIAR PROMOÇÕES DISPONÍVEIS </h1>
	<hr style="border:white 2px solid;">
</section>
<section>
	<div class="container">
		<div class="row">
			
			<div class="table tableMesa">
    
			    <div class="row header">
			      <div class="cell">
			        Nome
			      </div>
			      <div class="cell" >
			        Descrição
			      </div>
			      <div class="cell">
			        Valor Off (R$)
			      </div>
			      <div class="cell">
			        Ativo
			      </div>
			      <div class="cell atualizar">
			        Editar
			      </div>
			    </div>
			<?php foreach ($promos as $promo) { ?>
				<div class="row">
			      <div class="cell" >
			        <span id="<?php echo 'promo-'.$promo['id'] ?>"><?php echo $promo['nome']; ?></span>
			      </div>
			      <div class="cell" >
			        <span id="<?php echo 'desc-'.$promo['id'] ?>"><?php echo $promo['descricao']; ?></span>
			      </div>
			      <div class="cell" >
			        R$ <span id="<?php echo 'valor-'.$promo['id'] ?>"><?php echo $promo['valor']; ?></span>
			      </div>
			      <div class="cell">
			      	<a href="#" class="desativarPromocao" data-id='<?php echo $promo['id'];?>' data-ativo='<?php echo ($promo['ativo']==1) ? 0 : 1;  ?>' >
			      		<?php echo ($promo['ativo']==1) ? 'Ativo' : 'Desativado';  ?>
			      	</a>	        
			      </div>
			      <div class="cell">
			      	<a href="#" class="atualizar" data-id='<?php echo $promo['id'];?>' > Editar </a>
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
			    <label for="nomePromo" class="form-label">Nome da Promoção</label>
			    <input type="text" class="form-control" id="nomePromo" name="nomePromo" >
			  </div>
			  <div class="form-group" >
			    <label for="valorPromo" class="form-label">Valor Off (R$ 00.00)</label>
			    <input type="text" class="form-control" id="valorPromo" name="valorPromo" >
			  </div>
			  <div class="form-group">
			    <label for="descPromo" class="form-label">Descrição da Promoção</label>
			    <textarea class="form-control" id="descPromo" name="descPromo" rows="3"></textarea>
			    <!-- <input type="text" class="form-control" id="descMesa" name="descMesa" > -->
			  </div>
			  <input type="hidden" name="idPromo" id='idPromo' value="" >
			  <button type="button" class="blur-hover yes-button btn-acao submit" style="padding: 10px 25px;" id="alterarPromocao">Alterar</button> 
			</form>
		</div>
	</div>
</section>
<section id="formulario-insercao" style="display: none;">
	<div class="container">
		<div class="row">
			<form id="usuario-inserir-form">
			  <div class="form-group">
			    <label for="promoNome" class="form-label">Nome da Promoção</label>
			    <input type="text" class="form-control" id="promoNome" name="promoNome">
			  </div>
			  <div class="form-group" >
			    <label for="promoValor" class="form-label">Valor Off (R$ 00.00)</label>
			    <input type="text" class="form-control" id="promoValor" name="promoValor">
			  </div>
			  <div class="form-group">
			    <label for="promoDesc" class="form-label">Descrição da Promoção</label>
			    <textarea class="form-control" id="promoDesc" name="promoDesc" rows="3"></textarea>
			  </div>
			  <button type="button" class="blur-hover yes-button btn-acao submit" style="padding: 10px 25px;" id="cadastrarPromocao">Cadastrar</button>
			</form>
		</div>
	</div>
</section>
<section id="formulario-exclusao" style="display: none;">
	<input type="number" name="delpromoId" id="delpromoId" value="">
	<input type="hidden" id="delpromoAtivo" name="delpromoAtivo" value="">
</section>
<script>
	$('.atualizar').click(function() {
		id = $(this).data('id');
		promo = '#promo-' + id;
		desc = '#desc-' + id;
		valor = '#valor-' + id;
		$('#nomePromo').val($(promo).html());
		$('#descPromo').val($(desc).html());
		$('#valorPromo').val($(valor).html());
		$('#idPromo').val(id);
	
	});

</script>

