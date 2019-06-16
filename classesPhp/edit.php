<?php
 
require_once '../genericos/init.php';
 
// resgata os valores do formulário
$login = isset($_POST['login']) ? $_POST['login'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
$id_usr = isset($_POST['id_usr']) ? $_POST['id_usr'] : null;
$senhaHASH= calcularHash($senha);
// validação (bem simples, mais uma vez)
if (empty($login) || empty($nome) || empty($senha))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE usuario SET login = :login, nome = :nome, senha = :senha WHERE id_usr = :id_usr";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':senha', $senhaHASH);
$stmt->bindParam(':id_usr', $id_usr, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: ../telas/home.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}