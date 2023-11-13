<?php

    require __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Login');

    use App\Session\Login;
    use App\Entity\Usuarios;

    Login::requireLogout();

    $alertaLogin = "";
    $alertaCadastro = "";

    if(isset($_POST["enviar"])){
        switch($_POST["enviar"]){
            case "Login":
                $obUsuario = Usuarios::getUsuarioPorLogin($_POST['Login_Funcionario']);

                if(!$obUsuario instanceof Usuarios || !password_verify($_POST['Senha_Funcionario'], $obUsuario->Senha_Funcionario)){
                    $alertaLogin = "Login ou senha inválidos";
                    break;
                }
                Login::login($obUsuario);
                break;
        }
    }

    include __DIR__.'/include/header.php';
    include __DIR__.'/include/login.php';
    include __DIR__.'/include/footer.php';

?>