<?php
    if(!isset($_SESSION)){
        session_start(); // Inicia a sessão
    }
        defined('__ROOT__') or define('__ROOT__', 'C:\wamp\www\pizzapitz');
        require_once (__ROOT__.'/global/appbar.php');
        require_once (__ROOT__.'/global/global.php');
        require_once (__ROOT__.'/global/includes.php');

    if(!isset($_SESSION['user_login'])){
        header("Location: ".$path."/view/login-view.php");
    }
    if(!isset($_SESSION['user_gerente'])){
        $gerente = 0;
    }else{
        $gerente = 1;
    }       
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

    <title>Cadastro de Funcionários | PIZZA</title>

     <?php 
        echo $metrocss;
        echo $metrojs;        
    ?>
    
    <link href="../css/user.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: blacksword;
            src: url('fonts/blacksword.otf');
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
    </style>

    <script>
        function GerenteAuth(){
            if(!<?php echo $gerente;?>){
                $("#btn-excluir").addClass("hide");
                $("#appbar_fun").addClass("hide");
                
            }
        }            
        function pushMessage(mes){
            $.Notify({
                caption: mes.split("|")[0],
                content: mes.split("|")[1],
                type: mes.split("|")[2]
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
    </script>
    
    <script>
        var tfuncionario;
        function showDialog(id){
            var dialog = $("#"+id).data('dialog');
            if (!dialog.element.data('opened')) {
                dialog.open();
            } else {
                dialog.close();
            }
        }
        function ListarTodos(){
            $.ajax({
              type: "post",
              url: <?php echo("'".$path.'/controller/listar.php'."'");?>,
              data: {'op':'listarfuncionarios'},
              success: function(data, status){
                console.log(JSON.parse(data));
                tfuncionario = $('#tfuncionario').DataTable( {
                    data: JSON.parse(data),
                    select: true
                } );                    
              }
            });
        }        
        $( document ).ready(function() {
            GerenteAuth(); 
            ListarTodos();

            $("#btn-excluir").click(function(){
            //EXCLUIR UM CLIENTE
                funcionario = (tfuncionario.rows({selected: true}).data())[0];
                console.log(funcionario);
                nome = funcionario[1];
                sobrenome = funcionario[2];
                pushMessage(nome+" "+sobrenome+"|Será excluido|warning");
                //console.log('info '+JSON.parse(pessoa));                
                $.ajax({
                  type: "post",
                  url: <?php echo("'".$path.'/controller/deletar.php'."'");?>,
                  data: {'type':'funcionario', 'CPF' : funcionario[0]},
                  success: function(data, status){
                      console.log('info '+data);
                    tfuncionario.destroy();                
                    ListarTodos();
                  }
                });                 

            });
        });
    </script>    
</head>
<body class="bg-steel">
      <div data-role="dialog" id="novoFun" class="padding20" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true">
            <h1>Novo Funcionário</h1>
            <p>
            <form method="post" action="<?php echo ($path.'/controller/inserir.php'); ?>">                
                <div class="cell">
                    <label>Nome</label>
                    <div class="input-control text full-size">
                        <input name='nome' type="text">
                    </div>
                </div> 
                <div class="cell">
                    <label>Sobrenome</label>
                    <div class="input-control text full-size">
                        <input name='sobrenome' type="text">
                    </div>
                </div>    
                <div class="cell">
                    <label>CPF</label>
                    <div class="input-control text full-size">
                        <input name='CPF' type="text">
                    </div>
                </div>     
                <div class="cell">
                    <label>Telefone</label>
                    <div class="input-control text full-size">
                        <input name='telefone' type="text">
                    </div>
                </div>               
                <span style="display:none">
                    <input name='type' value='funcionario'>
                </span>
            </p>
            <button type='submit' class="button success">Salvar</button>
            </form>
        </div>    
    <?php
        defined('__ROOT__') or define('__ROOT__', 'C:\wamp\www\pizzapitz');
        require_once (__ROOT__.'/global/appbar.php');
        require_once (__ROOT__.'/global/global.php');
        echo $appbar;
    ?>
    <div class="page-content">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
                <div class="cell bg-userRed size-x200" id="cell-sidebar" style="height: 100%">
                    <ul class="sidebar userRed">
                        <li><a href="#" onclick="showDialog('novoFun')">
                            <span class="mif-plus icon"></span>
                            <span class="title">Novo</span>
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
                    <h1 class="text-light">Cadastro de Funcionários </h1>
                    <hr class="thin bg-grayLighter">
                    <button id="btn-excluir" class="button warning" onclick="pushMessage('warning')"><span class="mif-cross"></span> Excluir</button>
                    <hr class="thin bg-grayLighter">
                    <table id="tfuncionario" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>CPF</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Tel.</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>CPF</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Tel.</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>