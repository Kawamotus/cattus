<?php

    require __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Lista de Pets');

    use App\Entity\Animais;
    use App\Db\Pagination;
    use App\Session\Login;

    Login::requireLogin();

    //paginação e resultados
    $busca = filter_input(INPUT_GET, 'busca', FILTER_UNSAFE_RAW);
    $condicoes=[
        !empty($busca) ? 'Nome_Animal LIKE "%'.str_replace(' ','%',$busca).'%"' : null
    ];
    $condicoes = array_filter($condicoes);
    $where = implode(' AND ', $condicoes);
    $quantidadeAnimais = Animais::getQuantidadeAnimais($where);
    $obPagination = new Pagination($quantidadeAnimais, $_GET['pagina'] ?? 1, 12);
    $animal = Animais::getAnimais($where, 'ID_Animal desc', $obPagination->getLimit());

    include __DIR__.'/include/header.php';
    include __DIR__.'/include/listarA.php';
    include __DIR__.'/include/footer.php';

?>