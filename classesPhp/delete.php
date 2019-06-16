<?php
 
session_start();
 
require_once '../genericos/init.php';
 
//require 'check.php';
 
// pega o id_usr da URL
 $id_usr = isset($_POST['id_usr']) ? $_POST['id_usr'] : null;
// valid_usra o id_usr
if (empty($id_usr))
{
    echo "id não informado";
    exit;
}
 

$PDO = db_connect();
//apaga os emprestimos
$sqldoemprestimo = "DELETE FROM emprestimo WHERE Usuario_id_usr = :id_usr";
$stmtdoemprestimo = $PDO->prepare($sqldoemprestimo);
$stmtdoemprestimo->bindParam(':id_usr', $id_usr, PDO::PARAM_INT);

//remover livros
$sqldoslivros = "DELETE FROM livro WHERE Usuario_id_usr = :id_usr";
$stmtdoslivros = $PDO->prepare($sqldoslivros);
$stmtdoslivros->bindParam(':id_usr', $id_usr, PDO::PARAM_INT);

// remove amigos
$sqldoamigo = "DELETE FROM amigo WHERE Usuario_id_usr = :id_usr";
$stmtdoamigo = $PDO->prepare($sqldoamigo);
$stmtdoamigo->bindParam(':id_usr', $id_usr, PDO::PARAM_INT);

// remove conta
$sql = "DELETE FROM usuario WHERE id_usr = :id_usr";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id_usr', $id_usr, PDO::PARAM_INT);
 
if ($stmtdoemprestimo->execute()&&$stmtdoslivros->execute()&&$stmtdoamigo->execute()&&$stmt->execute())
{
    header('Location: logout.php');
}
else
{
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}