<?php
session_start();

require_once '../genericos/init.php';

require '../genericos/check.php';

// pega o ID da URL
$id_usr = isset($_POST['id_usr']) ? (int) $_POST['id_usr'] : null;

// valida o ID
if (empty($id_usr)) {
    echo "ID para alteração não definido";
    exit;
}

// busca os dados do usuário a ser editado
$PDO = db_connect();
$sql = "SELECT login, nome, senha FROM usuario WHERE id_usr = :id_usr";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_usr', $id_usr, PDO::PARAM_INT);

$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user)) {
    echo "Nenhum usuário encontrado";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>My Library</title>

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

                            <form action="../classesPhp/edit.php" method="post">

                                <label for="login">Login: </label>
                                <br>
                                <input type="text" name="login" id="login" value="<?php echo $user['login'] ?>" class="form-control" placeholder="login" autofocus>

                                <label for="nome">Nome: </label>
                                <br>
                                <input type="text" name="nome" id="nome" value="<?php echo $user['nome'] ?>" class="form-control" placeholder="nome">

                                <label for="senha">Senha: </label>
                                <br>
                                <input type="password" name="senha" id="senha" value="" placeholder="senha" name="senha" class="form-control">

                                <br>

                                <input type="hidden" name="id_usr" value="<?php echo $id_usr ?>">


                                <input type="submit" value="Alterar" class="btn btn-outline btn-success btn-lg btn-block">
                                <br>
                            </form>
                            <form action="../classesPhp/delete.php" method="post">
                                <input type="hidden" name="id_usr" value="<?php echo $id_usr ?>">
                                <input type="submit" value="Exluir conta" onclick="return confirm('Tem certeza de que deseja excluir sua conta E TODAS AS INFORMAÇÕES CONTIDAS NELA?');" class="btn btn-outline btn-danger btn-lg btn-block">
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