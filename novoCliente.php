<?php include "cabecalho.php"; ?>

<div class="row justify-content-center">
    <div class="col-lg-8">

        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Cadastro de cliente</h4>
            </div>

            <div class="card-body">

                <?php if ($erro = $_GET["erro"] ?? ""): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($erro) ?>
                    </div>
                <?php endif; ?>

                <form action="salvarCliente.php" method="post">

                    <input type="hidden" name="id_cliente">

                    <div class="row g-3">

                        <div class="col-md-8">
                            <label class="form-label">Nome</label>
                            <input class="form-control" name="nome" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">CPF/CNPJ</label>
                            <input class="form-control" name="cpf_cnpj" maxlength="18" required>
                        </div>

                        <div class="col-md-7">
                            <label class="form-label">E-mail</label>
                            <input class="form-control" name="email" type="email">
                        </div>

                        <div class="col-md-5">
                            <label class="form-label">Telefone</label>
                            <input class="form-control" name="telefone" maxlength="20">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Data de nascimento</label>
                            <input class="form-control" name="data_nascimento" type="date">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Logradouro</label>
                            <input class="form-control" name="logradouro" maxlength="200">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">Número</label>
                            <input class="form-control" name="numero" maxlength="20">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Complemento</label>
                            <input class="form-control" name="complemento" maxlength="100">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Bairro</label>
                            <input class="form-control" name="bairro" maxlength="100">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Cidade</label>
                            <input class="form-control" name="cidade" maxlength="100">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Estado</label>
                            <input class="form-control text-uppercase" name="estado" maxlength="2">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">CEP</label>
                            <input class="form-control" name="cep" maxlength="9">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label d-block">Ativo</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="ativo" type="radio" value="1" checked>
                                <label class="form-check-label">Sim</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="ativo" type="radio" value="0">
                                <label class="form-check-label">Não</label>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="clientes.php" class="btn btn-secondary">
                            Cancelar
                        </a>

                        <button class="btn btn-success" type="submit">
                            Salvar
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

<?php include "rodape.php"; ?>
