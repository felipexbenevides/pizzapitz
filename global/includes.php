<?php
$cabecalho = '    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico" />';


$metrocss = '<link href="../css/metro.css" rel="stylesheet">
             <link href="../css/metro-icons.css" rel="stylesheet">
             <link href="../css/metro-responsive.css" rel="stylesheet">
             <link href="../css/metro-schemes.css" rel="stylesheet">';
    
$metrojs = '<script src="../js/jquery-2.1.3.min.js"></script>
            <script src="../js/jquery.dataTables.min.js"></script>
            <script src="../js/metro.js"></script>
            <script type="text/javascript" src="../datatables/datatables.min.js"></script>';

$csslocal = '    <style>
        @font-face {
            font-family: blacksword;
            src: url("../fonts/blacksword.otf");
        }
        .branding{
            font-family: blacksword;
            font-size: 40px !important;
            width:200px;
            text-align:center;
        }
        html, body {
            height: 100%;
        }
        body {
        }
        .page-content {
            padding-top: 3.125rem;
            min-height: 100%;
            height: 100%;
        }
        .table .input-control.checkbox {
            line-height: 1;
            min-height: 0;
            height: auto;
        }

        @media screen and (max-width: 800px){
            #cell-sidebar {
                flex-basis: 52px;
            }
            #cell-content {
                flex-basis: calc(100% - 52px);
            }
        }
    </style>';

$jslocal = '   <script>
        $(function(){
            $(".sidebar").on("click", "li", function(){
                if (!$(this).hasClass("active"")) {
                    $(".sidebar li").removeClass("active");
                    $(this).addClass("active");
                }
            });
        });
    </script>';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

