<?php
defined('__ROOT__') or define('__ROOT__', 'C:\wamp\www\pizzapitz');
require_once(__ROOT__.'/model/cliente-model.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ClienteController {

    function __construct() {
        
    }
    
    public function Listar(){
        $cliente = new ClienteModel();
        $lista = $cliente->Listar();
        $json = array();
        foreach ($lista as $key => $value) {
            array_push($json, array_values($value));
        }        
        
        return $json;
    }
    public function Inserir($CPF,$nome,$sobrenome,$telefone,$CEP,$numero) {
        $cliente = new ClienteModel();
        return $cliente->Inserir($CPF, $nome, $sobrenome, $telefone, $CEP, $numero);  
    }
    public function Deletar($CPF){
        $cliente = new ClienteModel();
        return $cliente->Deletar($CPF);
        
    }

}