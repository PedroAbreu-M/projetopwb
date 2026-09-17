<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: clientes.php");
    exit;
}

$nome = trim($_POST["nome"] ?? "");
$cpf_cnpj = trim($_POST["cpf_cnpj"] ?? "");
$email = trim($_POST["email"] ?? "");
$telefone = trim($_POST["telefone"] ?? "");
$data_nascimento = trim($_POST["data_nascimento"] ?? "");
$logradouro = trim($_POST["logradouro"] ?? "");
$numero = trim($_POST["numero"] ?? "");
$complemento = trim($_POST["complemento"] ?? "");
$bairro = trim($_POST["bairro"] ?? "");
$cidade = trim($_POST["cidade"] ?? "");
$estado = strtoupper(trim($_POST["estado"] ?? ""));
$cep = trim($_POST["cep"] ?? "");
$ativo = isset($_POST["ativo"]) ? (int) $_POST["ativo"] : 1;

if ($nome === "") {
    header("Location: novoCliente.php?erro=" . urlencode("Preencha o nome do cliente."));
    exit;
}

if ($cpf_cnpj === "") {
    header("Location: novoCliente.php?erro=" . urlencode("Preencha o CPF/CNPJ do cliente."));
    exit;
}

$email = $email !== "" ? $email : null;
$telefone = $telefone !== "" ? $telefone : null;
$data_nascimento = $data_nascimento !== "" ? $data_nascimento : null;
$logradouro = $logradouro !== "" ? $logradouro : null;
$numero = $numero !== "" ? $numero : null;
$complemento = $complemento !== "" ? $complemento : null;
$bairro = $bairro !== "" ? $bairro : null;
$cidade = $cidade !== "" ? $cidade : null;
$estado = $estado !== "" ? $estado : null;
$cep = $cep !== "" ? $cep : null;

$sql = "INSERT INTO cliente
        (nome, cpf_cnpj, email, telefone, data_nascimento, logradouro, numero, complemento, bairro, cidade, estado, cep, ativo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

if (!$stmt) {
    header("Location: novoCliente.php?erro=" . urlencode("Não foi possível preparar o cadastro do cliente."));
    exit;
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssssssi",
    $nome,
    $cpf_cnpj,
    $email,
    $telefone,
    $data_nascimento,
    $logradouro,
    $numero,
    $complemento,
    $bairro,
    $cidade,
    $estado,
    $cep,
    $ativo
);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header("Location: clientes.php?mensagem=" . urlencode("Cliente cadastrado com sucesso."));
    exit;
}

$erro = mysqli_stmt_errno($stmt) === 1062
    ? "Já existe um cliente com esse CPF/CNPJ."
    : "Houve um erro ao cadastrar o cliente.";

mysqli_stmt_close($stmt);
header("Location: novoCliente.php?erro=" . urlencode($erro));
exit;
?>
