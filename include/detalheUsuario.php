<div class="principal bg-white shadow d-flex flex-column align-items-center">
        <h1 class="mt-5 mb-5">Dados de <?=$usuarioDetalhe[0]->Nome_Funcionario?></h1>
        <!--Foto e Form-->
        <div class="dados d-flex flex-row justify-content-center bd-highlight">
          <!--Foto do petzão-->
          <div class="foto pr-5 rounded-3">
            <img class="rounded-3 shadowzao" style="width: 400px; height: 400px; object-fit: cover" src="files/<?=$usuarioDetalhe[0]->Img_Funcionario?>"/>
          </div>
          <!--Formzinho-->
          <div class="formzinho flex-grow-1 mb-5">
          <form method="post">
            <div class="form-group row">
              <label class="mt-1">Nome: </label>
              <input class="form-control col-12" type="text" name="Nome_Funcionario" value='<?=$usuarioDetalhe[0]->Nome_Funcionario?>' required>
            </div>
            <div class="form-group row">
              <label class="mt-1">CPF: </label>
              <input class="form-control col-12" type="text" name="CPF_Funcionario" value='<?=$usuarioDetalhe[0]->CPF_Funcionario?>' required>
            </div>
            <div class="form-group row">
              <label class="mt-1">Telefone: </label>
              <input class="form-control col-12" type="text" name="Telefone_Funcionario" value='<?=$usuarioDetalhe[0]->Telefone_Funcionario?>' required>
            </div>
            <div class="form-group row">
              <label class="mt-1">Cargo: </label>
              <input class="form-control col-12" type="text" name="Atribuicao_Funcionario" value='<?=$usuarioDetalhe[0]->Atribuicao_Funcionario?>' required>
            </div>
            <div class="form-group row">
              <label class="mt-1">Nível Hierárquico: </label>
              <?php
                if($usuarioDetalhe[0]->Nivel_Funcionario == 1){
                  echo '
                  <select class="form-control col-12" name="Nivel_Funcionario" id="id">
                    <option value="1">Padrão</option>
                    <option value="2">Administrador</option>
                  </select>';
                }
                else if($usuarioDetalhe[0]->Nivel_Funcionario == 2){
                  echo '
                  <select class="form-control col-12" name="Nivel_Funcionario" id="id">
                    <option value="2">Administrador</option>
                    <option value="1">Padrão</option>                  
                  </select>';
                }
              ?>
            </div>
            <div class="form-group row">
              <label class="mt-1">Login: </label>
              <input class="form-control col-12" type="text" name="Login_Funcionario" value='<?=$usuarioDetalhe[0]->Login_Funcionario?>' required>
            </div>
            <div class="form-group row">
              <label class="mt-1">Senha: </label>
              <input class="form-control col-12" type="password" name="Senha_Funcionario" required><br>
            </div>
            <div class="form-group d-flex flex-row align-items-center">
              <button type='submit' class='btn text-white mr-1' style="background-color: #aa0000; border: hidden" name="enviar" value='cadastrar'>Enviar</button>
              <a style="background-color: #aa0000; border: hidden" class="btn text-light mr-1" href="listarUsuarios.php">
                  Voltar
                </a>
              <a style="background-color: #aa0000; border: hidden" class="btn text-light" href="excluirUsuario.php?id=<?=$usuarioDetalhe[0]->Cod_Funcionario?>">
                Excluir
              </a>
            </div>
          </form>
          </div>
        </div>
      </div>
    </main>
    </main>