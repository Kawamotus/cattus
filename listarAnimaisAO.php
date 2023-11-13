<?php

    require __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Pets Ordenados - ID');

    use App\Entity\Animais;
    use App\Session\Login;

    Login::requireLogin();

    $ordenacao = new Animais();
    $vetor = $ordenacao->getIdVetor();
    $numero = $ordenacao->getCountId();


    $vetorId = [];
    for($i=0;$i<$numero; $i++){
        $vetorId[$i] = $vetor[$i]->ID_Animal;
    }
    
    $ordenacao->randomQuickSort($vetorId, 0, count($vetorId) - 1);
    $ordenacao->imprimeVetor($vetorId);
    

    include __DIR__.'/include/header.php';
    include __DIR__.'/include/listarAAO.php';
    include __DIR__.'/include/footer.php';

?>