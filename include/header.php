<?php

  use App\Session\Login;

  $usuarioLogado = Login::getUsuarioLogado();

  $usuario = $usuarioLogado ? $usuarioLogado['Nome_Funcionario'].'<a href="logout.php" class="text-light font-weight-bold" style="text-decoration: none"><button type="button" class="btn btn-secondary border-0">Sair</button></a>' : 'Visitante <a href="login.php" class="text-light font-weight-bold"><button type="button" class="btn btn-secondary border-0">Entrar</button></a>';

  if($usuarioLogado){
    $menu = '<header
    class="navbar d-flex flex-row justify-content-between align-items-center w-100 shadowzinho"
  >
    <div>
      <a href="index.php"
        ><img
          class="ml-3"
          style="width: auto; height: 40px"
          src="imgs/Texto_Logo_Branco.png"
          alt="Logotipo do site CATTUS"
      /></a>
    </div>
    <div class="btn-group d-flex flex-row align-items-center">
      <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"  onmousedown="changeColor("#c92020")" onmouseup="changeColor("#aa0000")">
        Pets
      </button>
    <div class="dropdown-menu p-0" aria-labelledby="btnGroupDrop1">
      <a class="dropdown-item btn text-light" href="listarAnimais.php">Listar Pets</a>
      <a class="dropdown-item btn text-light" href="cadastrarAnimal.php">Cadastrar</a>
    </div>
    <div class="btn-group d-flex flex-row align-items-center">
    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle border-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"  onmousedown="changeColor("#c92020")" onmouseup="changeColor("#aa0000")">
      Usuarios
    </button>
  <div class="dropdown-menu p-0" aria-labelledby="btnGroupDrop1">
    <a class="dropdown-item btn text-light" href="listarUsuarios.php">Listar Usuarios</a>
    <a class="dropdown-item btn text-light" href="cadastrarUsuario.php">Cadastrar Usuarios</a>
  </div>
      <a href="cameras.php"><button type="button" class="btn btn-secondary border-0">
        Câmeras
      </button></a>
      <a href="usuario.php?id='.$_SESSION['Usuario']['Cod_Funcionario'].'" style="text-decoration: none; font-size: 20px; font-weight: 600; background-color: #aa0000;" class="text-light"><button type="button" class="border-0 text-light" style="background-color: #aa0000;">'.$usuario.'</button></a>
      <a class="m-1" href="usuario.php?id='.$_SESSION['Usuario']['Cod_Funcionario'].'"><img src="files/'.$_SESSION['Usuario']['Img_Funcionario'].'" style="object-fit: cover; border-radius: 50%;  width: 30px; height: 30px; border: 1px solid #ffffff"></a>
      </div>
  </header>
  <main class="d-flex flex-column align-items-center">';
  }
  else{
    $menu = '<header
    class="navbar d-flex flex-row justify-content-between align-items-center shadowzinho w-100"
  >
    <div>
      <a href="index.php"
        ><img
          class="ml-3"
          style="width: auto; height: 40px"
          src="imgs/Texto_Logo_Branco.png"
          alt="Logotipo do site CATTUS"
      /></a>
    </div>
    <div class="btn-group" role="group">
      <a href="index.php"><button type="button" class="btn btn-secondary border-0">
        Início
      </button></a>
      <a href="#sobrenos"><button type="button" class="btn btn-secondary border-0">
        Sobre nós
      </button></a>
      <a href="#servicos"><button type="button" class="btn btn-secondary border-0">
        Serviços
      </button></a>
      <a href="#contatos"><button type="button" class="btn btn-secondary border-0">
        Contatos
      </button></a>
      <a href="login.php"><button type="button" class="btn btn-secondary border-0">Login</button></a>
      <button type="button" class="btn btn-secondary border-0">
        <svg
            class="login"
            xmlns="http://www.w3.org/2000/svg"
            width="30"
            height="30"
            viewBox="0 0 24 24"
          >
            <g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd">
              <path
                d="M16 9a4 4 0 1 1-8 0a4 4 0 0 1 8 0Zm-2 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0Z"
              />
              <path
                d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1ZM3 12c0 2.09.713 4.014 1.908 5.542A8.986 8.986 0 0 1 12.065 14a8.984 8.984 0 0 1 7.092 3.458A9 9 0 1 0 3 12Zm9 9a8.963 8.963 0 0 1-5.672-2.012A6.992 6.992 0 0 1 12.065 16a6.991 6.991 0 0 1 5.689 2.92A8.964 8.964 0 0 1 12 21Z"
              />
            </g>
          </svg>
      </button>
    </div>
  </header>
  <main class="d-flex flex-column align-items-center">';
  }
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
function changeColor(color) {
  var btn = document.getElementById("btnGroupDrop1");
  btn.style.backgroundColor = color;
}
</script>
    <link rel="icon" type="image/x-icon" href="./imgs/Logo.png">
    <link rel="stylesheet" href="style/css.css" />
    <title><?=TITLE?> | CATTUS</title>
  </head>
  <body>
    <!--Aqui eh literalmente a header-->
    <?=$menu?>
    