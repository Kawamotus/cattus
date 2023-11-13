<?php

    require __DIR__.'/vendor/autoload.php';

    use App\Session\Login;

    //desloga o usuario
    Login::logout();
    
?>