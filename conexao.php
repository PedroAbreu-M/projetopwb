<?php

$servidor = "localhost";
$banco = "AulaDB";
$senha = "";
$usuario = "root";

$sql = "Create database if not EXISTS AulaDb";

//conexão sem escolher o banco
$conexao = mysqli_connect($servidor, $usuario, $senha);

//criação automatica do banco de dados
$resultado = mysqli_query($conexao, $sql);

//selecione o banco recém criado
mysqli_select_db($conexao, "AulaDb")

?>

