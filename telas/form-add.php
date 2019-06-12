<?php
session_start();

require_once '../genericos/init.php';

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Cadastre-se</title>

        <!-- Bootstrap Core CSS /vendor/bootstrap/css/bootstrap.min.css"-->
        <link href="../front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS ./vendor/metisMenu/metisMenu.min.css -->
        <link href="../front/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS /dist/css/sb-admin-2.css-->
        <link href="../front/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts  ../vendor/font-awesome/css/font-awesome.min.css -->
        <link href="../front/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">My Library</h3>

                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title" align="center">Cadastre-se:</h3>

                        </div>
                        <div class="panel-body">

                            <form action="../classesPhp/add.php" method="post">
                                <label for="login">Login: (NAO DEVE CONTER ESPAÇOS) </label>
                                <br>
                                <input type="text" pattern="[^' ']+" name="login" id="login" class="form-control" placeholder="login" autofocus required>

                                <label for="nome">Nome: </label>
                                <br>
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="nome" required>

                                <label for="senha">Senha: </label>
                                <br>
                                <input type="password" name="senha" id="senha" class="form-control" placeholder="senha" name="senha" required>
                                <br><br>
                                <input type="submit" value="Cadastrar" class="btn btn-outline btn-success btn-lg btn-block">
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="../front/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../front/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../front/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../front/dist/js/sb-admin-2.js"></script>

    </body>

</html>