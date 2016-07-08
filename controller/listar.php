<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('__ROOT__') or define('__ROOT__', 'C:\wamp\www\pizzapitz');
require_once(__ROOT__.'/controller/usuario-controller.php');
require_once(__ROOT__.'/controller/cliente-controller.php');
require_once(__ROOT__.'/controller/funcionario-controller.php');

//$usuario = new UsuarioController();
//print_r($usuario->Check('01101101100'));
$cliente = new ClienteController();
$funcionario = new FuncionarioController();
if(isset($_POST['op'])){
    $op = $_POST['op'];
    switch ($op) {
        case 'listarclientes':
            $lista = $cliente->Listar();
            print_r(json_encode($lista));
            break;
        case 'listarfuncionarios':
            $lista = $funcionario->Listar();
            print_r(json_encode($lista));
            break;
        default:
            break;
    }
        
}
