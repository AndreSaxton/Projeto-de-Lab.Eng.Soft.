<?php
class Cliente{
    private $identificador;
    private $nome;
    private $telefone;
    private $email;

    function fazerCadastro(string $nome, int $telefone, string $email){
        //salvar no BD
        //login e senha?
    }
    function verCardapio(){
        return $Prato;
    }
    function reservarMesa(int $idMesa){
        //criar Reserva
        $reserva = new Reserva(null, $hInicio, $hTermino, $this.$cliente, $mesa, $pratos, $pagamento);
        // diferente do diagrama
        // salvar Reserva no BD
    }
    function fazerPedido(){
        //escolher pratos da reserva
    }
    function pagarPedido(){
        //pagar reserva OPCIONAL, pode pagar na hora
    }

    function Cliente(int $id = null, string $n, float $tel, string $e){
        $this->identificador = $id;
        $this->nome = $n;
        $this->telefone = $tel;
        $this->email = $e;

        if($this->identificador == null){
            //fazerCadastro($nome, $telefone, $email);
        }
    }

    function getIdentificador(){
        return $identificador;
    }
    function setIdentificador(int $id){
        $identificador = $id;
    }
    function getNome(){
        return $nome;
    }
    function setNome(string $n){
        $nome = $n;
    }
    function getTelefone(){
        return $telefone;
    }
    function setTelefone(int $tel){
        $telefone = $tel;
    }
    function getEmail(){
        return $email;
    }
    function setEmail(string $e){
        $email = $e;
    }
}
class Reserva{
    private $identificador;
    private $horaInicio;
    private $horaTermino;
    private $cliente;
    private $mesa;
    private $pratos;
    private $pagamento;

    function reserva(int $id = null, dateTime $hInicio, dateTime $hTermino, Cliente $c, Mesa $m, Prato $p, dateTime $pgmt = null){
        $this->identificador = $id;
        $this->horaInicio = $hInicio;
        $this->horaTermino = $hTermino;
        $this->cliente = $c;
        $this->mesa = $m;
        $this->pratos = $p;
        $this->pagamento = $pgmt;
    }

    function getIdentificador(){
        return $identificador;
    }
    function setIdentificador(int $id){
        $identificador = $id;
    }
    function getHoraInicio(){
        return $horaInicio;
    }
    function setHoraInicio(time $hora){
        $horaInicio = $hora;
    }
    function getHoraTermino(){
        return $horaTermino;
    }
    function setHoraTermino(time $hora){
        $horaTermino = $hora;
    }
    function getCliente(){
        return $cliente;
    }
    function setCliente(Cliente $c){
        $cliente = $c;
    }
    function getMesa(){
        return $mesa;
    }
    function setMesa(Mesa $m){
        $mesa = $m;
    }
    function getPratos(){
        return $pratos;
        //array ou lista
    }
    function setPratos(array $p){
        $pratos = $p;
    }
    function getPagamento(){
        return $pagamento;
        //datetime
    }
    function setPagamento(datetime $pgmt){
        $pagamento = $pgmt;
    }
}
class Mesa{
    private $identificador;
    private $quantCadeira;

    function mesa(int $id, int $qtdCadeira){
        $this->identificador = $id;
        $this->quantCadeira = $qtdCadeira;
    }

    function getIdentificador(){
        return $identificador;
    }
    function setIdentificador(int $id){
        $identificador = $id;
    }
    function getQuantCadeira(){
        return $quantCadeira;
    }
    function setQuantCadeira(int $qtd){
       $quantCadeira = $qtd;
    }
}
class Lanchonete{
    private $nome = "Nome Lanchonete";
    private $email = "lanchonet@lanchonet.com.br";
    private $telefone = 12345678;

    function verListaCliente(){
        $listaClientes = "SELECT * FROM CLIENTE";
        return $listaClientes;
    }
    function adicionarPrato(string $nome, double $valor, string $descricao){
        //adicionar parametros no diagrama
        $prato = new Prato(null, $nome, $valor, $descricao);
        // salvar Prato no BD
    }
    function aplicarDesconto(Prato $prato, Promocao $promocao){
        //salvar promocao no BD, talvez criar tabela associativa
    }
    function prepararMesa(Mesa $mesa){}
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
        return $identificador;
    }
    function setIdentificador(int $id){
        $identificador = $id;
    }
    function getNome(){
        return $nome;
    }
    function setNome(string $n){
        $nome = $n;
    }
    function getValor(){
        return $valor;
    }
    function setValor(double $v){
        $valor = $v;
    }
    function getDescricao(){
        return $descricao;
    }
    function setDecricao(string $desc){
        $descricao = $desc;
    }
}
class Promocao{
    private $valor = 0;
    //no diagrama de classes esta Int
    private $hasPorcentagem = false;
    private $porcentagemDesconto = 0;
    private $prato;
    //nao ta no diagrama mas talvez seja melhor fazer assim, pra fazer a associação da promoção com o prato. ainda nao estou usando este atributo

    function getDesconto(){
        return $valor;
    }
    function setDesconto(double $valDesc){
        $hasPorcentagem = false;
        $porcentagemDesconto = 0;
        $valor = $valDesc;
    }
    function setDescontoPorcentagem(double $valPrato, double $perc){
        $hasPorcentagem = true;
        $porcentagemDesconto = $perc;
        $valor = $valPrato * $porcentagemDesconto;
        //25 = 50 * 0.5;
    }
}
?>