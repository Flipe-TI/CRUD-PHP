<?php

require_once 'config.php';

$nome = isset($_POST['name']) ? $_POST['name'] : null;
$idade = isset($_POST['idade']) ? $_POST['idade'] : null;
$cep = isset($_POST['cep']) ? $_POST['cep'] : null;
$rua = isset($_POST['rua']) ? $_POST['rua'] : null;
$numero = isset($_POST['numero']) ? $_POST['numero'] : null;
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : null;
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
$estado = isset($_POST['estado']) ? $_POST['estado'] : null;


if (empty($nome) || empty($idade) || empty($cep) || empty($rua) || empty($numero) || empty($bairro) || empty($cidade)|| empty($estado)){
    echo "É preciso preencher todos os campos do formulario de cadastro!";
    exit;
}

$PDO = conecta_bd();
$sql = 'CALL inserir(:nome, :idade, :cep, :rua, :numero, :bairro, :cidade, :estado)';
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':idade', $idade);
$stmt->bindParam(':cep', $cep);
$stmt->bindParam(':rua', $rua);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':bairro', $bairro);
$stmt->bindParam(':cidade', $cidade);
$stmt->bindParam(':estado', $estado);

if ($stmt->execute()){
    header('Location:redirecionamento.php');
} else {
    echo "Ocorreu um erro na inclusão de registro";
    print_r($stmt->errorInfo());
}

?>