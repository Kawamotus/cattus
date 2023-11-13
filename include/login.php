<?php

    if(!empty($alertaLogin)){
        $alertaLogin = "<div class='alert alert-danger'>".$alertaLogin."</div>";
    }
    else{
        $alertaLogin = "";
    }

?>

<div
        class="body d-flex flex-row align-items-center justify-content-center bg-white shadow"
      >
      <!--Aqui eh a div onde fica o form-->
        <div
          class="formzinho w-50 h-100 bg-white d-flex flex-column align-items-center justify-content-center position-relative shadow"
        >
          <form method="post">
            <div class="form-group col-md-12">

                <?=$alertaLogin ?>

                <label>Login: </label><br />
                <input class="form-control" type="text" name="Login_Funcionario" required><br />
                <label>Senha: </label><br />
                <input class="form-control" type="password" name="Senha_Funcionario" required>
                <br>
                <input type="submit" class="btn btn-primary mb-2" style="background-color: #aa0000; border: hidden" value="Login" name="enviar"/>
            </div>
          </form>
        </div>
        <!--Aqui eh o espaço do lado do form, onde vai a imagem muito legal-->
        <div class="sectionzinha w-50 h-100">
        <img src="imgs/gato.jpg" alt="Gato" style="object-fit: cover;">
        </div>
      </div>
    </main>