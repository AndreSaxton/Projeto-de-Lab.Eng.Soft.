<?php 
Class Chamadas{

    function verificaPratos(){
        require_once('classes.php');
        $cliente = new Cliente();
        $pratos = $cliente->verCardapio();

        return $pratos;
       
    }

    function verificaUsuarios(){
        require_once('classes.php');
        $user = new Usuario();
        $usuarios = $user->verUsuarios();

        return $usuarios;
       
    }

    function verificaClientes(){
        require_once('classes.php');
        $lanchonete = new Lanchonete();
        $clientes = $lanchonete->verListaCliente();

        return $clientes;
       
    }
    
}    

?>