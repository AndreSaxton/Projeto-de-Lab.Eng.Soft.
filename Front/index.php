<?php include('header.php'); ?>
<script>
    $( document ).ready(function() {
        alert('Olá! Seja bem vindo! \n\n No momento estamos trabalhando na área do Cliente.\n É nela onde o Cliente final (Consumidor da Lanchonete) poderá interagir com todos os itens cadastrados pelo painel administrativo. \n\n Vou te redirecionar para o Painel de Controle para poder verificar as configurações e assim poder modificá-las. \n\nLembre-se: Em caso de dúvida de Login e Senha, cheque a documentação do projeto, lá você vai encontrar suas credênciais. ');
        window.location.href ="http://localhost/Front/admin.php"; 
    });
</script>
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
                            <input type="text" name="login" id="login" class="input-login">
                            <br>
                            <label for="senha" class="lbl-login">Senha</label><br>
                            <input type="password" name="senha" id="senha" class="input-login"><br>
                            <input type="submit" name="logar" id="entrar" value="ENTRAR">
                            <a href="#" >NOVO MEMBRO</a>
                        </form>
                        
                    </div>
                </div>
            </article>
                
            
        </div>
    </div>
</section>
</body>

</html>