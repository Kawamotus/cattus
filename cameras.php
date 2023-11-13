<?php

    require __DIR__.'/vendor/autoload.php';

    define('TITLE', 'Lista de Câmeras');

    use App\Session\Login;
    use App\Entity\Camera;

    Login::requireLogin();

    $obCamera = new Camera();
    $listarCamera = Camera::getCameras();

    include __DIR__.'/include/header.php';
    include __DIR__.'/include/listarCameras.php';
    include __DIR__.'/include/footer.php';

?>