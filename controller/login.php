<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('__ROOT__') or define('__ROOT__', 'C:\wamp\www\pizzapitz');
require_once (__ROOT__.'/controller/usuario-controller.php');
require_once (__ROOT__.'/global/global.php');


$form_login = (isset($_POST['user_login']) ? ($_POST['user_login']) : 0 );
$form_pass = (isset($_POST['user_password']) ? ($_POST['user_password']) : 0 );


$usuario = new UsuarioController();
$result = $usuario->Check($form_login);
//print_r($usuario->CheckGerente($form_login));
//echo $result['senha'].'<br><br><br>'.$result['nome']; 
if($result['senha'] == $form_pass){
    session_start(); // Inicia a sessão
    $_SESSION['user_login'] = $result['nome'];
    if ( ($usuario->CheckGerente($form_login)) ) {
        $_SESSION['user_gerente'] = 1;
    }
    header("Location: ".$path."/view/home-view.php");
}else{
    if($result['senha']){
        header("Location: ".$path."/view/login-view.php?err=1");
    }else{
        header("Location: ".$path."/view/login-view.php?err=2");
    }
}

