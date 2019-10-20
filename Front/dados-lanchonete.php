<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:admin-login.php');
}
include('header-adm.php');
include('./php/admin/requisicao-lanchonte.php');  ?>
<style> body{background-color: #93a6a8;} </style>
<section style="margin: 2%;">
	<hr style="border:white 2px solid;">
		<h1 style="text-align: center; color: white;"> GERENCIAR DADOS DA LANCHONETE </h1>
	<hr style="border:white 2px solid;">
</section>
<section>
	<div class="container">
		<div class="row">
			
			<div class="table">
    
			    <div class="row header">
			      <div class="cell">
			        Nome Fantasia
			      </div>
			      <div class="cell">
			        CNPJ
			      </div>
			      <div class="cell">
			        E-mail
			      </div>
			      <div class="cell">
			        Endereço
			      </div>
			    </div>
  					<div class="row">
				      <div class="cell" data-title="fantasia">
				        <?php echo $lanchonete['nm_lanchonete']; ?>
				      </div>
				      <div class="cell" data-title="cnpj">
				        <?php echo $lanchonete['cd_cnpj_lanchonete']; ?>
				      </div>
				      <div class="cell" data-title="email">
				        <?php echo $lanchonete['nm_email_lanchonete']; ?>
				      </div>
				      <div class="cell" data-title="endereco">
				        <?php echo $lanchonete['nm_endereco_lanchonete']; ?>
				      </div>
				    </div>
		    
			 </div>
			<div style="margin: 0 auto;">
				<input class="yes-or-no-field">
					<button class="yes-button blur-hover btn-acao atualizar" data-item="lanchonete">Atualizar</button>
					<button class="or-button rectangalize-hover btn-acao">ou</button>
					<button class="no-button blur-hover btn-acao retornar"> Retornar</button>
				</input>
			</div>

		</div>
	</div>
</section>
<section id="formulario-edicao" style="display: none;">
	<div class="container">
		<div class="row">
			<form id="lanchonete-form">
			  <div class="form-group">
			    <label for="fantasia" class="form-label">Nome Fantasia</label>
			    <input type="text" class="form-control" id="fantasia" name="fantasia" value="<?php echo $lanchonete['nm_lanchonete'] ?>">
			  </div>
			  <div class="form-group">
			    <label for="cnpj" class="form-label">CNPJ</label>
			    <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo $lanchonete['cd_cnpj_lanchonete'] ?>">
			  </div>
			  <div class="form-group" >
			    <label for="email" class="form-label">E-mail</label>
			    <input type="email" class="form-control" id="email" name="email" value="<?php echo $lanchonete['nm_email_lanchonete'] ?>">
			  </div>
			  <div class="form-group">
			    <label for="endereco" class="form-label">Endereço Completo</label>
			    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $lanchonete['nm_endereco_lanchonete'] ?>">
			  </div>
			  <button type="submit" class="blur-hover yes-button btn-acao submit" style="padding: 10px 25px;">Submit</button>
			</form>
		</div>
	</div>
</section>