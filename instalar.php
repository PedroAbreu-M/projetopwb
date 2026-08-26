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
?>