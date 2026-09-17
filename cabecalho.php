<?php
$paginaAtual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão
    </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="css/reset.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ProjetoPWB</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php echo $paginaAtual == 'index.php' ? 'active' : ''; ?>" href="./index.php">
            Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo in_array($paginaAtual, ['usuarios.php', 'novoUsuario.php']) ? 'active' : ''; ?>" href="./usuarios.php">Usuários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo in_array($paginaAtual, ['clientes.php', 'novoCliente.php']) ? 'active' : ''; ?>" href="./clientes.php">Clientes</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container h-75 pt-5">
