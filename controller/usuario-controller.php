<?php
defined('__ROOT__') or define('__ROOT__', 'C:\wamp\www\pizzapitz');
require_once(__ROOT__.'/model/usuario-model.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of usuario-controller
 *
 * @author Benevides
 */
class UsuarioController {
    //put your code here
   
    public function Check($CPF) {
        $usuario = new UsuarioModel();
        $pass = $usuario->Check($CPF);        
        if( isset($pass[0])){
            return $pass[0];
        }else{
            return 0;
        }        
    }
    public function CheckGerente($CPF) {
        $gerente = 0;
        $usuario = new UsuarioModel();
        $gerente = $usuario->CheckGerente($CPF);
        if($gerente[0]['gerente']){
            return $gerente[0]['gerente'];
        }else{
            return 0;
        }        
    }    
}
