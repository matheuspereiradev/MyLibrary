<?php
 
require_once '../genericos/init.php';
 
// pega os dados do formuário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$autor = isset($_POST['autor']) ? $_POST['autor'] : null;
$statusLeitura = isset($_POST['statusLeitura']) ? $_POST['statusLeitura'] : null;
$statusEmprestimo=isset($_POST['statusEmprestimo']) ? $_POST['statusEmprestimo'] : null;
$data = getData();
$Usuario_id_usr = isset($_POST['Usuario_id_usr']) ? $_POST['Usuario_id_usr'] : null;
 
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($nome) || empty($autor)|| empty($statusLeitura))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
//$isoDate = dateConvert($statusEmprestimo, statusLeitura);
//$databr=dateConvert($data); 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO livro(nome, autor, data, statusEmprestimo, statusLeitura, Usuario_id_usr) VALUES(:nome, :autor, :data, :statusEmprestimo, :statusLeitura, :Usuario_id_usr)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':autor', $autor);
$stmt->bindParam(':data', $data);
$stmt->bindParam(':statusEmprestimo', $statusEmprestimo);
$stmt->bindParam(':statusLeitura', $statusLeitura);
$stmt->bindParam(':Usuario_id_usr', $Usuario_id_usr);
 
 
if ($stmt->execute())
{
    header('Location: ../telas/form-listarlivro.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}