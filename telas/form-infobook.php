<?php
session_start();

require_once '../genericos/init.php';

require '../genericos/check.php';

$PDO = db_connect();
$id_usr = $_SESSION['id_usr'];


//lvro
//contar nao lidos
$sql_counta_livros_nlidos = "SELECT COUNT(*) AS nlidos FROM livro WHERE statusLeitura=1 AND Usuario_id_usr= :id_usr ORDER BY nome ASC ";
$stmt_count_nlidos = $PDO->prepare($sql_counta_livros_nlidos);
$stmt_count_nlidos->bindParam(':id_usr', $id_usr);
$stmt_count_nlidos->execute();
$totalnlidos = $stmt_count_nlidos->fetchColumn();

//contar lidos
$sql_counta_livros_lidos = "SELECT COUNT(*) AS lidos FROM livro WHERE statusLeitura=3 AND Usuario_id_usr= :id_usr ORDER BY nome ASC ";
$stmt_count_lidos = $PDO->prepare($sql_counta_livros_lidos);
$stmt_count_lidos->bindParam(':id_usr', $id_usr);
$stmt_count_lidos->execute();
$totallidos = $stmt_count_lidos->fetchColumn();

//contar lendo
$sql_counta_livros_lendo = "SELECT COUNT(*) AS lendo FROM livro WHERE statusLeitura=2 AND Usuario_id_usr= :id_usr ORDER BY nome ASC ";
$stmt_count_lendo = $PDO->prepare($sql_counta_livros_lendo);
$stmt_count_lendo->bindParam(':id_usr', $id_usr);
$stmt_count_lendo->execute();
$totallendo = $stmt_count_lendo->fetchColumn();

//select*

$sqllistalidos = "SELECT * FROM livro where Usuario_id_usr = :id_usr AND statusLeitura=3 ORDER BY nome ASC";
$stmtlistalidos = $PDO->prepare($sqllistalidos);
$stmtlistalidos->bindParam(':id_usr', $id_usr);
$stmtlistalidos->execute();

$sqllistalendo = "SELECT * FROM livro where Usuario_id_usr = :id_usr AND statusLeitura=2 ORDER BY nome ASC";
$stmtlistalendo = $PDO->prepare($sqllistalendo);
$stmtlistalendo->bindParam(':id_usr', $id_usr);
$stmtlistalendo->execute();

$sqllistanaolidos = "SELECT * FROM livro where Usuario_id_usr = :id_usr AND statusLeitura=1 ORDER BY nome ASC";
$stmtlistanaolidos = $PDO->prepare($sqllistanaolidos);
$stmtlistanaolidos->bindParam(':id_usr', $id_usr);
$stmtlistanaolidos->execute();
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

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sua biblioteca</h1>
                        <!--conteudo-->

                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#lidos" data-toggle="tab">Lidos</a>
                                </li>
                                <li><a href="#lendo" data-toggle="tab">Lendo</a>
                                </li>
                                <li><a href="#nlidos" data-toggle="tab">Não lidos</a>
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="lidos">
                                    <h4>LIDOS</h4>
<?php if ($totallidos > 0): ?>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-lido">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Autor</th>
                                                    <th>Data de cadastro</th>
                                                    <th>Status de emprestimo</th>
                                                    <th>statusLeitura</th>
                                                </tr>
                                            </thead>
                                            <tbody>

    <?php while ($livrolido = $stmtlistalidos->fetch(PDO::FETCH_ASSOC)): ?>
                                                    <tr class="even gradeC">
                                                        <td><?php echo $livrolido['nome'] ?></td>
                                                        <td><?php echo $livrolido['autor'] ?></td>
                                                        <td><?php echo dateConvert($livrolido['data']); ?></td>
                                                        <td><?php
                                            if ($livrolido['statusEmprestimo'] == 0) {
                                                echo "Não emprestado";
                                            } else {
                                                echo "Emprestado";
                                            }
        ?></td>
                                                        <!--STATUS DE LEITURA DEVE SER IGUAL AO CADSATRO-->
                                                        <td><?php
                                                    if ($livrolido['statusLeitura'] == 1) {
                                                        echo "Não lido";
                                                    } elseif ($livrolido['statusLeitura'] == 2) {
                                                        echo "Lendo";
                                                    } else {
                                                        echo "Lido";
                                                    }
        ?></td>
                                                    </tr>
                                                        <?php endwhile; ?>

                                            </tbody>
                                        </table>
