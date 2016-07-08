<?php
session_start();
if(isset($_SESSION)){
    session_destroy(); // Inicia a sessão
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

    <title>Login | PIZZA</title>

    <link href="../css/metro.css" rel="stylesheet">
    <link href="../css/metro-icons.css" rel="stylesheet">
    <link href="../css/metro-responsive.css" rel="stylesheet">
    <link href="../css/user.css" rel="stylesheet">


    <script src="../js/jquery-2.1.3.min.js"></script>
    <script src="../js/metro.js"></script>
 
    <style>
        .login-form {
            width: 25rem;
            height: 18.75rem;
            position: fixed;
            top: 50%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -12.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>

    <script>
       
        $(function(){
            var form = $(".login-form");

            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });
        $(document).ready(function(){
            $("body").css('display','');
            switch(getUrlVars()['err']){
                case '1' :
                    alert('Senha incorreta. Contate o Administrador');                    
                    break;
                case '2' : 
                    alert('Usuário não cadastrado. Contate o Administrador');                    
                    break;
                default:
            }
        });
    </script>    
</head>
<body class="bg-userRed" style="display: none">
    <div class="login-form padding20 block-shadow">
        <form method="POST" action="../controller/login.php">
            <h1 class="text-light titleLogin">Pizza</h1>
            <hr class="thin"/>
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="user_login">Login:</label>
                <input type="text" name="user_login" id="user_login">
                <button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <label for="user_password">Senha:</label>
                <input type="password" name="user_password" id="user_password">
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
            <br />
            <br />
            <div class="form-actions">
                <button type="submit" class="button primary">Entrar</button>
                <button type="button" class="button link">Cancelar</button>
            </div>
        </form>
    </div>
</body>
</html>