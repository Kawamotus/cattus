<?php

    namespace App\Session;

    class Login{

        //metodo que inicia a sessão
        private static function init(){
            if(session_status() !== PHP_SESSION_ACTIVE){
                session_start();
            }
        }

        public static function getUsuarioLogado(){
            self::init();
            return self::isLogged() ? $_SESSION['Usuario'] : null;
        }

        public static function login($obUsuario){
            self::init();

            $_SESSION['Usuario'] = [
                'Cod_Funcionario' => $obUsuario->Cod_Funcionario,
                'CPF_Funcionario' => $obUsuario->CPF_Funcionario,
                'Nome_Funcionario' => $obUsuario->Nome_Funcionario,
                'Atribuicao_Funcionario' => $obUsuario->Atribuicao_Funcionario,
                'Nivel_Funcionario' => $obUsuario->Nivel_Funcionario,
                'Login_Funcionario' => $obUsuario->Login_Funcionario,
                'Telefone_Funcionario' => $obUsuario->Telefone_Funcionario,
                'Img_Funcionario' => $obUsuario->Img_Funcionario
            ];

            header('location: listarAnimais.php');
            exit;
        }

        public static function logout(){
            self::init();
            unset($_SESSION['Usuario']);
            header('location: login.php');
            exit;           
        }

        public static function isLogged(){
            self::init();
            return isset($_SESSION['Usuario']['Cod_Funcionario']);
        }

        public static function requireLogin(){
            if(!self::isLogged()){
                header('location: login.php');
                exit;
            }
        }

        public static function requireLogout(){
            if(self::isLogged()){
                header('location: index.php');
                exit;
            }
        }

    }

?>