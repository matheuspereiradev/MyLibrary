<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>My Library</title>

        <!-- Bootstrap Core CSS ../vendor/bootstrap/css/bootstrap.min.css -->
        <link href="front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS ../vendor/metisMenu/metisMenu.min.css-->
        <link href="front/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS ./dist/css/sb-admin-2.css-->
        <link href="front/dist/css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href=".front/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style media="screen">
            body{
                background-color: #D9D9F3;
            }
            footer{
                background-color: #FFF;
                height: 150px;
                text-align: center;
                padding: 58px;
                border: 1px solid #CCC;
            }
            .navbar{
                background-color: #FFF;
                border-radius: 0px;
                border: 1px solid #CCC;
                width: 100%;
                position: fixed;
            }
            .container1{
                padding: 105px;
                width: 99%;
                text-align: center;
            }
            .sobre{
                margin: 100px;
                padding: 50px;
            }
            .contato{
                margin: 100px;
                padding: 50px;
                text-align: center;
            }
            .equipe{
                margin: 100px;
                padding: 50px;
            }
            a:link, a:visited, a:active{
                color: gray;
            }
            a:hover{
                color: black;
                font-size: 105%;
                text-decoration: none;
                transition: 0.5s;
            }
            .navbar-header a:hover{
                background-color: Gainsboro;
                color: black;
                font-size: 140%;
                text-decoration: none;
                transition: 0.5s;
            }
        </style>
    </head>
    <body>
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">My Library</a>
                    <a class="navbar-brand" href="#sobre">Sobre</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Cadastrar-se</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

                </ul>
            </div>
        </nav>

        <div class="container1">
            <div class="row">
                <center><img src="src/img.png" width="350px" height="350px"></center>
                <h1>Bem vindo ao MyLibrary</h1>
            </div>
            <div class="sobre" id="sobre">
                <h1>Sobre</h1>
                <img src="src/img02.jpg" alt="Anatole France">
                <h5>Se você conhece algum <strong>Anatole France</strong>, é do MyLibrary que você precisa...</h5>
                <h3>O que é?</h3>
                <h4>o Projeto MyLibrary é uma sistema de gerenciamento de bibliotecas pessoais, ontem você poderá controlar com quem estão seus livros e como anda sua leitura.</h4>
                <h3>Como podemos lhe ajudar?</h3>
                <h4>Cadastre seus livros e nós te ajudaremos dividindo-os de acordo com o status de leitura, gerencie quais amigos estão com seus livros emprestados e mais...</h4>
                <h4><a href="#">Cadastre-se e conheça o sistema.</a></h4>
            </div>

        </div>
        <footer>
            <div class="cpr">
                <h4>Copyright © Todos os direitos reservados, Projeto MyLibrary 219</h4>
            </div>
        </footer>
        <!-- jQuery vendor/jquery/jquery.min.js -->
        <script src="front/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="front/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="front/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="front/dist/js/sb-admin-2.js"></script>

    </body>

</html>
