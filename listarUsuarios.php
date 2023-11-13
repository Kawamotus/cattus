<?php

    require __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Lista de Usuários');

    //use App\Entity\Animais;
    use App\Entity\Usuarios;
    use App\Db\Pagination;
    use App\Session\Login;

    Login::requireLogin();

    if($_SESSION['Usuario']['Nivel_Funcionario'] != 2){
        header('location:acessoNegado.php');
    }

    //paginação e resultados
    $busca = filter_input(INPUT_GET, 'busca', FILTER_UNSAFE_RAW);
    $condicoes=[
        !empty($busca) ? 'Nome_Funcionario LIKE "%'.str_replace(' ','%',$busca).'%"' : null
    ];
    $condicoes = array_filter($condicoes);
    $where = implode(' AND ', $condicoes);
    $quantidadeUsuarios = Usuarios::getQuantidadeUsuarios($where);
    $obPagination = new Pagination($quantidadeUsuarios, $_GET['pagina'] ?? 1, 12);
    $usuarioListar = Usuarios::getUsuarios($where, null, $obPagination->getLimit());

    //echo "<pre>"; print_r($usuario);echo "</pre>";

    include __DIR__.'/include/header.php';
    include __DIR__.'/include/listarU.php';
    include __DIR__.'/include/footer.php';

?>