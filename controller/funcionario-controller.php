<?php
defined('__ROOT__') or define('__ROOT__', 'C:\wamp\www\pizzapitz');
require_once(__ROOT__.'/model/funcionario-model.php');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FuncionarioController {

    function __construct() {
        
    }
    
    public function Listar(){
        $funcionario = new FuncionarioModel();
        $lista = $funcionario->Listar();
        $json = array();
        foreach ($lista as $key => $value) {
            array_push($json, array_values($value));
        }        
        
        return $json;
    }
    public function Inserir($CPF,$nome,$sobrenome,$telefone) {
        $funcionario = new FuncionarioModel();
        return $funcionario->Inserir($CPF,$nome,$sobrenome,$telefone);
    }
    public function Deletar($CPF){
        $funcionario = new FuncionarioModel();
        return $funcionario->Deletar($CPF);
        
    }    
}