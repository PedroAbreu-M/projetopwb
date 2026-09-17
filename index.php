<?php include "cabecalho.php"; ?>
<?php 
if( isset($_POST["login"]) )
{
  if(empty($_POST["login"]))
  {
    $mensagemErro = "Preencha o campos de login";
  }
    //Procedimento para banco de dados
}
else
{
  
}
?>


<style>
 
</style>
<div class="row w-100">
  <div class="col-md-4"></div>

  <div class="col-md-4"><!-- coluna do meio-->
      
    <div class="card">
      <div class="card-body">

    <?php
      if(isset($mensagemErro) && !empty($mensagemErro))
      {
        echo  '<div class="alert alert-danger">';
        echo $mensagemErro;
        echo  '</div>';
      }
    ?>
        


        <form action="index.php" method="post">
          <label for="login">Username</label>
          <input class="form-control"
                 type="text" 
                 name="login"
                 id="login"/>
          <label for="senha">Senha</label>
          <input class="form-control"
                 type="password"
                 name="senha"
                 id="senha" />
          <div class="row mt-3">
            <div class="col-md-6">
              <button type="submit" class="btn btn-primary">
                Entrar
              </button>
            </div>
            <div class="col-md-6 align-items-center d-flex justify-content-end ">
              <input type="checkbox" class="form-check-input mx-2" value="senha"/> Salvar Senha
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>

  <div class="col-md-4"></div>
  
</div>

<?php include "rodape.php"; ?>