<?php
    if(!isset($_SESSION)){
        session_start(); // Inicia a sessão

    }
    if(!isset($_SESSION['user_login'])){
        $user_login = '-';
    }else{
        $user_login = $_SESSION['user_login'];
    }

    defined('__ROOT__') or define('__ROOT__', 'C:\wamp\www\pizzapitz');
    require_once (__ROOT__.'/global/global.php');

$appbar = '<div class="app-bar fixed-top darcula" data-role="appbar">
        <a class="app-bar-element branding">Pizza</a>
        <span class="app-bar-divider"></span>
        <ul class="app-bar-menu">
            <li><a href="'.$path.'/view/home-view.php'.'">Resumo</a></li>
            <li>
                <a href="" class="dropdown-toggle">Cadastro</a>
                <ul class="d-menu" data-role="dropdown">
                    <li id="appbar_cli"><a href="'.$path.'/view/cliente-view.php'.'">Cliente</a></li>
                    <li id="appbar_fun"><a href="'.$path.'/view/funcionario-view.php'.'">Funcionário</a></li>

                    <!-- <li class="divider"></li>
                    <li>
                        <a href="" class="dropdown-toggle">Reopen</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="">Project 1</a></li>
                            <li><a href="">Project 2</a></li>
                            <li><a href="">Project 3</a></li>
                            <li class="divider"></li>
                            <li><a href="">Clear list</a></li>
                        </ul>
                    </li> -->
                </ul>
            </li>
            <li><a href="'.$path.'/view/pedido-view.php'.'">Pedidos</a></li>

        </ul>

        <div class="app-bar-element place-right">
            <span class="dropdown-toggle"><span class="mif-cog"></span>'.$user_login.'</span>
            <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow " data-role="dropdown" data-no-close="true" style="width: 200px">
                <ul class="unstyled-list fg-dark">
                    <li><a href="'.$path.'/view/login-view.php'.'" class="fg-white3 fg-hover-yellow">Exit</a></li>
                </ul>
            </div>
        </div>
    </div>';