<?php

    namespace App\Entity;

    use App\Db\Database;
    use PDO;

    class Usuarios{
        public $Cod_Funcionario;
        public $CPF_Funcionario;
        public $Nome_Funcionario;
        public $Atribuicao_Funcionario;
        public $Nivel_Funcionario;
        public $Login_Funcionario;
        public $Senha_Funcionario;
        public $Telefone_Funcionario;
        public $Img_Funcionario;

        public function cadastrarFuncionario(){
            $obDatabase = new Database('Usuario');

            $this->Cod_Funcionario = $obDatabase->insert([
                'CPF_Funcionario' => $this->CPF_Funcionario,
                'Nome_Funcionario' => $this->Nome_Funcionario,
                'Atribuicao_Funcionario' => $this->Atribuicao_Funcionario,
                'Nivel_Funcionario' => $this->Nivel_Funcionario,
                'Login_Funcionario' => $this->Login_Funcionario,
                'Senha_Funcionario' => $this->Senha_Funcionario,
                'Telefone_Funcionario' => $this->Telefone_Funcionario,
                'Img_Funcionario' => $this->Img_Funcionario
            ]);

            return true;
        }

        public static function getUsuarioPorLogin($login){
            return (new Database('Usuario'))->select('Login_Funcionario = "'.$login.'"')->fetchObject(self::class);
        }

        public static function getUsuarioPorCPF($cpf){
            return (new Database('Usuario'))->select('CPF_Funcionario = "'.$cpf.'"')->fetchObject(self::class);
        }

        public static function getUsuarios($where = null, $order = null, $limit = null){
            return (new Database('Usuario'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        }

        public static function getQuantidadeUsuarios($where = null){
            return (new Database('Usuario'))->select($where, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
        }

        public static function getUsuario($id){
            return (new Database('Usuario'))->select('Cod_Funcionario = '.$id)->fetchObject(self::class);
        }

        public function atualizarUsuario(){
            return (new Database('Usuario'))->update('Cod_Funcionario = '.$this->Cod_Funcionario,[
                'CPF_Funcionario' => $this->CPF_Funcionario,
                'Nome_Funcionario' => $this->Nome_Funcionario,
                'Atribuicao_Funcionario' => $this->Atribuicao_Funcionario,
                'Nivel_Funcionario' => $this->Nivel_Funcionario,
                'Login_Funcionario' => $this->Login_Funcionario,
                'Senha_Funcionario' => $this->Senha_Funcionario,
                'Telefone_Funcionario' => $this->Telefone_Funcionario,
                'Img_Funcionario' => $this->Img_Funcionario
            ]);
        }

        public function excluirUsuario(){ 
            return (new Database('Usuario'))->delete('Cod_Funcionario = '.$this->Cod_Funcionario);
        }
    }

?>