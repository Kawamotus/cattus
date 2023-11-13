<?php

    namespace App\Entity;

    use App\Db\Database;
    use PDO;

    class Atividade{
        public $ID_Atividade;
        public $Tipo_Atividade;
        public $Inicio_Atividade;
        public $Termino_Atividade;
        public $ID_Animal;
        public $ID_Camera;

        public static function getAtividades($where = null, $order = null, $limit = null){
            return (new Database('Atividade'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        }
    }

?>