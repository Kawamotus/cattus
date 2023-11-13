<?php

if(!empty($alertaCadastro)){
        $alertaCadastro = "<div class='alert alert-danger'>".$alertaCadastro."</div>";
    }
    else{
        $alertaCadastro = "";
    }

?>
<div
        class="body d-flex flex-row align-items-center justify-content-center bg-white shadow"
      >
      <!--Aqui eh a div q o form fica-->
        <div
          class="formzinho w-50 h-100 bg-white d-flex flex-column justify-content-center position-relative shadow"
        >
          <form method="post" enctype="multipart/form-data">
            <div class="form-group col-md-6">
              <?=$alertaCadastro?>
              <label class="mt-1">Nome: </label>
              <input class="form-control" type="text" name="Nome_Funcionario" required>
              <label class="mt-1">CPF: </label>
              <input class="form-control" type="text" name="CPF_Funcionario" required>
              <label class="mt-1">Telefone: </label>
              <input class="form-control" type="text" name="Telefone_Funcionario" required>
              <label class="mt-1">Cargo: </label>
              <input class="form-control" type="text" name="Atribuicao_Funcionario" required>
              <label class="mt-1">Nível Hierárquico: </label>
              <select class="form-control" name="Nivel_Funcionario" id="id">
                <option value="1">Padrão</option>
                <option value="2">Administrador</option>
              </select>
              <label class="mt-1">Login: </label>
              <input class="form-control" type="text" name="Login_Funcionario" required>
              <label class="mt-1">Senha: </label>
              <input class="form-control" type="password" name="Senha_Funcionario" required><br>
              <label class="mt-1">Foto de perfil: </label><br />
              <input class="form-control-file" type="file" name="Img_Funcionario" accept="image/*" required><br>
              <button type='submit' class='btn mb-2 text-white' style="background-color: #aa0000; border: hidden" name="enviar" value='cadastrar'>Enviar</button>
            </div>
          </form>
        </div>
        <!--aqui eh a div q fica do lado, onde vai a foto mt foda-->
        <div class="sectionzinha w-50 h-100">
          <img src="./imgs/imgUsuario.jpg" alt="Homem abraçando cachorro" style="object-fit: cover">
        </div>
      </div>
    </main>