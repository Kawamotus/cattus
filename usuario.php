<?php

    require __DIR__.'/vendor/autoload.php';


    use App\Entity\Usuarios;
    use App\Session\Login;

    Login::requireLogin();

    
    if($_SESSION['Usuario']['Nivel_Funcionario'] != 2){
        header('location:acessoNegado.php');
    }

    if(isset($_GET['id'])){
        $obUser = new Usuarios(); 
        $usuarioDetalhe = $obUser->getUsuarios("Cod_Funcionario = ".$_GET['id'], null, null);   
    }

    define('TITLE', $usuarioDetalhe[0]->Nome_Funcionario);
    
    if(isset($_POST['Nome_Funcionario'], $_POST['CPF_Funcionario'], $_POST['Telefone_Funcionario'], $_POST['Atribuicao_Funcionario'], $_POST['Login_Funcionario'], $_POST['Senha_Funcionario'], $_POST['Nivel_Funcionario'])){
        $obUser->Cod_Funcionario = $_GET['id'];
        $obUser->Nome_Funcionario = $_POST['Nome_Funcionario'];
        $obUser->CPF_Funcionario = $_POST['CPF_Funcionario'];
        $obUser->Telefone_Funcionario = $_POST['Telefone_Funcionario'];
        $obUser->Atribuicao_Funcionario = $_POST['Atribuicao_Funcionario'];
        $obUser->Login_Funcionario = $_POST['Login_Funcionario'];
        $obUser->Senha_Funcionario = password_hash($_POST['Senha_Funcionario'], PASSWORD_DEFAULT);
        $obUser->Nivel_Funcionario = $_POST['Nivel_Funcionario'];
        $obUser->Img_Funcionario = $usuarioDetalhe[0]->Img_Funcionario;
        
        $obUser->atualizarUsuario();

        header('location:listarUsuarios.php?status=success');
    }

   /* if($_SESSION['Usuario']['Nivel_Funcionario'] == 1){
        echo 'Nivel de Usuario = 1';
    }
    else if($_SESSION['Usuario']['Nivel_Funcionario'] == 2){
        echo 'Nivel de Usuario = 2';
    }*/

    
    include __DIR__.'/include/header.php';
    include __DIR__.'/include/detalheUsuario.php';
    include __DIR__.'/include/footer.php';

?>