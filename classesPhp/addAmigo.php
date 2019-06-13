<?php
 
require_once '../genericos/init.php';
 
// pega os dados do formuário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$Usuario_id_usr = isset($_POST['Usuario_id_usr']) ? $_POST['Usuario_id_usr'] : null;
 
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($nome))
{
    
    echo "Volte e preencha o campo nome";
    
    exit;
}
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO amigo(nome, telefone, Usuario_id_usr) VALUES(:nome, :telefone, :Usuario_id_usr)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':telefone', $telefone);
$stmt->bindParam(':Usuario_id_usr', $Usuario_id_usr);
 

if ($stmt->execute())
{
	
    header('Location: ../telas/form-listaramigo.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}?>