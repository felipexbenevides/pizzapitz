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


    <title>Cadastro de Clientes | PIZZA</title>
    
    <?php 
        echo $cabecalho;
        echo $metrocss;
        echo $metrojs;   
        echo $csslocal;
        echo $jslocal;
        
    ?>
    <link href="../css/user.css" rel="stylesheet">


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
    </script>
    <script>
        var tcliente;
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
              data: {'op':'listarclientes'},
              success: function(data, status){
                console.log(JSON.parse(data));
                tcliente = $('#tcliente').DataTable( {
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
                pessoa = (tcliente.rows({selected: true}).data())[0];
                console.log(pessoa);
                nome = pessoa[1];
                sobrenome = pessoa[2];
                pushMessage(nome+" "+sobrenome+"|Será excluido|warning");
                //console.log('info '+JSON.parse(pessoa));                
                $.ajax({
                  type: "post",
                  url: <?php echo("'".$path.'/controller/deletar.php'."'");?>,
                  data: {'type':'cliente', 'CPF' : pessoa[0]},
                  success: function(data, status){
                    tcliente.destroy();                
                    ListarTodos();
                  }
                });                 

            });
            
            //LISTAR TODOS OS CLIENTES         
           
    
        });

        
        
    </script>    
</head>
<body class="bg-steel">
      <div data-role="dialog" id="novoCli" class="padding20" data-close-button="true" data-overlay="true" data-overlay-color="op-dark" data-overlay-click-close="true">
            <h1>Novo Cliente</h1>
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
                    <label>CEP</label>
                    <div class="input-control text full-size">
                        <input name='CEP' type="text">
                    </div>
                </div>        
                <div class="cell">
                    <label>Nº</label>
                    <div class="input-control text full-size">
                        <input name='numero' type="text">
                    </div>
                </div>                 
                <div class="cell">
                    <label>Telefone</label>
                    <div class="input-control text full-size">
                        <input name='telefone' type="text">
                    </div>
                </div>
                <span style="display:none">
                    <input name='type' value='cliente'>
                </span>
            </p>
            <button type='submit' class="button success">Salvar</button>
            </form>
        </div>    
    <?php
        echo $appbar;
    ?>
    <div class="page-content">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
                <div class="cell bg-userRed size-x200" id="cell-sidebar" style="height: 100%">
                    <ul class="sidebar userRed">
                        <li><a href="#" onclick="showDialog('novoCli')">
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
                    <h1 class="text-light">Cadastro de Cliente </h1>
                    <hr class="thin bg-grayLighter">
                    <button id="btn-excluir" class="button warning" ><span class="mif-cross"></span> Excluir</button>
                    <hr class="thin bg-grayLighter">
                    <table id="tcliente" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>CPF</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Tel.</th>
                                <th>CEP</th>
                                <th>Num.</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>CPF</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Tel.</th>
                                <th>CEP</th>
                                <th>Num.</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>