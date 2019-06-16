<?php

require_once '../genericos/init.php';

// pega os dados do formuário
$idLivro = isset($_POST['idLivro']) ? $_POST['idLivro'] : null;
$codEmprestimo = isset($_POST['codEmprestimo']) ? $_POST['codEmprestimo'] : null;
//$dataDev = getData();
// validação (bem simples, só pra evitar dados vazios)
if (empty($idLivro) || empty($codEmprestimo)) {

    echo "Id inválido";
    exit;
}

// insere no banco
$PDO = db_connect();
$sql = "DELETE FROM emprestimo WHERE codEmprestimo = :codEmprestimo ";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':codEmprestimo', $codEmprestimo);



//atualizar o campo em livro
$sqlAtualizar = "UPDATE livro set statusEmprestimo = 0 where idLivro = :idLivro";
$stmtAtualizar = $PDO->prepare($sqlAtualizar);
$stmtAtualizar->bindParam(':idLivro', $idLivro);



if ($stmt->execute() && $stmtAtualizar->execute()) {
    header('Location: ../telas/form-devolucao.php');
} else {
    echo "Erro ao devolver";
    print_r($stmt->errorInfo());
}