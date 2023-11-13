<?php

    require __DIR__.'/vendor/autoload.php';

    use App\Entity\Animais;
    use App\Session\Login;
    use App\Entity\Atividade;

    Login::requireLogin();

    if(isset($_GET['id'])){
        $obAnimal = new Animais(); 
        $animal = $obAnimal->getAnimais("ID_Animal = ".$_GET['id'], null, null);   
    }

    define('TITLE', $animal[0]->Nome_Animal);
    
    if(isset($_POST['Nome_Animal'], $_POST['Especie_Animal'], $_POST['Sexo_Animal'], $_POST['Idade_Animal'], $_POST['Porte_Animal'], $_POST['DtAdmissao_Animal'])){
        $obAnimal->ID_Animal = $_GET['id'];
        $obAnimal->Nome_Animal = $_POST['Nome_Animal'];
        $obAnimal->Especie_Animal = $_POST['Especie_Animal'];
        $obAnimal->Sexo_Animal = $_POST['Sexo_Animal'];
        $obAnimal->Idade_Animal = $_POST['Idade_Animal'];
        $obAnimal->Porte_Animal = $_POST['Porte_Animal'];
        $obAnimal->DtAdmissao_Animal = $_POST['DtAdmissao_Animal'];
        $obAnimal->Img_Animal = $animal[0]->Img_Animal;

        
        $obAnimal->atualizarAnimal();

        header('location:listarAnimais.php?status=success');
    }

    $obAtividade = new Atividade();
    $atividadeAnimal = Atividade::getAtividades("ID_Animal = ".$_GET['id']);
    
    include __DIR__.'/include/header.php';
    include __DIR__.'/include/detalheAnimal.php';
    include __DIR__.'/include/footer.php';

?>