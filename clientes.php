<?php
include "cabecalho.php";
include "conexao.php";

$pesquisa = trim($_GET["pesquisa"] ?? "");
$clientes = [];

$sql = "SELECT id_cliente, nome, cpf_cnpj, email, telefone, cidade, estado, ativo
        FROM cliente";

if ($pesquisa) {
    $sql .= " WHERE nome LIKE ?
              OR cpf_cnpj LIKE ?
              OR email LIKE ?
              OR telefone LIKE ?";
}

$sql .= " ORDER BY nome";

$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    if ($pesquisa) {
        $termo = "%$pesquisa%";
        mysqli_stmt_bind_param($stmt, "ssss", $termo, $termo, $termo, $termo);
    }

    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado) {
        $clientes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }

    mysqli_stmt_close($stmt);
}

$mensagem = $_GET["mensagem"] ?? "";
?>

<?php if ($mensagem): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($mensagem) ?>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Clientes</h4>
                <small class="text-muted">
                    Lista de clientes cadastrados
                </small>
            </div>

            <a href="novoCliente.php" class="btn btn-success">
                Novo Cliente
            </a>
        </div>

        <form action="clientes.php" method="get" class="mb-4">
            <div class="row g-2">

                <div class="col">
                    <input
                        name="pesquisa"
                        class="form-control"
                        value="<?= htmlspecialchars($pesquisa) ?>"
                        placeholder="Nome, CPF/CNPJ, e-mail ou telefone"
                    >
                </div>

                <div class="col-auto">
                    <button class="btn btn-primary">
                        Pesquisar
                    </button>

                    <?php if ($pesquisa): ?>
                        <a href="clientes.php" class="btn btn-secondary">
                            Limpar
                        </a>
                    <?php endif; ?>
                </div>

            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF/CNPJ</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Cidade/UF</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (!$clientes): ?>

                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Nenhum cliente encontrado.
                            </td>
                        </tr>

                    <?php else: ?>

                        <?php foreach ($clientes as $cliente): ?>

                            <tr>
                                <td><?= htmlspecialchars($cliente["nome"]) ?></td>

                                <td><?= htmlspecialchars($cliente["cpf_cnpj"] ?? "") ?></td>

                                <td><?= htmlspecialchars($cliente["email"] ?? "") ?></td>

                                <td><?= htmlspecialchars($cliente["telefone"] ?? "") ?></td>

                                <td>
                                    <?= htmlspecialchars(
                                        trim(
                                            ($cliente["cidade"] ?? "") .
                                            ($cliente["estado"] ? "/" . $cliente["estado"] : "")
                                        )
                                    ) ?>
                                </td>

                                <td>
                                    <span class="badge <?= $cliente["ativo"] ? "bg-success" : "bg-secondary" ?>">
                                        <?= $cliente["ativo"] ? "Ativo" : "Inativo" ?>
                                    </span>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include "rodape.php"; ?>
