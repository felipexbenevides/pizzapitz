<?php
defined('__ROOT__') or define('__ROOT__', 'C:\wamp\www\pizzapitz');
require_once(__ROOT__.'/global/global.php');
require_once(__ROOT__.'/controller/usuario-controller.php');
require_once(__ROOT__.'/controller/cliente-controller.php');
require_once(__ROOT__.'/controller/funcionario-controller.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST)){
    switch ($_POST['type']) {
        case 'cliente':
            $cliente = new ClienteController();
            $result = ($cliente->Deletar($_POST['CPF']));
            echo $result;
            break;
        case 'funcionario':
            $funcionario = new FuncionarioController();
            $result = ($funcionario->Deletar($_POST['CPF']));
            echo $result;
            break;            
        default:
            break;
    }
}




