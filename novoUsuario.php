<?php include "cabecalho.php"; ?>

<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <h2 class="mb-5">Cadastro de usuário</h2>
        <form action="salvarUsuario.php" method="post">
            <input name="id" type="hidden" />
            <div class="row align-items-center mb-3">
                <div class="col-2">
                    Nome:
                </div>
                <div class="col-10">
                    <input class="form-control"
                            name="nome"
                            type="text" />
                </div>
            </div><!-- Linha do NOME -->
            <div class="row align-items-center mb-3">
                <div class="col-2">
                    Login:
                </div>
                <div class="col-10">
                    <input class="form-control"
                            name="login"
                            type="text" />
                </div>
            </div><!-- Linha do Login -->

            <div class="row align-items-center mb-3">
                <div class="col-2">
                    Senha:
                </div>
                <div class="col-10">
                    <input class="form-control"
                            name="senha"
                            type="password" />
                </div>
            </div><!-- Linha do Senha -->
            <div class="row align-items-center mb-3">
                <div class="col-2"> Ativo:</div>
                <div class="col-10">
                    
                        <input class="form-check-input" type="radio" name="ativo" checked> Sim
                        <input class="form-check-input ms-5" type="radio" name="ativo" value="0" > Não
                </div>
               
            </div><!-- Linha do Radio Ativo -->
            <div class="row align-items-center mb-3">
                <div class="col-12 text-end">
                    <button class="btn btn-success " type="submit" >
                        Salvar Usuário
                    </button>
                </div>
                
            </div><!-- Linha do Senha -->
        </form>
    </div>
    <div class="col-4"></div>
</div>

<?php include "rodape.php"; ?>