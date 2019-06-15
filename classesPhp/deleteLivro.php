<?php

session_start();

require_once '../genericos/init.php';

//require 'check.php';

$idLivro = isset($_POST['idLivro']) ? $_POST['idLivro'] : null;

// validLivroa o idLivro
if (empty($idLivro)) {
    echo "id não informado";
    exit;
}

// remove do banco
$PDO = db_connect();
$sql = "DELETE FROM livro WHERE idLivro = :idLivro";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':idLivro', $idLivro, PDO::PARAM_INT);


if ($stmt->execute()) {
    header('Location: ../telas/form-listarlivro.php');
} else {
    echo "Erro ao remover";
    print_r($stmt->errorInfo());
}