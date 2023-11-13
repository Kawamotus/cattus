<?php

    require __DIR__.'/vendor/autoload.php';

    use App\Entity\Animais;
    use App\Session\Login;

    Login::requireLogin();

    define('TITLE', "Confirmar exclusão");

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header("location:listarAnimais.php?status=error");
        exit;
    }

    $obAnimal = Animais::getAnimal($_GET["id"]);

    if(isset($_POST['excluir'])){
        $obAnimal->excluirAnimal();
        header('location:listarAnimais.php?status=success');
        exit;
    }

    include __DIR__.'/include/header.php';
    include __DIR__.'/include/confirmar-excluir.php';
    include __DIR__.'/include/footer.php';


?>