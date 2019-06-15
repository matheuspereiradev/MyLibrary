<?php
 
require_once '../genericos/init.php';
 
// resgata os valores do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$autor = isset($_POST['autor']) ? $_POST['autor'] : null;
$statusLeitura = isset($_POST['statusLeitura']) ? $_POST['statusLeitura'] : null;
$statusEmprestimo=isset($_POST['statusEmprestimo']) ? $_POST['statusEmprestimo'] : null;
$data = isset($_POST['data']) ? $_POST['data'] : null;
$Usuario_id_usr = isset($_POST['Usuario_id_usr']) ? $_POST['Usuario_id_usr'] : null;
$idLivro = isset($_POST['idLivro']) ? $_POST['idLivro'] : null;
 
// validação (bem simples, mais uma vez)
if (empty($nome) || empty($autor))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
//$isoDate = dateConvert($birthdate);
 
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE livro SET nome = :nome, autor = :autor, data = :data, statusEmprestimo = :statusEmprestimo, statusLeitura = :statusLeitura, Usuario_id_usr = :Usuario_id_usr WHERE idLivro = :idLivro";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':autor', $autor);
$stmt->bindParam(':data', $data);
$stmt->bindParam(':statusEmprestimo', $statusEmprestimo);
$stmt->bindParam(':statusLeitura', $statusLeitura);
$stmt->bindParam(':Usuario_id_usr', $Usuario_id_usr);
$stmt->bindParam(':idLivro', $idLivro, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: ../telas/form-listarlivro.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}