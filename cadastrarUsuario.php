<?php

    require __DIR__.'/vendor/autoload.php';

    use App\File\Upload;
    use App\Entity\Usuarios;
    use App\Session\Login;

    //Login::requireLogin();

    /*if($_SESSION['Usuario']['Nivel_Funcionario'] != 2){
        header('location:acessoNegado.php');
    }*/

    define('TITLE', 'Cadastro');

    if(isset($_POST['enviar'])){

        switch($_POST['enviar']){
            case 'cadastrar':
        //echo "<pre>"; print_r($_POST); echo "</pre>";exit;

             if(isset($_POST['CPF_Funcionario'], $_POST['Nome_Funcionario'], $_POST['Atribuicao_Funcionario'], $_POST['Nivel_Funcionario'], $_POST['Login_Funcionario'], $_POST['Senha_Funcionario'], $_POST['Telefone_Funcionario'], $_FILES['Img_Funcionario'])){
                    $obUpload = new Upload($_FILES['Img_Funcionario']);
                    $obUpload->generateNewName();
                    $sucesso = $obUpload->upload(__DIR__.'/files');

                    $obUsuario = Usuarios::getUsuarioPorLogin($_POST['Login_Funcionario']);
                    if($obUsuario instanceof Usuarios){
                        $alertaCadastro = "O login digitado já está em uso";
                        break;
                    }

                    $obUsuario = Usuarios::getUsuarioPorCPF($_POST['CPF_Funcionario']);
                    if($obUsuario instanceof Usuarios){
                        $alertaCadastro = "O CPF digitado já está em uso";
                        break;
                    }

                    $obUsuario = new Usuarios;
                    $obUsuario->CPF_Funcionario = $_POST['CPF_Funcionario'];
                    $obUsuario->Nome_Funcionario = $_POST['Nome_Funcionario'];
                    $obUsuario->Atribuicao_Funcionario = $_POST['Atribuicao_Funcionario'];
                    $obUsuario->Nivel_Funcionario = $_POST['Nivel_Funcionario'];
                    $obUsuario->Login_Funcionario = $_POST['Login_Funcionario'];
                    $obUsuario->Senha_Funcionario = password_hash($_POST['Senha_Funcionario'], PASSWORD_DEFAULT);
                    $obUsuario->Telefone_Funcionario = $_POST['Telefone_Funcionario'];
                    $obUsuario->Img_Funcionario = $obUpload->getBaseName();

                    $obUsuario->cadastrarFuncionario();

                    Login::login($obUsuario);

                    //echo "<pre>"; print_r($obUpload->getExtension()); echo "</pre>";exit;
                    
                break;

              
                }
                
        }

    }

    include __DIR__.'/include/header.php';
    include __DIR__.'/include/cadastroU.php';
    include __DIR__.'/include/footer.php';

?>