<?php else: ?>

                                        <p>Nenhum livro com esse status de leitura</p>

<?php endif; ?>
                                </div>
                                
                                
                                
                                <div class="tab-pane fade" id="lendo">
                                    <h4>LENDO</h4>
                                    
<?php if ($totallendo > 0): ?>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-lendo">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Autor</th>
                                                    <th>Data de cadastro</th>
                                                    <th>Status de emprestimo</th>
                                                    <th>statusLeitura</th>
                                                </tr>
                                            </thead>
                                            <tbody>

    <?php while ($livrolnd = $stmtlistalendo->fetch(PDO::FETCH_ASSOC)): ?>
                                                    <tr class="even gradeC">
                                                        <td><?php echo $livrolnd['nome'] ?></td>
                                                        <td><?php echo $livrolnd['autor'] ?></td>
                                                        <td><?php echo dateConvert($livrolnd['data']); ?></td>
                                                        <td><?php
                                            if ($livrolnd['statusEmprestimo'] == 0) {
                                                echo "Não emprestado";
                                            } else {
                                                echo "Emprestado";
                                            }
        ?></td>
                                                        <!--STATUS DE LEITURA DEVE SER IGUAL AO CADSATRO-->
                                                        <td><?php
                                                    if ($livrolnd['statusLeitura'] == 1) {
                                                        echo "Não lido";
                                                    } elseif ($livrolnd['statusLeitura'] == 2) {
                                                        echo "Lendo";
                                                    } else {
                                                        echo "Lido";
                                                    }
        ?></td>
                                                    </tr>
                                                        <?php endwhile; ?>

                                            </tbody>
                                        </table>
<?php else: ?>

                                        <p>Nenhum livro com esse status de leitura</p>

<?php endif; ?>
                                </div>
                                
                                
                                
                                <div class="tab-pane fade" id="nlidos">
                                    <h4>NÃO LIDOS</h4>
                                <?php if ($totalnlidos > 0): ?>
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-naolido">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Autor</th>
                                                    <th>Data de cadastro</th>
                                                    <th>Status de emprestimo</th>
                                                    <th>statusLeitura</th>
                                                </tr>
                                            </thead>
                                            <tbody>

    <?php while ($livronld = $stmtlistanaolidos->fetch(PDO::FETCH_ASSOC)): ?>
                                                    <tr class="even gradeC">
                                                        <td><?php echo $livronld['nome'] ?></td>
                                                        <td><?php echo $livronld['autor'] ?></td>
                                                        <td><?php echo dateConvert($livronld['data']); ?></td>
                                                        <td><?php
                                            if ($livronld['statusEmprestimo'] == 0) {
                                                echo "Não emprestado";
                                            } else {
                                                echo "Emprestado";
                                            }
        ?></td>
                                                        <!--STATUS DE LEITURA DEVE SER IGUAL AO CADSATRO-->
                                                        <td><?php
                                                    if ($livronld['statusLeitura'] == 1) {
                                                        echo "Não lido";
                                                    } elseif ($livronld['statusLeitura'] == 2) {
                                                        echo "Lendo";
                                                    } else {
                                                        echo "Lido";
                                                    }
        ?></td>
                                                    </tr>
                                                        <?php endwhile; ?>

                                            </tbody>
                                        </table>
<?php else: ?>

                                        <p>Nenhum livro com esse status de leitura</p>

<?php endif; ?>    
                                
                                </div>

                            </div>
                        </div>
                        <!--fim do conteudo-->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

        <!--ligações-->
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
    $('#dataTables-lido').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
            //responsive: true
        }
    } );
} );
    
</script>
<script>
    $(document).ready(function() {
    $('#dataTables-lendo').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
            //responsive: true
        }
    } );
} );
    
</script>
<script>
    $(document).ready(function() {
    $('#dataTables-naolido').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
            //responsive: true
        }
    } );
} );
    
</script>

</body>

</html>
