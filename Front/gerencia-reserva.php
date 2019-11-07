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
$reservas = $base->verificaReservas();
//var_dump($reservas);

?>
<style> body{background-color: #93a6a8;} </style>
<section style="margin: 2%;">
	<hr style="border:white 2px solid;">
		<h1 style="text-align: center; color: white;"> GERENCIAR RESERVAS REALIZADAS  </h1>
	<hr style="border:white 2px solid;">
</section>
<section>
	<div class="container">
		<div class="row">
			
			<div class="table tableUsuario">
    
			    <div class="row header">
			      <div class="cell">
			        Cliente
			      </div>
			      <div class="cell">
			        Data Reserva
			      </div>
			      <div class="cell">
			        Mesa Solicitada
			      </div>
			      <div class="cell ">
			        Avisar Atraso!
			      </div>
			      <div class="cell ">
			        Atendido
			      </div>
			      <div class="cell ">
			        Ver Pratos
			      </div>
			    </div>
			<?php foreach ($reservas as $reserva) { ?>
				
				<div class="row">
			      <div class="cell" >
			        <span><?php echo $reserva['cliente']; ?></span>
			      </div>
			      <div class="cell" >
			        <span ><?php echo $reserva['data']; ?></span>
			      </div>
			       <div class="cell" >
			        <span ><?php echo $reserva['mesa']; ?></span>
			      </div>
			      <div class="cell">
			      	<a href="#" class="avisaUsuario" data-id='<?php echo $reserva['id'];?>'>
			      		Avisar Atraso!
			      	</a>	        
			      </div>
			      <div class="cell">
			      	<a href="#" class="atendido" data-id='<?php echo $reserva['id'];?>' > Atendido </a>
			      </div>
			      <div class="cell">
			      	<a href="#" class="verPratos" data-verificador='<?php echo $reserva['id'];?>' > Ver Pratos </a>
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
<div class="modal"  id="modalPratos" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #ea6153!important;">
        <h5 class="modal-title">Pratos Solicitados pelo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<script>
	$('.atendido').click(function() {
		id = $(this).data('id');
		var urlAtendido = "../Back/atendido.php";
		$.ajax({
                method: "POST",
                url: urlAtendido,
                data: {id: id},
                success: function(response){
                    console.table(response);
                    location.reload();
                }
            })
            .fail(function (response){
                console.log(response);
            })	
	});

</script>