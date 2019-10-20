<?php
require_once('conexao.php');

class Cliente{
    private $identificador;
    private $nome;
    private $telefone;
    private $email;

    function fazerCadastro(string $nome, float $telefone, string $email){
        //salvar no BD
        //login e senha?;
        $conexao = new Conexao();
        $conexao->insertNewCliente($nome, $telefone, $email);
    }
    function alterarCadastro(int $identificador, string $nome, float $telefone, string $email){
        $conexao = new Conexao();
        $conexao->updateCliente($identificador, $nome, $telefone, $email);
    }
    function desativarCadastro(int $identificador){
        $conexao = new Conexao();
        $conexao->deleteCliente($identificador);
    }
    function verCardapio(){
        $conexao = new Conexao();
        $prato = $conexao->selectAllPrato();
        return $prato;
    }
    function reservarMesa(Reserva $reserva){
        //criar Reserva
        // $reserva = new Reserva(null, $hInicio, $hTermino, $this.$cliente, $mesa, $pratos, $pagamento);

        // diferente do diagrama
        // salvar Reserva no BD
        print_r($reserva);
        $conexao = new Conexao();
        $conexao->insertNewReserva(
            $reserva->getHoraInicio(),
            $reserva->getHoraTermino(),
            $reserva->getPagamento(),
            $reserva->getCliente()->getIdentificador(),
            $reserva->getMesa()->getIdentificador(),
            $reserva->getPratos()
        );
    }
    function desativarReserva(int $identificador){
        $conexao = new Conexao();
        $conexao->deleteReserva($identificador);
    }
    function fazerPedido(int $idReserva, int $idPrato){
        //escolher pratos da reserva
        $conexao = new Conexao();
        $conexao->insertNewRefeicao($idReserva, $idPrato);
    }
    function pagarPedido(){
        //pagar reserva OPCIONAL, pode pagar na hora
    }

    function Cliente(int $id = null, string $n = null, float $tel = null, string $e = null){
        $this->identificador = $id;
        $this->nome = $n;
        $this->telefone = $tel;
        $this->email = $e;
    }

    function getIdentificador(){
        return $this->identificador;
    }
    function setIdentificador(int $id){
        $this->identificador = $id;
    }
    function getNome(){
        return $this->nome;
    }
    function setNome(string $n){
        $this->nome = $n;
    }
    function getTelefone(){
        return $this->telefone;
    }
    function setTelefone(int $tel){
        $this->telefone = $tel;
    }
    function getEmail(){
        return $this->email;
    }
    function setEmail(string $e){
        $this->email = $e;
    }
}
class Usuario{
    private $nome;
    private $usuario;
    private $senha;

    function prato(int $id = null, string $n, string $log, string $desc){
        $this->identificador = $id;
        $this->nome = $n;
        $this->usuario = $log;
        $this->senha = $senha;
    }

    function verUsuarios(){
        $conexao = new Conexao();
        $user = $conexao->selectAllUsuario();
        return $user;
    }

    function adicionarUsuario(string $nome, string $login, string $senha){
        $conexao = new Conexao();
        $user = $conexao->insertNewUser($nome, $login, $senha);
    }
}
class Reserva{
    private $identificador;
    private $horaInicio;
    private $horaTermino;
    private $cliente;
    private $mesa;
    private $pratos = array();
    private $pagamento;

    function reserva(int $id = null, dateTime $hInicio, dateTime $hTermino, Cliente $c, Mesa $m, array $p, dateTime $pgmt = null){
        $this->identificador = $id;
        $this->horaInicio = $hInicio;
        $this->horaTermino = $hTermino;
        $this->cliente = $c;
        $this->mesa = $m;
        $this->pratos = $p;
        $this->pagamento = $pgmt;
    }

    function getIdentificador(){
        return $this->identificador;
    }
    function setIdentificador(int $id){
        $this->identificador = $id;
    }
    function getHoraInicio(){
        return $this->horaInicio;
    }
    function setHoraInicio(time $hora){
        $this->horaInicio = $hora;
    }
    function getHoraTermino(){
        return $this->horaTermino;
    }
    function setHoraTermino(time $hora){
        $this->horaTermino = $hora;
    }
    function getCliente(){
        return $this->cliente;
    }
    function setCliente(Cliente $c){
        $this->cliente = $c;
    }
    function getMesa(){
        return $this->mesa;
    }
    function setMesa(Mesa $m){
        $this->mesa = $m;
    }
    function getPratos(){
        return $this->pratos;
        //array ou lista
    }
    function setPratos(array $p){
        $this->pratos = $p;
    }
    function getPagamento(){
        return $this->pagamento;
        //datetime
    }
    function setPagamento(datetime $pgmt){
        $this->pagamento = $pgmt;
    }
}
class Mesa{
    private $identificador;
    private $quantCadeira;

    function mesa(int $id = null, int $qtdCadeira){
        $this->identificador = $id;
        $this->quantCadeira = $qtdCadeira;
    }

