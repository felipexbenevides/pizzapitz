<?php
    defined('__ROOT__') or define('__ROOT__', 'C:\wamp\www\pizzapitz');
    require_once (__ROOT__.'/global/appbar.php');
    require_once (__ROOT__.'/global/global.php');
    
    if(!isset($_SESSION['user_login'])){
        header("Location: ".$path."/view/login-view.php");
    }
    if(!isset($_SESSION['user_gerente'])){
        $gerente = 0;
    }else{
        $gerente = 1;
    }
    
            /*if(!<?php echo($_SESSION['user_gerente']); ?>){
                alert('');
                $( "#appbar_fun" ).addClass( "hide" );
            }*/    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel='shortcut icon' type='image/x-icon' href='../../favicon.ico' />

    <title>Home | PIZZA</title>

    <link href="../css/metro.css" rel="stylesheet">
    <link href="../css/metro-icons.css" rel="stylesheet">
    <link href="../css/metro-responsive.css" rel="stylesheet">
    <link href="../css/metro-responsive.css" rel="stylesheet">
    <link href="../css/metro-schemes.css" rel="stylesheet">
    <link href="../css/user.css" rel="stylesheet">
    
    <script src="../js/jquery-2.1.3.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>

    <script src="../js/metro.js"></script>

    <style>

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
    </style>

    <script>
        $( document ).ready(function() {
           GerenteAuth();
            console.log('TESTE');
        });
        function pushMessage(t){
            var mes = 'Info|Implement independently';
            $.Notify({
                caption: mes.split("|")[0],
                content: mes.split("|")[1],
                type: t
            });
        }

        $(function(){
            $('.sidebar').on('click', 'li', function(){
                if (!$(this).hasClass('active')) {
                    $('.sidebar li').removeClass('active');
                    $(this).addClass('active');
                }
            })
        })
        function GerenteAuth(){
            if(!<?php echo $gerente;?>){
                $("#appbar_fun").addClass("hide");
            }
        }

    </script>
</head>
<body class="bg-steel">
    <?php
        echo $appbar;
    ?>
    <div class="page-content">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
                <div class="cell bg-userRed size-x200" id="cell-sidebar" style="height: 100%">
                    <ul class="sidebar userRed">
                        <li><a href="#">
                            <span class="mif-apps icon"></span>
                            <span class="title">Mesas</span>
                            <span class="counter">0</span>
                        </a></li>
                        <li><a href="#">
                            <span class="mif-vpn-publ icon"></span>
                            <span class="title">Pedidos online</span>
                            <span class="counter">0</span>
                        </a></li>
                        <li><a href="#">
                            <span class="mif-cogs icon"></span>
                            <span class="title">Configurações</span>
                            <span class="counter">0</span>
                        </a></li>
                        
                    </ul>
                </div>
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Pedidos </h1>
                    <hr class="thin bg-grayLighter">
                    <button class="button primary" onclick="pushMessage('info')"><span class="mif-plus"></span> Criar</button>
                    <button class="button warning" onclick="pushMessage('warning')"><span class="mif-loop2"></span> Atualizar</button>
                    <hr class="thin bg-grayLighter">
                    <table class="dataTable border bordered" data-role="datatable" data-auto-width="false">
                        <thead>
                        <tr>
                            <td style="width: 20px">
                            </td>
                            <td class="sortable-column sort-asc" style="width: 100px">Mesa</td>
                            <td class="sortable-column">Cliente</td>
                            <td class="sortable-column">Detalhes</td>
                            <td class="sortable-column" style="width: 20px">Status</td>
                            <td style="width: 20px">Liberado</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <label class="input-control checkbox small-check no-margin">
                                    <input type="checkbox">
                                    <span class="check"></span>
                                </label>
                            </td>
                            <td>12</td>
                            <td>Maria</td>
                            <td><a href="http://virtuals.com/machines/123890723212">o</a></td>
                            <td class="align-center"><span class="mif-checkmark fg-green"></span></td>
                            <td>
                                <label class="switch-original">
                                    <input type="checkbox" checked>
                                    <span class="check"></span>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="input-control checkbox small-check no-margin">
                                    <input type="checkbox">
                                    <span class="check"></span>
                                </label>
                            </td>
                            <td>20</td>
                            <td>Ana</td>
                            <td><a href="http://virtuals.com/machines/123890723212">o</a></td>
                            <td class="align-center"><span class="mif-stop fg-red"></span></td>
                            <td>
                                <label class="switch-original">
                                    <input type="checkbox">
                                    <span class="check"></span>
                                </label>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>