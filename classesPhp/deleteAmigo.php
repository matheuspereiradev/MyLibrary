<?php

require_once '../genericos/init.php';

$idAmigo = isset($_POST['idAmigo']) ? $_POST['idAmigo'] : null;

if (empty($idAmigo)) {
    echo "id não informado";
    exit;
}
$PDO = db_connect();

//verificar se existe cadastro ativo
$sql_verificar = "SELECT COUNT(*) AS verificar FROM emprestimo WHERE Amigo_idAmigo= :idAmigo ORDER BY Amigo_idAmigo ASC";
$stmt_verificar = $PDO->prepare($sql_verificar);
$stmt_verificar->bindParam(':idAmigo', $idAmigo);
$stmt_verificar->execute();
$totalverificar = $stmt_verificar->fetchColumn();

if ($totalverificar == 0) {
// remove do banco amigo
    $sql = "DELETE FROM amigo WHERE idAmigo = :idAmigo";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':idAmigo', $idAmigo, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header('Location: ../telas/form-listaramigo.php');
    } else {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Erro ao remover: $stmt->errorInfo()')
window.location.href='../telas/form-listaramigo.php';
</SCRIPT>");
    }
} else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Não é possível exluir um amigo que esteja com livros emprestados')
window.location.href='../telas/form-listaramigo.php';
</SCRIPT>");
}
