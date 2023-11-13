<?php

    namespace App\Entity;

    use App\Db\Database;
    use PDO;

    class Camera{
        public $ID_Camera;
        public $Localizacao_Camera;

        public static function getCameras($where = null, $order = null, $limit = null){
            return (new Database('Camera'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
        }
    }

?>