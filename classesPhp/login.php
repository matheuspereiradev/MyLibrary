<?php

// inclui o arquivo de inicialização
require '../genericos/init.php';

// resgata variáveis do formulário
$login = isset($_POST['login']) ? $_POST['login'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$senhaHASH = calcularHash($senha);
if (empty($login) || empty($senha)) {
    echo "Informe login e senha";
    exit;
}


$PDO = db_connect();

$sql = "SELECT id_usr, nome FROM usuario WHERE login = :login AND senha = :senha";
$stmt = $PDO->prepare($sql);

$stmt->bindParam(':login', $login);
$stmt->bindParam(':senha', $senhaHASH);

$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);



if (count($users) <= 0) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('login ou senha incorretos')
window.location.href='../telas/form-login.php';
</SCRIPT>");
    exit;
}

// pega o primeiro usuário
$user = $users[0];

session_start();
$_SESSION['logged_in'] = true;
$_SESSION['id_usr'] = $user['id_usr'];
$_SESSION['nome'] = $user['nome'];

header('Location: #.php');
