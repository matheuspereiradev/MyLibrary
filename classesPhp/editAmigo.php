<?php

require_once '../genericos/init.php';

// resgata os valores do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$Usuario_id_usr = isset($_POST['Usuario_id_usr']) ? $_POST['Usuario_id_usr'] : null;
$idAmigo = isset($_POST['idAmigo']) ? $_POST['idAmigo'] : null;

// validação (bem simples, mais uma vez)
if (empty($nome)) {
    echo "Volte e preencha o nome do seu amigo";
    exit;
}


// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE amigo SET nome = :nome, telefone = :telefone, Usuario_id_usr= :Usuario_id_usr  WHERE idAmigo = :idAmigo";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':Usuario_id_usr', $Usuario_id_usr);
$stmt->bindParam(':idAmigo', $idAmigo, PDO::PARAM_INT);

if ($stmt->execute()) {

    header('Location: ../telas/form-listaramigo.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}