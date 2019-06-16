<?php
 
require_once '../genericos/init.php';
 
// resgata os valores do formulário
$idLivro = isset($_POST['idLivro']) ? $_POST['idLivro'] : null;
$id_usr = isset($_POST['id_usr']) ? $_POST['id_usr'] : null;
$statusLeitura = isset($_POST['statusLeitura']) ? $_POST['statusLeitura'] : null;

  
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE livro SET statusLeitura = :statusLeitura WHERE Usuario_id_usr = :id_usr AND idLivro = :idLivro" ;
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':statusLeitura', $statusLeitura);
$stmt->bindParam(':idLivro', $idLivro);
$stmt->bindParam(':id_usr', $id_usr);

 
if ($stmt->execute())
{
   header('Location: ../telas/form-mudarstatus.php');
	echo"<script type='text/javascript'>";
	echo "alert('Sucesso!');";
	echo "</script>";
	
	
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}