<?php

require_once '../genericos/init.php';

// pega os dados do formuário
$login = isset($_POST['login']) ? $_POST['login'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

$senhaHASH= calcularHash($senha);

// validação
if (empty($login) || empty($nome) || empty($senha))
{
	echo "Volte e preencha todos os campos";
	exit;
}

// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO usuario(login, nome, senha) VALUES(:login, :nome, :senha)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':login', $login);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':senha', $senhaHASH);



if ($stmt->execute())
{
	header('Location: ../telas/form-login.php');
}
else
{
	echo "Erro ao cadastrar";
	print_r($stmt->errorInfo());
}