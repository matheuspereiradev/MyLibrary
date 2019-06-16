<?php
session_start();

require_once '../genericos/init.php';

require '../genericos/check.php';

$PDO = db_connect();
$id_usr = $_SESSION['id_usr'];


//CONTAR emorestimos
$sql_counta_emprestimo = "SELECT COUNT(*) AS emprestimo FROM emprestimo WHERE Usuario_id_usr= :id_usr ORDER BY dataEmp ASC ";
$stmt_counta_emprestimo = $PDO->prepare($sql_counta_emprestimo);
$stmt_counta_emprestimo->bindParam(':id_usr', $id_usr);
$stmt_counta_emprestimo->execute();
$totalemprestimo = $stmt_counta_emprestimo->fetchColumn();

//select dados emprestimo
//$sqlemprestimo = "SELECT 'livro.nome', 'livro.autor', 'amigo.nome', 'amigo.telefone', 'emprestimo.dataEmp'  FROM livro, amigo, emprestimo where 'livro.idLivro' = 'emprestimo.Livro_idLivro' and dataDev= '0000-00-00' and 'amigo.idAmigo' = 'emprestimo.Amigo_idAmigo' ORDER BY 'livro.nome' ASC";
$sqlemprestimo = "SELECT livro.nome as livro, livro.autor as autor, amigo.nome as amigo, amigo.telefone as telefone, emprestimo.dataEmp as dataemp, emprestimo.Livro_idLivro as idLivro, emprestimo.codEmprestimo as codEmprestimo FROM livro, amigo, emprestimo where emprestimo.Usuario_id_usr=:id_usr and livro.idLivro = emprestimo.Livro_idLivro and amigo.idAmigo = emprestimo.Amigo_idAmigo ORDER BY livro.nome ASC";
$stmtemprestimo = $PDO->prepare($sqlemprestimo);
$stmtemprestimo->bindParam(':id_usr', $id_usr);
$stmtemprestimo->execute();
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
                        <h1 class="page-header">Realizar devolução</h1>
                        <?php if ($totalemprestimo > 0): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Livros atualmente emprestados
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Livro</th>
                                                <th>Autor</th>
                                                <th>Amigo</th>
                                                <th>Telefone</th>
                                                <th>Data de emprestimo</th>
                                                <th>Emprestado a</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($emprestimo = $stmtemprestimo->fetch(PDO::FETCH_ASSOC)): ?>
                                                <tr class="even gradeC">
                                                    <td><?php echo $emprestimo['livro'] ?></td>
                                                    <td><?php echo $emprestimo['autor'] ?></td>
                                                    <td><?php echo $emprestimo['amigo'] ?></td>
                                                    <td><?php
                                                        if ($emprestimo['telefone'] == 0) {
                                                            echo "Não cadastrado";
                                                        } else {
                                                            echo $emprestimo['telefone'];
                                                        }
                                                        ?>

                                                    </td>
                                                    <td><?php echo dateConvert($emprestimo['dataemp']); ?></td>
                                                    <td>
                                                        <?php echo calcularTempo($emprestimo['dataemp'])," dias"; ?>

                                                    </td>
                                                    <td>
                                                        <form action="../classesPhp/devolver.php" method="post">
                                                            <input type="hidden" name="idLivro" value="<?php echo $emprestimo['idLivro'] ?>">
                                                            <input type="hidden" name="codEmprestimo" value="<?php echo $emprestimo['codEmprestimo'] ?>">
                                                            <input type="submit" value="Devolver" class="btn btn-outline btn-default btn-lg btn-block" onclick="return confirm('Deseja realizar a devolução do livro?');">
                                                        </form>
                                                    </td>
                                                </tr>
    <?php endwhile; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
<?php else: ?>        
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Livros atualmente emprestados
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <center><p>Você ainda não tem nenhum livro emprestado</p> </center>

                                </div></div>

<?php endif; ?>
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

</body>

</html>

