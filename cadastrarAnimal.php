<?php

    require __DIR__.'/vendor/autoload.php';

    use App\Entity\Animais;
    use App\File\Upload;
    use App\Session\Login;

    Login::requireLogin();

    define('TITLE', 'Cadastrar Pet');

    if(isset($_POST['enviar'])){
        switch($_POST['enviar']){
            case 'cadastrar':

                if(isset($_POST['Nome_Animal'], $_POST['Especie_Animal'], $_POST['Sexo_Animal'], $_POST['Idade_Animal'], $_POST['Porte_Animal'], $_POST['DtAdmissao_Animal'], $_FILES['Img_Animal'])){
                    $obUpload = new Upload($_FILES['Img_Animal']);
                    $obUpload->generateNewName();
                    $sucesso = $obUpload->upload(__DIR__.'/files/animais');

                    $obAnimal = new Animais;
                    $obAnimal->Nome_Animal = $_POST['Nome_Animal'];
                    $obAnimal->Especie_Animal = $_POST['Especie_Animal'];
                    $obAnimal->Sexo_Animal = $_POST['Sexo_Animal'];
                    $obAnimal->Idade_Animal = $_POST['Idade_Animal'];
                    $obAnimal->Porte_Animal = $_POST['Porte_Animal'];
                    $obAnimal->DtAdmissao_Animal = $_POST['DtAdmissao_Animal'];
                    $obAnimal->Img_Animal = $obUpload->getBaseName();

                    $obAnimal->cadastrarAnimal();
                    
                    header('location: listarAnimais.php');
                }

            break;
        }
    }

    include __DIR__.'/include/header.php';
    include __DIR__.'/include/cadastroA.php';
    include __DIR__.'/include/footer.php';

?>