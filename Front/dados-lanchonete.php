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
			      <div class="cell" data-title="Name">
			        Roberta Novaes
			      </div>
			      <div class="cell" data-title="Age">
			        23
			      </div>
			      <div class="cell" data-title="Occupation">
			        Developer
			      </div>
			      <div class="cell" data-title="Location">
			        São Paulo, BR
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