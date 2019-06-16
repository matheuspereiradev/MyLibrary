<?php
session_start();

require_once '../genericos/init.php';

require '../genericos/check.php';

//saber se existem livros e amigos
$verifica = true;

$PDO = db_connect();
$id_usr = $_SESSION['id_usr'];

$sqllista = "SELECT * FROM livro where Usuario_id_usr = :id_usr AND statusEmprestimo=0 ORDER BY nome ASC";
$stmtlista = $PDO->prepare($sqllista);
$stmtlista->bindParam(':id_usr', $id_usr);
$stmtlista->execute();

//CONTAR TODOS
$sql_counta_total = "SELECT COUNT(*) AS total FROM livro WHERE Usuario_id_usr= :id_usr ORDER BY nome ASC ";
$stmt_counta_total = $PDO->prepare($sql_counta_total);
$stmt_counta_total->bindParam(':id_usr', $id_usr);
$stmt_counta_total->execute();
$total = $stmt_counta_total->fetchColumn();


//amigo

$sqlamigo = "SELECT * FROM amigo where Usuario_id_usr = :id_usr ORDER BY nome ASC";
$stmtamigo = $PDO->prepare($sqlamigo);
$stmtamigo->bindParam(':id_usr', $id_usr);
$stmtamigo->execute();

$sql_counta_amigo = "SELECT COUNT(*) AS total FROM amigo WHERE Usuario_id_usr= :id_usr ORDER BY nome ASC ";
$stmt_counta_amigo = $PDO->prepare($sql_counta_amigo);
$stmt_counta_amigo->bindParam(':id_usr', $id_usr);
$stmt_counta_amigo->execute();
$totalamigo = $stmt_counta_amigo->fetchColumn();
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

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="home.php">My Library</a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">


                        <!-- /.MENU SUPERIOR -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"></i> Conta <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
<li>
                                    <form action="form-edit.php" method="post" id="config">
                                        <input type="hidden" name="id_usr" value="<?php echo $_SESSION['id_usr'] ?>">
                                        <center><a href="#" style="text-decoration:none" onClick="document.getElementById('config').submit();"><i class="fa fa-cog"></i> Configurações</a></center>
                                    </form>
                                </li>
                                <li class="divider"></li>
                                <li><a href="../classesPhp/logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->

                        <!--FIM MENU SUPERIOR-->
                    </ul>
                </div>
            </nav>
            <!-- /.navbar-header -->          
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="margin-top: 0">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="home.php"><i class="fa fa-home"></i> Home</a>
                        </li>
                        <li>
                            <a href="form-listarlivro.php"><i class="fa fa-book"></i> Meus Livros</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-quote-left"></i> Emprestimos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="form-emprestimo.php">Emprestar</a>
                                </li>
                                <li>
                                    <a href="form-devolucao.php">Devolução</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="form-listaramigo.php"><i class="fa fa-group"></i> Amigos</a>
                        </li>
                        <li>
                            <a href="form-mudarstatus.php"><i class="fa fa-bookmark"></i> Status de leitura</a>
                        </li>



                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!--conteudo-->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Realizar empréstimo</h1>

                        <form action="../classesPhp/emprestar.php" method="post">

                            <?php if ($total > 0): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Selecione o livro
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Nome</th>
                                                    <th>Autor</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php while ($livro = $stmtlista->fetch(PDO::FETCH_ASSOC)): ?>
                                                    <tr class="even gradeC">

                                                        <td>
                                                <center><input type="radio" name="livro" id="<?php echo $livro['idLivro'] ?>" value="<?php echo $livro['idLivro'] ?>"></center>
                                                </td>
                                                <td><?php echo $livro['nome'] ?></td>
                                                <td><?php echo $livro['autor'] ?></td>

                                                </tr>
                                            <?php endwhile; ?>

                                            </tbody>
                                        </table></div></div>
                            <?php else: ?>
                                <?php $verifica = false; ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Selecione o livro
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <center><p>Você ainda não adicionou nenhum livro à sua biblioteca</p>
                                            <a href="form-add-livro.php" style="text-decoration:none"><button type="button" class="btn btn-success btn-lg" ><span class="fa fa-plus-circle"></span> Adicionar novo livro</button></a> </center>
                                    </div></div>


                            <?php endif; ?>

                            <!--amigo-->
                            <?php if ($totalamigo > 0): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Selecione o amigo
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-amigo">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Nome</th>
                                                    <th>Telefone</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php while ($amigo = $stmtamigo->fetch(PDO::FETCH_ASSOC)): ?>
                                                    <tr class="even gradeC">
                                                        <td>
                                                <center><input type="radio" name="amigo" id="<?php echo $amigo['idAmigo'] ?>" value="<?php echo $amigo['idAmigo'] ?>"></center>
                                                </td>
                                                <td><?php echo $amigo['nome'] ?></td>

                                                <td><?php if ($amigo['telefone'] == 0) {
                                                        echo "Não cadastrado";
                                                    } else {
                                                        echo $amigo['telefone'];
                                                    } ?></td>
                                                </tr>
                                <?php endwhile; ?>

                                            </tbody>
                                        </table></div></div>
<?php else: ?>
    <?php $verifica = false; ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Selecione o amigo
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">

                                        <center><p>Você ainda não adicionou nenhum amigo</p>
                                            <a href="form-add-amigo.php" style="text-decoration:none"><button type="button" class="btn btn-success btn-lg" ><span class="fa fa-plus-circle"></span> Adicionar novo amigo</button></a>
                                        </center>
                                    </div></div>


                            <?php endif; ?>
                            <!--fim amigo-->

                            <?php if ($verifica): ?>
                                <input type="hidden" name="Usuario_id_usr" value="<?php echo $id_usr; ?>">
                                <center><input type="submit" value="Realizar empréstimo" class="btn btn-primary btn-lg"></center>
                                <br>
<?php else: ?>
                                <center><input type="submit" value="Realizar empréstimo" class="btn btn-primary btn-lg" disabled></center><br>
<?php endif; ?>
                        </form>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        <!-- jQuery -->
        <script src="<?php echo ('../front/vendor/jquery/jquery.min.js'); ?>"></script>


        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo ('../front/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo ('../front/vendor/metisMenu/metisMenu.min.js'); ?>"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo ('../front/dist/js/sb-admin-2.js'); ?>"></script>

        <!-- DataTables JavaScript -->
        <script src="<?php echo ('../front/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo ('../front/vendor/datatables-plugins/dataTables.bootstrap.min.js'); ?>"></script>
        <script src="<?php echo ('../front/vendor/datatables-responsive/dataTables.responsive.js'); ?>"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo ('../front/dist/js/sb-admin-2.js'); ?>"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
    $(document).ready(function() {
    $('#dataTables-example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
            //responsive: true
        }
    } );
} );
    
</script>
<script>
    $(document).ready(function() {
    $('#dataTables-amigo').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
            //responsive: true
        }
    } );
} );
    
</script>
</body>

</html>


