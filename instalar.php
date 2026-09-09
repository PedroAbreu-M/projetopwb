<?php

include "conexao.php";

$sql = "
    CREATE TABLE if not exists usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    login VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(225) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT TRUE
);
";
$resultado = mysqli_query($conexao, $sql);
if($resultado == 1)
    {
        echo "Banco instalado com sucesso";
    }
else
    {
        echo "Houve um erro ao rodar a instalação";
    }
$sql = "CREATE TABLE IF NOT EXISTS cliente (
    id_cliente INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(150) NOT NULL,
    cpf_cnpj VARCHAR(18) NOT NULL UNIQUE,
    email VARCHAR(150),
    telefone VARCHAR(20),
    data_nascimento DATE,
    logradouro VARCHAR(200).
    numero VARCHAR(20),
    complemento VARCHAR(100),
    bairro VARCHAR(100),
    cidade VARCHAR9(100),
    estado CHAR(2),
    cep VARCHAR(9),
    ativo BOOLEAN NOT NULL DEFAULT TRUE );
";

resultado = mysqli_query($conexao, $sql);
if($resultado == 1)
    {
        echo "<br> Tabela cliente instalado com sucesso";
    }
else
    {
        echo "Houve um erro ao rodar a instalação";
    }
?>