    function getIdentificador(){
        return $this->identificador;
    }
    function setIdentificador(int $id){
        $this->identificador = $id;
    }
    function getQuantCadeira(){
        return $this->quantCadeira;
    }
    function setQuantCadeira(int $qtd){
       $this->quantCadeira = $qtd;
    }
}
class Lanchonete{
    private $nome = "Nome Lanchonete";
    private $email = "lanchonet@lanchonet.com.br";
    private $telefone = 12345678;

    function verListaCliente(){
        $conexao = new Conexao();
        $clientes = $conexao->selectAllCliente();
        return $clientes;
    }
    function adicionarPrato(string $nome, float $valor, string $descricao){
        //adicionar parametros no diagrama
        // $prato = new Prato(null, $nome, $valor, $descricao);
        // salvar Prato no BD
        $conexao = new Conexao();
        $conexao->insertNewPrato($nome, $valor, $descricao);
    }
    function alterarPrato(int $identificador, string $nome, float $valor, string $descricao){
        $conexao = new Conexao();
        $conexao->updatePrato($identificador, $nome, $valor, $descricao);
    }
    function desativarPrato(int $identificador){
        $conexao = new Conexao();
        $conexao->deletePrato($identificador);
    }
    function aplicarDesconto(Promocao $promocao){
        //salvar promocao no BD, talvez criar tabela associativa
        $conexao = new Conexao();
        
        $conexao->insertNewPromocao($promocao->getValor(), $promocao->getPorcentagemDesconto(), $promocao->getPrato()->getIdentificador());
    }
    function alterarDesconto(Promocao $promocao){
        //salvar promocao no BD, talvez criar tabela associativa
        $conexao = new Conexao();
        
        $conexao->updatePromocao($promocao->getIdentificador(), $promocao->getValor(), $promocao->getPorcentagemDesconto(), $promocao->getPrato()->getIdentificador());
    }
    function desativarDesconto(int $identificador){
        $conexao = new Conexao();
        
        $conexao->deletePromocao($identificador);
    }
    function prepararMesa(Mesa $mesa){
        $conexao = new Conexao();
        
        $conexao->insertNewMesa($mesa->getQuantCadeira());
    }
    function alterarMesa(Mesa $mesa){
        $conexao = new Conexao();
        
        $conexao->updateMesa($mesa->getIdentificador(), $mesa->getQuantCadeira());
    }
    function desativarMesa(Mesa $mesa){
        $conexao = new Conexao();
        
        $conexao->deleteMesa($mesa->getIdentificador());
    }
    function verListaMesa(){
        $conexao = new Conexao();
        
        $mesas = $conexao->selectAllMesa();
        return $mesas;
    }
    function verListaPromocao(){
        $conexao = new Conexao();
        
        $promocoes = $conexao->selectAllPromocao();
        return $promocoes;
    }
    function verListaReserva(){
        $conexao = new Conexao();
        
        $reserva = $conexao->selectAllReserva();
        return $reserva;
    }
    function verListaRefeicaoDeReserva(int $idReserva){
        $conexao = new Conexao();
        
        $refeicoes = $conexao->selectAllRefeicaoOfReserva($idReserva);
        return $refeicoes;
    }
    function divulgar(){
        // mandar email pros clientes,
    }
}
class Prato{
    private $identificador;
    private $nome;
    private $valor;
    private $descricao;

    function prato(int $id = null, string $n, float $val, string $desc){
        $this->identificador = $id;
        $this->nome = $n;
        $this->valor = $val;
        $this->descricao = $desc;
    }

    function getIdentificador(){
        return $this->identificador;
    }
    function setIdentificador(int $id){
        $this->identificador = $id;
    }
    function getNome(){
        return $this->nome;
    }
    function setNome(string $n){
        $this->nome = $n;
    }
    function getValor(){
        return $this->valor;
    }
    function setValor(double $v){
        $this->valor = $v;
    }
    function getDescricao(){
        return $this->descricao;
    }
    function setDecricao(string $desc){
        $this->descricao = $desc;
    }
}
class Promocao{
    private $identificador;
    private $valor = 0;
    //no diagrama de classes esta Int
    private $hasPorcentagem = false;
    private $porcentagemDesconto = 0;
    private $prato;
    //nao ta no diagrama mas talvez seja melhor fazer assim, pra fazer a associação da promoção com o prato. ainda nao estou usando este atributo

    function setIdentificador(int $identificador){
        $this->identificador = $identificador;
    }
    function getIdentificador(){
        return $this->identificador;
    }
    function getDesconto(){
        return $this->valor;
    }
    function setDesconto(Prato $prato, float $valDesc){
        $this->prato = $prato;

        $this->hasPorcentagem = false;
        $this->porcentagemDesconto = 0;
        $this->valor = $valDesc;
    }
    function setDescontoPorcentagem(Prato $prato, float $perc){
        $this->prato = $prato;

        $this->hasPorcentagem = true;
        $this->porcentagemDesconto = $perc;
        $this->valor = $this->prato->getValor() * ($this->porcentagemDesconto / 100);
        // echo $this->valor;
        //25 = 50 * 0.5;
    }

    function getPorcentagemDesconto(){
        return $this->porcentagemDesconto;
    }
    function getValor(){
        return $this->valor;
    }
    function getPrato(){
        return $this->prato;
    }
}
?>