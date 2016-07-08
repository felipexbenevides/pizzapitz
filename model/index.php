<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php
          require_once 'cliente-model.php';
          require_once 'funcionario-model.php';
          require_once 'usuario-model.php';
          
          $cliente = new ClienteModel();
          $funcionario = new FuncionarioModel();
          $usuario = new UsuarioModel();
          
          //$cliente->Inserir('07270579402', 'Mateus', 'Nunes', '87991259826', '56280000','150');
          //$funcionario->Inserir('01101101101','Gercilio','Martins','8738731174');
          //$usuario->Inserir('01101101101','gercilio','123');          
          
          print_r($cliente->Listar());
          echo '<br><br><br><br>';
          
          print_r($funcionario->Listar());
          echo '<br><br><br><br>';
          
          print_r($usuario->Listar());
          echo '<br><br><br><br>';

          ?>
    
    </body>
</html>
