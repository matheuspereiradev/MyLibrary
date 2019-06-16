<?php
 
require_once '../genericos/init.php';
 
// pega os dados do formuário
$livro = isset($_POST['livro']) ? $_POST['livro'] : null;
$amigo = isset($_POST['amigo']) ? $_POST['amigo'] : null;
$Usuario_id_usr = isset($_POST['Usuario_id_usr']) ? $_POST['Usuario_id_usr'] : null;
$dataEmp = getData();


// validação (bem simples, só pra evitar dados vazios)
if (empty($livro) || empty($amigo) || empty($Usuario_id_usr))
{
    //echo "livro ",$livro;
    //echo "amigo ",$amigo;
    //echo "usr ",$Usuario_id_usr;
    echo "Selecione o livro e o amigo";
    exit;
}
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO emprestimo(dataEmp, Livro_idLivro, Amigo_idAmigo, Usuario_id_usr) VALUES(:dataEmp, :Livro_idLivro, :Amigo_idAmigo, :Usuario_id_usr)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':dataEmp', $dataEmp);
$stmt->bindParam(':Livro_idLivro', $livro);
$stmt->bindParam(':Amigo_idAmigo', $amigo);
$stmt->bindParam(':Usuario_id_usr', $Usuario_id_usr);

//atualizar o campo em livro
$sqlAtualizar = "UPDATE livro set statusEmprestimo = 1 where idLivro = :Livro_idLivro";
$stmtAtualizar = $PDO->prepare($sqlAtualizar);
$stmtAtualizar->bindParam(':Livro_idLivro', $livro);

 
 
if ($stmt->execute() && $stmtAtualizar->execute())
{
    header('Location: ../telas/home.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}