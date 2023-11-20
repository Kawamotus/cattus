<?php

    require __DIR__.'/vendor/autoload.php';

    use App\Entity\Usuarios;
    use App\Session\Login;

    Login::requireLogin();

    define('TITLE', "Confirmar exclusão");

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header("location:listarUsuarios.php?status=error");
        exit;
    }

    $obUser = Usuarios::getUsuario($_GET["id"]);

    if(isset($_POST['excluir'])){
         $obUser->excluirUsuario();
        if($_GET['id'] == $_SESSION['Usuario']['Cod_Funcionario']){
            header('location:logout.php');
        }
        else{
        header('location:listarUsuarios.php?status=success');
        }
    }

    include __DIR__.'/include/header.php';
    include __DIR__.'/include/confirmar-excluirU.php';
    include __DIR__.'/include/footer.php';


?>
