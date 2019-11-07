<?php 
include('header.php'); 
include('./../Back/chamadas.php');
$base = new Chamadas();
$mesas = $base->verListaMesa();
$pratos = $base->verificaPratos();
var_dump($pratos);
?>


<section style="background-color: gray; height: 200px;">
</section>
<section id="chamada">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <img src="Icones/imagem_galera.png" class="img-responsive img-w100">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <h1 class="titulo-chamada">Nós e a Sua Galera</h1>
                <h2 class="subtitulo-chamada">Contra o chá de cadeira</h2>
                <p class="text-chamada">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>
</section>
<section id="container-acao" style="min-height: 570px;">
    <div class="container">
        <div class="row">
            <article id="etapa-escolha-login" style="display: flex;">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 area-logins">
                    <div id="bloco-texto">
                        <h1>Vamos Começar?</h1>
                        <button type="button" name="" id="google-login" class="btn btn-primary btn-log">Logar com a Google</button>
                        <h5>Ou</h5>
                        <button type="button" name="" id="lanche-login" class="btn btn-danger btn-log">Conta Lanche On Net</button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <img src="Icones/cadeira_estilizada.png" class="img-responsive img-w100" style="margin-top: 5%;">
                </div>
            </article>
            <article id="etapa-realiza-login" style="display: none; width: 100%;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="bloco-login">
                        <form id="form-login">
                            <label for="login" class="lbl-login">Login</label><br>
                            <input type="text" name="loginCliente" id="loginCliente" class="input-login">
                            <br>
                            <label for="senha" class="lbl-login">Senha</label><br>
                            <input type="password" name="senhaCliente" id="senhaCliente" class="input-login"><br>
                            <input type="submit" name="logar" id="entrar" value="ENTRAR">
                            <a href="#" id="novo-membro" >NOVO MEMBRO</a>
                        </form>
                        
                    </div>
                </div>
            </article>
            <article id="etapa-realiza-cadastro" style="display: none; width: 100%;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="bloco-cadastro">
                        <form id="form-cadastro">
                            <label for="nome" class="lbl-login">Nome</label><br>
                            <input type="text" name="nome" id="clienteNome" class="input-login">
                            <br>
                            <label for="email" class="lbl-login">E-mail</label><br>
                            <input type="email" name="email" id="clienteEmail" class="input-login">
                            <br>
                            <label for="contato" class="lbl-login">Tel. de contato</label><br>
                            <input type="text" name="contato" id="clienteContato" class="input-login">
                            <br>
                            <label for="login" class="lbl-login">Login</label><br>
                            <input type="login" name="login" id="clienteLogin" class="input-login">
                            <br>
                            <label for="senha" class="lbl-login">Senha</label><br>
                            <input type="password" name="senha" id="clienteSenha" class="input-login">
                            <br>
                            <input type="submit" name="cadastrar" id="cadastrar" value="Concluir e Logar">
                        </form>
                        
                    </div>
                </div>
            </article>
            <article id="etapa-pessoas" style="display: none; width: 100%;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="area-pessoas">
                        
                        <p>Uma mesa para</p>
                        <h2>QUANTOS?</h2>
                        <input type="number" name="pessoas" id="pessoas" min="1" max="6">
                        <label>Pessoas</label>
                        <br>
                        <button id="btn-pessoas">Próxima Etapa</button>
                    </div>
                </div>
            </article>               
            <article id="etapa-mesas" style="display: none; width: 100%;">
                <div class="owl-carousel owl-theme">
                    <?php foreach ($mesas as $mesa) { ?>
                        <div class="item">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 fl-lft">
                                <img src="Icones/mesa.png" class="img-responsive img-w100" style="margin-top: 5%;">
                                <p class="placa-mesa">Mesa <?php echo $mesa['numero'] ?></p>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 fl-lft ">
                                <p class="titulo-mesa">Informações <br><b> da mesa</b></p>
                                <p class="descricao-mesa"> <?php echo $mesa['descricao'] ?></p>
                                <button class="escolhe-mesa" data-id="<?php echo $mesa['id'] ?>">ESCOLHER</button>
                            </div>
                        </div>
                    <?php } ?>                    
                    <input type="hidden" name="escolheMesa" id="escolheMesa">
                </div>
            </article>
            <article id="etapa-pratos" style="display: none; width: 100%;">
                <div class="container" style="margin: 5%;">
                    <div class="row">
                        <?php $count = 0; ?>
                        <?php foreach ($pratos as $prato) { 
                            $count++;
                        ?>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 fl-lft item-prato">
                           <p class="nome-prato"><?php echo $prato['nm_prato']; ?></p>
                            <div class="decorativa">
                                <img src="Icones/prato-icon.png" class="img-responsive chef">
                            </div>
                           <p class="descricao-prato"><?php echo $prato['ds_prato']; ?></p> 
                           <p class="preco-prato">
                            <a href="#" class="seleciona-prato desativado" id="ver-prato-<?php echo $prato['id_prato'] ?>" data-id="<?php echo $prato['id_prato'] ?>"> R$ <?php echo $prato['vl_prato'] ?></a>
                            </p>
                           <label for="qtd-prato"> Quantidade: </label>
                           <input type="number" class="input-prato" min='1' name="qtd-prato-<?php echo $prato['id_prato'] ?>" id="qtd-prato-<?php echo $prato['id_prato'] ?>" disabled>
                           <div class="label-selecionado" id="seleciona-<?php echo $prato['id_prato'] ?>" style="display: none;">
                               <hr>
                               <p>Selecionado</p>
                               <hr>

                           </div>
                        </div>   
                    <?php } ?>                          
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button id="escolhe-prato">ESCOLHER</button>
                            <input type="hidden" name="qtdPrato" id='qtdPrato' value="<?php echo $count; ?>">
                        </div>
                        
                    </div>
                </div>
                    

            </article>
            <article id="etapa-final" style="display: none; width: 100%;">
                <p class="thanks">Muito Obrigado! <br>
                Estamos preparando sua mesa e Aguardando por você!</p>
            </article>

        </div>
    </div>
</section>
</body>

</html>


